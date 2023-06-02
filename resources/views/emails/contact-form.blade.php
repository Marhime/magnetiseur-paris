{{-- contact form mail --}}
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact</title>
</head>

<body>
    <h1>Coucou Papa !</h1>
    <p>Tu as reçu un nouveau message.</p>
    <p>Voici les détails:</p>
    <p>Type: {{ $data['type'] }}</p>
    <p>Nom: {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Message: {{ $data['message'] }}</p>
    <p>Connecte-toi à ton compte pour y répondre ou supprimer ce message.</p>
    <a href="{{ route('login') }}">Se connecter</a>
</body>

</html>
