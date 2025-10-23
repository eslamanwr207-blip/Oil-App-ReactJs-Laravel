@extends('layouts.master')

@section('content')
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="mb-3">
            <label for="logoFile" class="form-label">الصورة</label>
            <input name="image" class="form-control" type="file" id="imageFile">
        </div>

        <div class="mb-3">
            <label for="exampleInputPrice" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="exampleInputPrice" aria-describedby="PriceHelp" value="">
        </div>

        <div class="mb-3">
            <label for="exampleInputDiscount" class="form-label">Discount</label>
            <input type="number" name="discount" class="form-control" id="exampleInputDiscount" aria-describedby="PriceHelp" value="">
        </div>

        <div class="mb-3">
            <label for="exampleInputQuantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="exampleInputQuantity" aria-describedby="PriceHelp" value="">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">القسم : -</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                <option value="0" selected>--حدد القسم--</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>



        <div>
            <h3 style="margin-bottom: 20px">الترجمة</h3>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach(config('app.languages') as $key => $lang)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif"
                                id="{{ $key }}-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#{{ $key }}"
                                type="button"
                                role="tab"
                                aria-controls="{{ $key }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $lang }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach(config('app.languages') as $key => $lang)
                    <div class="tab-pane fade @if($loop->first) show active @endif"
                         id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                        <div class="mb-3">
                            <label for="title-{{ $key }}" class="form-label">{{ $lang }}</label>
                            <input type="text" name="{{ $key }}[title]" class="form-control" id="title-{{ $key }}"
                                   value="">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">{{$lang}}</label>
                            <textarea class="form-control" name="{{$key}}[description]" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success" style="width: 100%">إدخال</button>


    </form>
@endsection
