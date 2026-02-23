<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <main class="container mt-5">
        <section class="row index-revisor">
            <div class="col-12">
                <h1>Un utente ha richiesto di lavorare con noi</h1>
                <h2>Ecco i suoi dati:</h2>
                <p>Nome: {{$name}}</p>
                <p>E-mail: {{$mail}}</p>
                <p>Lettera di presentazione:
                    {{$description}}
                </p>
                <p>Se vuoi renderl* revisore, clicca qua: </p>
                <a href="{{route("make.revisor",compact("user"))}}">Rendi revisor</a>
            </div>
        </section>
    </main>
</body>
</html>