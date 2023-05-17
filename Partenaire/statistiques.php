<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Partenaire - Statistiques</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
    <?php
    include("../Users/verif_connexion_bdd.php");
    include("../Users/verif_session.php");
    ?>
</head>

<body>
    <link href="../CSS/statistiques.css" rel="stylesheet" type="text/css" media="all" />
    <div class="container">
        <section class="section">
            <h1>Espace Partenaire - Statistiques</h1>
            <div class="carte">
                <h2 class="carte-titre">Vos cartes cadeaux</h2>
                <?php
                $idPartenaire = $_SESSION['idPartenaire'];
                $table = "SELECT c.theme, f.prix, f.description, f.duree  
                            FROM formule AS f, cartes AS c, partenariat AS pa 
                            WHERE pa.idPartenaire = '$idPartenaire' AND pa.idFormule = f.idFormule AND pa.idCarte = c.idCarte";
                $request = mysqli_query($bdd, $table);
                while ($row = mysqli_fetch_array($request)) {
                    echo "<div class='carte'>";
                    echo "<h2 class='carte-titre'>" . $row['theme'] . "</h2>";
                    echo "<p class='carte-description'>" . $row['description'] . "</p>";
                    echo "<p class='carte-description'> Prix : " . $row['prix'] . "$</p>";
                    echo "<p class='carte-description'> Durée : " . $row['duree'] . "h</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
        <section class="section">
            <div class="carte">
                <h2 class="carte-titre">Activités proposées</h2>
                <div class="carte-description">
                    <div class="activity">restauration</div>
                    <div class="activity">aventure</div>
                    <div class="activity">spa</div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="carte">
                <h2 class="carte-titre">Clients ayant dépensé leur carte cadeau</h2>
                <div class="carte-description">
                    <div class="client">Client 1</div>
                    <div class="client">Client 2</div>
                    <div class="client">Client 3</div>
                </div>
            </div>
        </section>
        <section class="section">
            <h2>Chiffre d'affaires</h2>
            <div class="chart-container">
                <canvas id="chart"></canvas>
            </div>
        </section>
    </div>
    <script>
        AOS.init({
            duration: 1000
        });
        // Données du graphique (exemple)
        var chartData = {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],
            datasets: [{
                label: 'Chiffre d\'affaires',
                data: [500, 1000, 800, 1500, 1200, 1800, 1400],
                backgroundColor: 'rgba(240, 203, 100, 0.5)',
                borderColor: 'rgba(240, 203, 100, 1)',
                borderWidth: 2,
                pointRadius: 0,
                fill: 'origin',
            }]
        };

        // Configuration du graphique
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return value + ' €';
                        }
                    }
                }]
            },
            legend: {
                display: false
            }
        };

        // Création du graphique
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: chartOptions
        });
    </script>

    <footer style="padding: 20px 0; text-align: center; background-color: #000; color: #fff; margin-top: 2xx0px;">
        <a href="tableau_de_bord.php" class="btn boutton">Tableau de Bord</a>
        <br><br>
        <p>&copy; 2023 | Tous droits réservés.</p>
    </footer>
</body>

</html>