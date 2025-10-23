@extends('website.layout')

@section('content')
    @include('website.layout.navbar')

    <div class="categories" >
        @foreach($categories as $category)
            <a href="{{ route('categories.all', ['id' => $category->id]) }}" class="category" >
                <img src="{{asset($category->image)}}">
                <h2>{{$category->title}}</h2>
            </a>
        @endforeach




    </div>

    @include('website.layout.footer')
@endsection
