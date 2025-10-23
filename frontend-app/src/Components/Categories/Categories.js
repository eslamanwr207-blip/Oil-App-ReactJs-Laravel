import { useEffect, useState } from 'react';

import { useTranslation } from "react-i18next";
import './Categories.css'
import axios from 'axios';

export default function Categories(){

    const [categories , setCategories] = useState([]);

    const { i18n} = useTranslation();
    const currentLanguage = i18n.language;

    useEffect(()=>{
        getCategories();
    },[])

    const getCategories = ()=>{
        const data = axios.get('http://localhost/first_shop/public/api/categories')
        .then((response)=>{
            if(response.data.status === 200){
                setCategories(response.data.categories);

            }else{
                console.log(response.data.message);
                
            }
        })
    }
    return(

        <div className="categories" >
            {categories.map((category)=>{
                const translation = category.translations.find(t => t.locale === currentLanguage) || category;

                return(
                    <a href="#" className="category" >
                        <img src={`http://localhost/first_shop/public/${category.image}`} />
                        <h2>{translation.title}</h2>
                    </a>
                )
            })}




        </div>
    )
}