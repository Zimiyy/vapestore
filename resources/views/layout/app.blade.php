<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <script type="module">
        import heroicons from 'https://cdn.jsdelivr.net/npm/heroicons@2.0.16/+esm'
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
    crossorigin="anonymous"></script>
</head>
<body class="bg-black">
    @include('layout.header')
    {{$content}}
    @include('layout.footer')
    @include('layout.alert')
</body>
</html>
