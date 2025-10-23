@extends('layouts.master')

@section('css')

@endsection

@include('dashboard.navbar')
    <!-- row -->
    <div class="row" style="margin-bottom: 10px">
        <div style="width: 97%; margin: auto; margin-top: 20px">
            <form action="{{ route('settings.update', $settings) }}" method="post" enctype="multipart/form-data" class="mb-10">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->email }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputFacebook" class="form-label">رابط حساب الفيسبوك</label>
                    <input type="text" name="facebook" class="form-control" id="exampleInputFacebook" aria-describedby="FacebookHelp" value="{{ $settings->facebook }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputX" class="form-label">رابط حساب إكس</label>
                    <input type="text" name="x" class="form-control" id="exampleInputX" aria-describedby="XHelp" value="{{ $settings->x }}">
                </div>

                <div class="mb-3">
                    <label for="logoFile" class="form-label">الشعار الرئيسي</label>
                    <input name="logo" class="form-control" type="file" id="logoFile">
                </div>

                <div class="mb-3">
                    <label for="faviconFile" class="form-label">الأيقونة</label>
                    <input name="favicon" class="form-control" type="file" id="faviconFile">
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
                                           value="{{ $settings->translate($key)->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="description-{{ $key }}" class="form-label">{{ $lang }}</label>
                                    <textarea class="form-control" name="{{ $key }}[description]"
                                              id="description-{{ $key }}" rows="3">
                                        {{ $settings->translate($key)->description }}
                                    </textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <script>
                    var firstTabEl = document.querySelector('#myTab li:first-child button');
                    var firstTab = new bootstrap.Tab(firstTabEl);
                    firstTab.show();
                </script>

                <button type="submit" class="btn btn-success" style="width: 100%">إدخال</button>
            </form>
        </div>
    </div>
    <!-- row closed -->

@section('js')
@endsection
