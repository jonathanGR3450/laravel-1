<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    {{-- {{ var_dump($msg) }} --}}
    <p>Recibiste un email de {{ $msg->name . ' ' . $msg->last_name }} - {{ $msg->email }}</p>

    <p><strong>Asunto: </strong>{{ $msg->subject }}</p>
    <p><strong>Contenido: </strong>{{ $msg->content }}</p>
</body>
</html>