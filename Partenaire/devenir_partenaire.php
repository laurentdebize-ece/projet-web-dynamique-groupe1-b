<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir Partenaire</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link href="../CSS/devenir_partenaire.css" rel="stylesheet" type="text/css" media="all" />


    <script>
        function traitement() {
            alert("Nous allons traiter votre demande dans les plus brefs délais.");
        }
    </script>
</head>

<body>

    <div class="header">
        <a href="../index.php" style="color: black;">Retour à l'accueil</a>
    </div>

    <div class="main">
        <h2>Devenir Partenaire</h2>
        <p>Rejoignez notre réseau de partenaires et profitez des nombreux avantages offerts par notre plateforme.</p>

        <form class="contact" onsubmit="traitement()">
            <input type="text" id="company" name="company" placeholder="Nom de l'entreprise">
            <input type="email" id="email" name="email" placeholder="Email de l'entreprise">
            <textarea id="message" name="message" placeholder="Votre message (et description de votre entreprise)" rows="4"></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>

</html>