@extends('website.layout')

@section('content')
    @include('website.layout.navbar')

    <section class="about_us">
        <h1>{{__('word.Quality Oils for Your Vehicles')}}</h1>
            <div class="content">
                    <div class="text">
                        <h2>{{__('word.Your Trusted Oil Supplier')}}</h2>

                        <p>{{__('word.At FM Delivery, we specialize in providing high-quality car and truck oils. Our mission is to ensure your vehicles run smoothly and efficiently with the best products available')}}

                    </p>
                        <img src="{{ asset('one.jpg') }}" alt="Quality Oil">
                </div>
                <div class="text">
                    <h2>{{__('word.Expertise in Automotive Lubricants')}}</h2>
                    <p>
                        {{__('word.We are dedicated to delivering exceptional customer service and expert advice, helping you choose the right oils for your needs.')}}
                    </p>

                    <img src="{{ asset('tow.webp') }}" alt="Quality Oil">

                </div>
            </div>



    </section>

    @include('website.layout.footer')
@endsection
