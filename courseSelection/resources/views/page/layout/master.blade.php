<!DOCTYPE html>
<html lang="en">
@include("page.layout.header")
<body>
    @include("page.layout.navbar")

    @yield('content')

    @include("page.layout.footer")
</body>
</html>