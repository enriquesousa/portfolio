<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Correo de Laravel') }}</title>
</head>
<body>
    <h1>{{ __('Correo de Laravel') }}</h1>

{{-- name in one line --}}




    <h3>Nombre: <span style="color: red; font-size: 18px">{{ $name }}</span></h3>
    <h3>Email: <span style="color: red; font-size: 18px">{{ $email }}</span></h3>
    <h3>Asunto: <span style="color: red; font-size: 18px">{{ $mailSubject }}</span></h3>
    <hr>

    <h3>Mensaje:</h3><br>
    {{ $content }}

    <br>
    <hr>
    <h5>Este mensaje fue enviado desde el sitio web.</h5>

</body>
</html> 