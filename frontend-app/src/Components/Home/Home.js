import './Home.css';

import Footer from "../Layouts/Footer/Footer";
import NavBar from "../Layouts/NavBar/NavBar";
import { useEffect, useState } from 'react';
import { useTranslation } from 'react-i18next';
import axios from 'axios';

export default function Home(){
    const {t, i18n } = useTranslation();
    const currentLanguage = i18n.language;

    const changeLanguage =(lng)=>{
        i18n.changeLanguage(lng);
    }


    const [categories, setCategores] = useState([]);
    const [products, setProducts] = useState([]);
    const [quantities, setQuantities] = useState({});

    useEffect(()=>{
        getCategories();
        getProducts();
    }, []);

    const getCategories = ()=>{
        axios.get('http://localhost/first_shop/public/api/categories')
        .then((response)=>{
            if(response.data.status === 200){
                setCategores(response.data.categories);
                
            }else{
                console.log(response.data.message);
                
                
            }
        })

    }

        const getProducts = ()=>{
        axios.get('http://localhost/first_shop/public/api/products')
        .then((response)=>{
            if(response.data.status === 200){
                setProducts(response.data.products);
                console.log(1);
                
                
            }else{
                console.log(response.data.message);
                console.log(2);
                
                
                
            }
        })


    }

    const addToCart =(product)=>{
        const quantity = parseInt(quantities[product.id]) || 1;
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingItemIndex = cart.findIndex(item => item.id === product.id);

        if(existingItemIndex > -1){
            cart[existingItemIndex].quantity += quantity;
        }else{
            cart.push({
                id: product.id,
                title: product.translations.find(t => t.locale === currentLanguage)?.title || product.title,
                image: product.image,
                price: product.discount,
                quantity: quantity,
            })
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Product added to cart successfully!')
    }
    return(
    <div>
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h5>{t("shop_now")}</h5>
            <h1>{t("premium_oils")}</h1>
            <p>{t("quality_oils_title")}</p>
            <button class="btn btn-light btn-lg">{t("buy")}</button>
            <button class="btn btn-outline-light btn-lg">{t("explore")}</button>
        </div>

        
    </div>

    <div className='section_tow' >
        {categories[0] && (
            <div class="first_part">
            <a href="" class="" >
            <img src={`http://localhost/first_shop/public/${categories[0].image}`} alt="Premium Oils" />
            </a>
        </div>
        )}



            <div class="parnt_second_part" >

            {categories.slice(1,3).map((category)=>{
                
                return(
                <div class="second_part">
                    <a href="">
                    <img src={`http://localhost/first_shop/public/${category.image}`} alt="Premium Oils"/>

                    </a>
                </div>
                )
            })}
            

        </div>
    </div>

        <div class="section_three" >

        {products.slice(1.12).map((product)=>{
            const translation = product.translations.find(t => t.locale === currentLanguage) || product;

            return(

            <div class="product">
                <img src={`http://localhost/first_shop/public/${product.image}`} alt="Product Image"/>
                <h2 class="product-title">{translation.title}</h2>

                <div class="price-container">
                        <span class="discounted-price">{translation.discount}</span>
                        <span class="original-price ">{translation.price}</span>
                </div>

                <input type="number" className="quantity" id="quantity" value={quantities[product.id] || 1}
                onChange={(e)=> setQuantities({
                    ...quantities,
                    [product.id]: parseInt(e.target.value)
                })}
                min="1" name="quantity"/>

                <div class="button-group">
                    <button class="product-details-btn" >
                        <a href={'product_detailes/'+product.id}  >{t("product_details")}</a>

                    </button>
                    <button type="submit" onClick={()=> addToCart(product)} class="cart-btn">🛒 {t("go_to_cart")}</button>
                </div>

            </div>
            )
        })}











    </div>


        <div class="section_four container d-flex align-items-center">
        <div class="text-content">
            <h1 class="fw-bold">{t("quality_oils_title")}</h1>
            <p class="lead">{t("fm_delivery_description")}</p>
        </div>
        <div class="image-content">
            <img src="oil.png" alt="Oils and Truck" class="img-fluid rounded"/>
        </div>
    </div>


    






        </div>
    )
}