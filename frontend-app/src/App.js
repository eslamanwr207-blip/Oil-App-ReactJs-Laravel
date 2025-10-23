import { Navigate, Route, Routes, useLocation } from "react-router-dom";
import Home from "./Components/Home/Home";
import Products from "./Components/Products/Products";
import Product_Detailes from "./Components/Products/Product_Detailes/Product_Detailes";
import Categories from "./Components/Categories/Categories";
import About from "./Components/About/About";
import Cart from "./Components/Cart/Cart";

import NavBar from "./Components/Layouts/NavBar/NavBar";
import Footer from "./Components/Layouts/Footer/Footer";
import Login from "./Auth/Login";
import Register from "./Auth/Register";


function App() {

  function PrivateRoute({ element }) {
    const isAuthenticated = !!localStorage.getItem('token');
    return isAuthenticated ? element : <Navigate to='/login' />;
  }
    const location = useLocation();
    const isAuthPage = ['/login', '/register'].includes(location.pathname);
    const isNotFoundPage = location.pathname !== '/' &&
    !['/login', '/register', '/categories', '/products','/about', '/cart','/product_detailes'].some(path => location.pathname.startsWith(path));


  return (
    <div className="App">
      
      {!isAuthPage && !isNotFoundPage && <NavBar />}


        <Routes>
          <Route path="login" element={<Login/>} />
          <Route path="register" element={<Register/>} />
          <Route path="/" element={<Home/>} />
          <Route path="/products" element={<PrivateRoute element={<Products/>} />} />
          <Route path='/categories' element={<PrivateRoute element={<Categories/>} />} />
          <Route path='/about' element={<PrivateRoute  element={<About/>} />} />
          <Route path='/cart' element={<PrivateRoute element={<Cart/>} />} />
          <Route path='/product_detailes/:id' element={<PrivateRoute element={<Product_Detailes/>} />} />

          
        </Routes>

        {!isAuthPage && !isNotFoundPage && <Footer/>}
    </div>
  );
}

export default App;
