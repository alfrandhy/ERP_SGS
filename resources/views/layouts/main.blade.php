<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('APP.NAME', 'SGS') }}</title>
</head>

<body>
<div class="container mx-auto mt-10 mb-10 px-10">
    
    @yield('content')

</div>

<script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('textarea1');
</script>
<script>
    CKEDITOR.replace('textarea2');
</script>
</body>
</html>