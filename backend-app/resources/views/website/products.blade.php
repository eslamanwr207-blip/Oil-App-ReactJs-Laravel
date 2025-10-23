@extends('website.layout')


@section('content')
    @include('website.layout.navbar')



    <div class="section_three" >
        <div class="product">
            <img src="{{asset('oil.png')}}" alt="Product Image">
            <h2 class="product-title">The First Product</h2>

            <div class="price-container">
                <span class="original-price">$50</span>
                <span class="discounted-price">$35</span>
                <span class="discount-badge">30% OFF</span>
            </div>

            <div class="button-group">
                <button class="product-details-btn">تفاصيل المنتج</button>
                <button class="cart-btn">🛒 Go To Cart</button>
            </div>
        </div> @foreach($products as $product)
            <div class="product">
                <img src="{{asset($product->image)}}" alt="Product Image">
                <h2 class="product-title">{{$product->title}}</h2>

                <div class="price-container">
                    @if($product->discount > 0)
                        <span class="discounted-price">{{ $product->discount}}</span>
                        <span class="original-price ">{{ $product->price }}</span>
                    @else
                        <span class="original-price">{{ $product->price }}</span>
                    @endif
                </div>

                <input type="number" id="quantity-{{ $product->id }}" value="1" min="1" class="quantity-input"
                       style="width: 90%; height: 40px; margin-bottom: 10px; border-radius: 3px; font-size: 25px">

                <div class="button-group">
                    <button class="product-details-btn" >
                    <a style="color: white; text-decoration: none"  href="{{ route('products.product_details', ['id' => $product->id]) }}"  >{{__('word.Product Details')}}</a>

                    </button>
                    <button onclick="addToCart({{ $product->id }}, '{{ $product->title }}', {{ $product->price }}, {{ $product->discount }}, '{{ asset($product->image) }}')"
                            class="cart-btn">🛒 {{__('word.Go To Cart')}}</button>
                </div>
            </div>
        @endforeach



    </div>


    <script>
        function addToCart(id, title, price, discount, image) {
            let quantity = document.getElementById('quantity-' + id).value;
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let existingProduct = cart.find(item => item.id === id);

            if (existingProduct) {
                existingProduct.quantity += parseInt(quantity);
            } else {
                cart.push({
                    id: id,
                    title: title,
                    price: discount,
                    quantity: parseInt(quantity),
                    image: image.startsWith('http') ? image : window.location.origin + '/' + image
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert('تمت إضافة المنتج إلى السلة بنجاح!');
        }
    </script>


    @include('website.layout.footer')
@endsection
