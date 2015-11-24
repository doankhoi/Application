<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{ $title }}</h2>

        <div>
            {!! $intro . url('auth/confirm/' . $register_token) !!}.<br>
        </div>
    </body>
</html>
