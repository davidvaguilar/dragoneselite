<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo comentario</title>
</head>
<body>
    <p>Se ha realizado un nuevo comentario</p>
    <p>Estos son los datos de usuario que comento:</p>
    <ul>
        <li>
            <strong> Nombre: </strong>
            {{ auth()->user()->name }}
        </li>
        <li>
            <strong> E-mail: </strong>
            {{ auth()->user()->email }}
        </li>
        <li>
            <strong> Telefonos: </strong>
            {{ auth()->user()->phone }} - {{ auth()->user()->movil }}
        </li>
        
    </ul>
    <hr>
    <p>Detalles de la publicación <strong>{{ $post->title }}</strong></p>
    <ul>
        <li>
            <strong> Autor de la publicacion: </strong>
            {{ $post->owner->name }}
        </li>
        <li>
            <strong> Fecha del comentario: </strong>
            {{ $post->published_at->format('d/m/Y H:m') }}
        </li>
        <li>
            {!! $post->body !!}
        </li>
    </ul>

    <p>
        <a href="{{ route('posts.show', $post) }}">Haz clic aqui</a>
        para ver más informacion sobre el post publicado.
    </p>
    <p>El siguiente comentario: </p>
    <p>
        {{ $comment }}
    </p>
</body>
</html>