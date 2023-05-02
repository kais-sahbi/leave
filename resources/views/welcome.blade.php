
{{--@if(\Illuminate\Support\Facades\Auth::user())--}}
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
@include('admin.layouts.content')
@include('admin.layouts.fotter')
{{--@else
    {{route('login')}}
@endif--}}
