<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Ecommerce Project')</title>

    @include('frontend.partials.styles')

</head>
<body>

<div class="wrapper">

@include('frontend.partials.nav')
@include('frontend.partials.messages')

@yield('content')

@include('frontend.partials.footer')

</div>

@include('frontend.partials.scripts')
@yield('scripts')

</body>
</html>