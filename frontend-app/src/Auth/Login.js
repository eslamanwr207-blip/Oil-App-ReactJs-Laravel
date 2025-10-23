import './Auth.css';

import axios from "axios";
import { useState } from "react";
import { useNavigate } from 'react-router-dom';

const Login = () => {
  const navigator = useNavigate();
  const [form, setForm] = useState({ email: "", password: "" });
  const [token, setToken] = useState("");

const login = async () => {
  try {
    const response = await axios.post(
      "http://localhost/first_shop/public/api/login",
      form
    );

    const jwt = response.data.token;
    localStorage.setItem("token", jwt);
    localStorage.setItem("email", form.email);
    alert("تم تسجيل الدخول");
    navigator("/"); // Redirect to home page after registration
  } catch (err) {
    alert("فشل تسجيل الدخول");
    console.error(err.response?.data || err.message);
  }
};

  return (
    <div className="auth" >
      <h1>Login</h1>
      <div className="form" >
        <label>Email</label>
        <input type="email" onChange={(e) => setForm({ ...form, email: e.target.value })} />
        <label>Password</label>
        <input type="password" onChange={(e) => setForm({ ...form, password: e.target.value })} />
        <div className="button">
          <button onClick={login}>Login</button>
          </div>
        </div>
      <div class="a" >
        <a id="anthor_button" href="register">Register</a>

      </div>
    </div>
  );
};

export default Login;
