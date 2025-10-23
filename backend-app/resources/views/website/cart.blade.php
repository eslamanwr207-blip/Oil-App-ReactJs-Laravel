@extends('website.layout')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    @include('website.layout.navbar')

    <div class="products">
        <div id="cartBody" class="products"></div>

        <p id="emptyCartMessage" style="text-align: center; font-size: 18px; display: none;">
            🛍️ سلتك فارغة! أضف منتجات لعرضها هنا.
        </p>
    </div>

    <script>
        function renderCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartBody = document.getElementById("cartBody");
            let emptyMessage = document.getElementById("emptyCartMessage");

            cartBody.innerHTML = "";

            if (cart.length === 0) {
                emptyMessage.style.display = "block";
                return;
            } else {
                emptyMessage.style.display = "none";
            }

            cart.forEach((item, index) => {
                let row = `
                    <div class="product">
                        <img src="${item.image}" alt="صورة المنتج">
                        <h2 class="product-title">${item.title}</h2>

                        <div class="price-cart">
                            <span class="price">${item.price}</span>
                            <span class="quantity">الكمية: ${item.quantity}</span>
                            <span class="total">الإجمالي: ${(parseFloat(item.price) * item.quantity).toFixed(2)}</span>
                        </div>

                        <button class="btn btn-primary" onclick="sendOrder(${item.id},'${item.title}', ${item.price}, ${item.quantity})">
                            إتمام الشراء
                        </button>

                        <div class="button-group">
                            <button class="btn btn-danger" onclick="removeFromCart(${index})">
                                🗑️ حذف
                            </button>
                        </div>
                    </div>
                `;
                cartBody.insertAdjacentHTML('beforeend', row);
            });
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            renderCart();
        }

        function sendOrder(id,title, price, quantity) {
            // التأكد من أن القيم صحيحة
            let parsedQuantity = parseInt(quantity) || 1;
            let parsedPrice = parseFloat(price) || 0;
            let total = (parsedPrice * parsedQuantity).toFixed(2);

            let data = {
                id: id,
                title: title.trim(), // تأكد من عدم وجود مسافات غير مرغوب بها
                price: parsedPrice,
                quantity: parsedQuantity,
                total: total
            };

            console.log("📢 Data being sent:", data); // ✅ طباعة البيانات للتأكد

            fetch("{{ route('orders.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(responseData => {
                    console.log("✅ Response Data:", responseData);
                    if (responseData.error) {
                        console.error("🚨 Error:", responseData.error);
                    } else {
                        alert("🎉 تم إرسال الطلب بنجاح!");
                        removeFromCart(title); // حذف المنتج من السلة بعد الشراء
                    }
                })
                .catch(error => {
                    console.error("⚠️ خطأ في إرسال الطلب:", error);
                });
        }

        document.addEventListener("DOMContentLoaded", renderCart);
    </script>

    @include('website.layout.footer')
@endsection
