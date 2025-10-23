@extends('website.layout')

@section('content')

    @include('website.layout.navbar')

    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h5>{{__('word.SHOP NOW')}}</h5>
            <h1>{{__('word.Premium Oils')}}</h1>
            <p>{{__('word.Quality car and truck oils delivered to you')}}</p>
            <button class="btn btn-light btn-lg">{{__('word.Buy')}}</button>
            <button class="btn btn-outline-light btn-lg">{{__('word.Explore')}}</button>
        </div>
    </div>

    <div class="section_tow">
        <div class="first_part">
            <a href="{{ route('categories.all', ['id' => $ones->id]) }}" class="category" >
            <img src="{{asset($ones->image)}}" alt="Premium Oils" style="border: none">
            </a>
        </div>

        <div class="parnt_second_part" >
            @foreach($tow_and_three as $tow_three)
                <div class="second_part">
                    <a href="{{ route('categories.all', ['id' => $tow_three->id]) }}" class="category" >
                    <img src="{{asset($tow_three->image)}}" alt="Premium Oils" style="border: none">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="section_three" >
        @foreach($products as $product)
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
                    <a href="{{ route('products.product_details', ['id' => $product->id]) }}" class="product-details-btn" >{{__('word.Product Details')}}</a>
                    <button onclick="addToCart({{ $product->id }}, '{{ $product->title }}', {{ $product->price }}, {{ $product->discount }}, '{{ asset($product->image) }}')"
                            class="cart-btn">🛒 {{__('word.Go To Cart')}}</button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="reviews-section">
        <h2 class="section-title">{{__('word.Customer Reviews')}}</h2>
        <p class="section-subtitle">{{__('word.word.See what our customers say about our quality car oils')}}</p>

        <div class="reviews-container">
            @foreach($reviews as $review)
                <div class="review">
                    <p class="review-text">{{$review->comment}}</p>
                    <div class="reviewer">
                        <div class="reviewer-info">
                            <strong>{{$review->user->name}}</strong>
                        </div>
                    </div>
                </div>
            @endforeach
            <form action="{{route('review.store')}}" method="post" class="reviewer_input" >
                @csrf
                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button type="submit" class="btn btn-secondary">{{__('word.add')}}</button>
            </form>
        </div>
    </div>

    <div class="section_four container d-flex align-items-center">
        <div class="text-content">
            <h1 class="fw-bold">{{__('word.Quality Oils for Your Vehicles')}}</h1>
            <p class="lead">{{__('word.At FM Delivery, we specialize in providing top-quality car and truck oils to ensure your vehicles run smoothly and efficiently. Trust us for your automotive lubrication needs')}}</p>
        </div>
        <div class="image-content">
            <img src="{{asset('oil.png')}}" alt="Oils and Truck" class="img-fluid rounded">
        </div>
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
