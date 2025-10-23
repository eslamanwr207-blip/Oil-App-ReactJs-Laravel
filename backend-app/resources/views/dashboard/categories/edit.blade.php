@extends('layouts.master')


@section('content')

    <form action="{{route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data" >
        {{ method_field('patch') }}
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="logoFile" class="form-label">الشعار الرئيسي</label>
            <input name="image" class="form-control" type="file" id="imageFile">
        </div>

        <br/>
        <hr/>
        <br/>


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
                                   value="{{$category->translate($key)->title}}">
                        </div>

                    </div>
                @endforeach
            </div>
        </div>


        <button type="submit" class="btn btn-success" style="width: 100%">تحديث</button>

    </form>
@endsection
