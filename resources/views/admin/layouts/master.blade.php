@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

{{--le contenu dymaque--}}
<main id="main" class="main">
@yield('content')

</main>

@include('admin.layouts.fotter')
