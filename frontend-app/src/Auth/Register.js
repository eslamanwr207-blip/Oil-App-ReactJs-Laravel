import axios from "axios";
import { useState } from "react";
import { useNavigate } from "react-router-dom";

const Register = () => {
    const navigator = useNavigate();
  const [form, setForm] = useState({
    name: "",
    email: "",
    password: "",
    password_confirmation: ""
  });

  const register = async () => {
    try {
      const response = await axios.post(
        "http://localhost/first_shop/public/api/register",
        form
      );

      const jwt = response.data.token;
      localStorage.setItem("email", form.email);
      localStorage.setItem("token", jwt);
      alert("تم إنشاء الحساب وتسجيل الدخول");
      navigator("/"); // Redirect to home page after registration
    } catch (err) {
      alert("فشل إنشاء الحساب");
      console.error(err.response?.data || err.message);
    }
  };

  return (
    <div className="auth" >
      <h3>إنشاء حساب جديد</h3>

      <div className="form">
        <label>Name</label>
        <input
            type="text"

            onChange={(e) => setForm({ ...form, name: e.target.value })}
        />
        <label>Email</label>
        <input
            type="email"

            onChange={(e) => setForm({ ...form, email: e.target.value })}
        />

        <label>Password</label>
        <input
            type="password"

            onChange={(e) => setForm({ ...form, password: e.target.value })}
        />
        <label>Password Confirm</label>
        <input
            type="password"

            onChange={(e) => setForm({ ...form, password_confirmation: e.target.value })}
        />

        <div className="button" >
            <button onClick={register}>إنشاء حساب</button>
        </div>
      </div>
    <div class="a" >
        <a id="anthor_button" href="login">Login</a>

    </div>
    </div>
  );
};

export default Register;
