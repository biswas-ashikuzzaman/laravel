

<!-- View stored in resources/views/welcome.php -->
<html>
<body>
<h1>Hello, <?php echo $name; ?> Welcome to the laravel world!<?php echo $work; ?></h1>

<h1>This is test for page link with route</h1>
<a href="{{route('hello')}}">Hello</a>


</body>
</html>
<a href="{{ route('profile') }}">See profile</a>