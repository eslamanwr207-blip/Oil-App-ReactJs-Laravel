import axios from "axios";
import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";

export default function Products() {
    const [products, setProducts] = useState([]);
    const [quantities, setQuantities] = useState({});
    const { i18n } = useTranslation();
    const currentLanguage = i18n.language;

    useEffect(() => {
        getProducts();
    }, []);

    const getProducts = () => {
        axios.get('http://localhost/first_shop/public/api/products')
            .then((response) => {
                if (response.data.status === 200) {
                    setProducts(response.data.products);
                } else {
                    console.log(response.data.message);
                }
            });
    };

    const addToCart = (product) => {
        const quantity = parseInt(quantities[product.id]) || 1;

        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const existingItemIndex = cart.findIndex(item => item.id === product.id);

        if (existingItemIndex !== -1) {
            cart[existingItemIndex].quantity += quantity;
        } else {
            cart.push({
                id: product.id,
                title: product.translations.find(t => t.locale === currentLanguage)?.title || product.title,
                image: product.image,
                price: product.discount,
                quantity: quantity
            });
        }

        localStorage.setItem('cart', JSON.stringify(cart));

        alert('✅ تمت إضافة المنتج إلى السلة!');
    };

    return (
        <div className="section_three">
            {products.map((product) => {
                const translation = product.translations.find(t => t.locale === currentLanguage) || product;

                return (
                    <div className="product" key={product.id}>
                        <img src={`http://localhost/first_shop/public/${product.image}`} alt="Product" />
                        <h2 className="product-title">{translation.title}</h2>

                        <div className="price-container">
                            <span className="discounted-price">{translation.discount}</span>
                            <span className="original-price">{translation.price}</span>
                        </div>

                        <input
                            type="number"
                            className="quantity"
                            min="1"
                            value={quantities[product.id] || 1}
                            onChange={(e) =>
                                setQuantities({
                                    ...quantities,
                                    [product.id]: parseInt(e.target.value)
                                })
                            }
                        />

                        <div className="button-group">
                            <button className="product-details-btn">
                                <a href={'product_detailes/' + product.id}>Product Details</a>
                            </button>
                            <button onClick={() => addToCart(product)} type="submit" className="cart-btn">
                                🛒 Go To Cart
                            </button>
                        </div>
                    </div>
                );
            })}
        </div>
    );
}
