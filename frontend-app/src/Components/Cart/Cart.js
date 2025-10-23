import { useEffect, useState } from 'react';
import './Cart.css'
import { useTranslation } from 'react-i18next';
import axios from 'axios';

export default function Cart(){

    const {i18n} = useTranslation();
    const currentLanguage = i18n.language;

    const [cart, setCart] = useState([]);
        const [email, setEmail] = useState(localStorage.getItem("email"));



    useEffect(()=>{
        const storeCart = JSON.parse(localStorage.getItem('cart'));
        setCart(storeCart || []);
    },[])

    const removeFromCart = (id)=>{
        const updateCart = cart.filter(item => item.id !== id);
        setCart(updateCart);
        localStorage.setItem('cart', JSON.stringify(updateCart));
        alert('✅ تمت إزالة المنتج من السلة!');
    }

    const addToOrder =()=>{
        if(cart.length === 0){
            alert('❌ السلة فارغة!');
            return;
        }

        const orderData = {
            products: cart.map(item => ({
                user_id: email,
                product_id: item.id,
                image: 1,
                title: item.title,
                price: item.price,
                quantity: item.quantity,
            

            }))
        }

        console.log('sending order data:', orderData);
        axios.post('http://localhost/first_shop/public/api/order', orderData)
        .then((response)=>{
            if(response.data.status === 200){
                alert('✅ تم إضافة طلبك بنجاح!');
                localStorage.removeItem('cart');
                setCart([]);
            }else{
                console.log(response.data.message);
                
            }
        })
        
    }
    return(
    <div class="section_three" >

        {cart.map((product)=>{
            return(
                <div className="product">
                <img src={`http://localhost/first_shop/public/${product.image}`} alt="صورة المنتج" />
                <h2 className="product-title">{product.title}</h2>

                <div className="price-cart">
                    <span className="price">{product.price}</span>
                    <span className="quantity">الكمية: {product.quantity}</span>
                    <span className="total">الإجمالي: {product.quantity * product.quantity}</span>




                </div>

                <div className="hr" ></div>





                    <input type="hidden" name="product_id" value="" />

                    <button id="cart_button" className="btn btn-danger"
                    onClick={()=> removeFromCart(product.id)} >
                    
                        🗑️ حذف
                    </button>
            </div>
            )
            
            })}

            




                <button type="submit" id="cart_button" className="btn btn-primary" onclick="alert('تمت إضافة طلبك بنجاح!');" 
                onClick={addToOrder} >
                

                    إتمام الشراء
                </button>
    </div>

    )
}