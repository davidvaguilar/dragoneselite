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
            <strong>Nombre :</strong>
            {{ auth()->user()->name }}
        </li>
        <li>
            <strong>E-mail :</strong>
            {{ auth()->user()->email }}
        </li>
        <li>
            <strong>Teléfonos :</strong>
            {{ auth()->user()->phone }} - {{ auth()->user()->movil }}
        </li>
        
    </ul>
    <hr>
    <p>
        Detalles de la publicación <strong>{{ $post->title }}</strong><br>
        <a href="{{ route('posts.show', $post) }}">Haz clic aquí</a> para ver más información  sobre el post publicado.
    </p>
    <ul>
        <li>
            <strong> Autor de la publicación: </strong>
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

    <p><strong>Detalles del Comentario.</strong></p>
    <p>
        {{ $comment }}
    </p>
</body>
</html>