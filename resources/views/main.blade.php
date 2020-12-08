<head>
@include('partials.head')
</head>
<body>
@include('partials.nav')
<div class="container">
@include('partials.message')
@yield('content')
@include('partials.footer')
</div>
@yield('script')
@include('partials.javascript')
</body>
</html> 