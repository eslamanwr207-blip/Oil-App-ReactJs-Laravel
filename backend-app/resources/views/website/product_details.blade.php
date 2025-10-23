@extends('website.layout')

        <link rel="stylesheet" href="{{ asset('css/product_details.css') }}">
@section('content')
    @include('website.layout.navbar')

    <!-- صورة المنتج -->


    <div class="product_details" style="background: white; margin: auto">
        <!-- عنوان المنتج -->
        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">

        <!-- السعر والخصم -->
        <div class="text">
            <h2 style="color: black" >{{ $product->title }}</h2>

            <div class="price-container">
                @if($product->discount > 0)
                    <span class="discounted-price">${{ $product->discount}}</span>
                    <span class="original-price ">${{ $product->price }}</span>
                    <span class="discount-badge">{{ $product->discount }}% OFF</span>
                @else
                    <span class="original-price">${{ $product->price }}</span>
                @endif
            </div>

            <!-- إدخال الكمية -->
                <input type="number" id="quantity" value="1" min="1" class="quantity-input">

            <p style="color: black">{{ $product->description }}</p>
            <button onclick="addToCart({{ $product->id }}, '{{ $product->title }}', {{ $product->price }}, {{ $product->discount }}, '{{ asset($product->image) }}')"
                    class="add-to-cart-btn">
                🛒 إضافة إلى السلة
            </button>

        </div>





        <!-- زر الإضافة إلى السلة -->

    </div>
    </div>

    <script>
        function addToCart(id, title, price, discount, image) {
            let quantity = document.getElementById('quantity').value;
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let existingProduct = cart.find(item => item.id === id);

            if (existingProduct) {
                existingProduct.quantity += parseInt(quantity);
            } else {
                cart.push({
                    id: id,
                    title: title,
                    price: price - (price * discount / 100),
                    quantity: parseInt(quantity),
                    image: image.startsWith('http') ? image : window.location.origin + '/' + image  // تأكد من أن الصورة تحتوي على مسار مطلق
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('تمت إضافة المنتج إلى السلة بنجاح!');
        }
    </script>

    @include('website.layout.footer')
@endsection
