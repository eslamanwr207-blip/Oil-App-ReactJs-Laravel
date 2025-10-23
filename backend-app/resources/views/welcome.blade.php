@foreach($category as $item)
    <h1>{{ $item->name }}</h1>
@endforeach



<a href="{{ route('changeLang', ['lang' => 'ar']) }}">العربية</a>
<a href="{{ route('changeLang', ['lang' => 'en']) }}">English</a>
