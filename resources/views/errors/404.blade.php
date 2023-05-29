<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 | Page non trouvée</title>

    @vite('resources/css/app.css')
</head>

<body>
    @include('layouts.navigation-front')

    <main class="flex justify-center items-center error-page">
        <div class="text-center">
            <h1 class="font-serif font-bold text-5xl">Vous êtes perdu ?</h1>
            <p class="text-2xl mt-4">Cette page n'existe pas.</p>
            <a href="{{ route('home') }}"
                class="group relative inline-flex items-center justify-center gap-1.5 overflow-hidden whitespace-nowrap text-md font-semibold leading-none outline-none transition-all ring-black/30 hover:ring-4 focus-visible:ring-4 active:scale-[0.98] active:ring-2 disabled:pointer-events-none disabled:opacity-60 bg-black text-white h-11 rounded-md px-5 mt-8">Retour
                à l'accueil</a>
        </div>
    </main>
</body>

</html>
