import { useParams } from 'react-router-dom';
import './Product_Detailes.css';
import { useTranslation } from 'react-i18next';
import { useEffect, useState } from 'react';
import axios from 'axios';

export default function Product_Detailes(){

    const {id} = useParams();
    const {i18n} = useTranslation();
    const currentLanguage = i18n.language;

    const [product, setProduct] = useState([]);
    const [quantities, setQuantities] = useState({});

    useEffect(()=>{
        getProduct();
    },[]);

    const getProduct =()=>{
        axios.get('http://localhost/first_shop/public/api/product/'+id)
        .then((response)=>{
            if(response.data.status === 200){
                setProduct(response.data.product);
                console.log(response.data.product);
            }else{
                console.log(2);
                
            }
        })
    }

    const addToCart =()=>{
        const quantity = parseInt(quantities[product.id]) || 1;
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const existingItemIndex = cart.findIndex(item => item.id === product.id);

        if(existingItemIndex > -1){
            cart[existingItemIndex].quantity += quantity;
        }else{
            cart.push({
                id: product.id,
                title: product.translations.find(t => t.locale === currentLanguage)?.title || product.title,
                image: product.imaage,
                price: product.discount,
                quantity: quantity,
            })
        }
        localStorage.setItem('cart', JSON.stringify(cart));

        alert('Product added to cart successfully!');
    }

        if(!product){
        return <p>جاري تحميل البيانات...</p>;
    }


    const translation = product.translations?.find(t => t.locale === currentLanguage) || product;

    return(
            
        
        <div className="product_details" >
            

            
        <img src={`http://localhost/first_shop/public/${product.image}`} alt="" />


        <div className="text">
            <h2>{translation.title}</h2>

            <div class="price-container">

                    <span className="discounted-price">{translation.discount}</span>
                    <span className="original-price ">{translation.price}</span>
                    <span className="discount-badge">{translation.price - translation.discount}</span>
            </div>


                <input type="number" id="quantity" class="quantity-input"
                min="1" value={quantities[product.id] || 1}
                onChange={(e)=> setQuantities({
                    ...quantities,
                    [product.id]: parseInt(e.target.value)
                })}
                />

            <p>{translation.description}</p>
            <button onClick={()=> addToCart(product)} className="add-to-cart-btn">
                🛒 إضافة إلى السلة
            </button>

        </div>







    </div>




    )
}