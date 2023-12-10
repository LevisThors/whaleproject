<!DOCTYPE html>
<html lang="en" class="bg-dark h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Whale</title>
</head>
<body class="h-100 bg-dark d-flex flex-column justify-content-center">
    <div class="w-100 d-flex flex-row justify-content-center">
        <h1 class="logo"><a href="/" class="logo-hover">Whale</a></h1>
    </div>
    <div class="w-100 d-flex flex-row justify-content-center form-overflow-custom">
    {{$slot}}
    </div>

</body>
</html>