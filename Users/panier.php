<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5zzenw4p+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/panier.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - OMNES BOX</title>

    <?php 
    include("verif_session.php");
    include("verif_connexion_bdd.php");
    
    //supprimer les produits
    //si la variable del existe
    if(isset($_GET['del'])){
        $id_del = $_GET['del'] ;
        //suppression
        unset($_SESSION['panier'][$id_del]);
    }
    ?>

</head>

<body >

    <?php include("navbar.php") ?>

    <div class="panier">

        <section>
            <table>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
                <?php 
                    $total = 0 ;
                    // liste des produits
                    //récupérer les clés du tableau session
                    if(isset($_SESSION['panier'])){
                        $panier = $_SESSION['panier'];
                        $ids = array_keys($panier);
                        // rest of your code
                    }
                    
                    //s'il n'y a aucune clé dans le tableau
                    if(empty($ids)){
                        echo "Votre panier est vide";
                    } else {
                        //si oui 
                        $products = mysqli_query($bdd, "SELECT * FROM cartes WHERE idActivite IN (".implode(',', $ids).")");
                        //lise des produit avec une boucle foreach
                        foreach($products as $product):
                            //calculer le total ( prix unitaire * quantité) 
                            //et aditionner chaque résutats a chaque tour de boucle
                            $total = $total + $product['prix'] * $_SESSION['panier'][$product['idActivite']] ;
                        
                            $req = mysqli_query($bdd, "SELECT nom FROM activite JOIN cartes ON activite.idActivite = cartes.idActivite WHERE cartes.idActivite = {$product['idActivite']}");
                            if(mysqli_num_rows($req) > 0) {
                                $row = mysqli_fetch_assoc($req);

                                // Récupération de l'image en base64
                                $image_data = base64_encode($product['image']);

                                // Détermination du type d'image en fonction des premiers octets de la colonne image
                                $mime_type = finfo_buffer(finfo_open(), $product['image'], FILEINFO_MIME_TYPE);
                                $image_src = "data:".$mime_type.";base64,".$image_data;
    
                    ?>

                                <tr>
                                    <td><img src="<?php echo $image_src?>"></td>
                                    <td><?= isset($row['nom']) ? $row['nom'] : '' ?></td>
                                    <td><?=$product['prix']?>€</td>
                                    <td>
                                        <form method="post" action="panier.php">
                                            <input type="hidden" name="product_id" value="<?=$product['idActivite']?>" />
                                            <select name="quantity" onchange="this.form.submit()">
                                                <?php
                                                for ($i=1; $i<=10; $i++) {
                                                    $selected = ($_SESSION['panier'][$product['idActivite']] == $i) ? 'selected' : '';
                                                    echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </form>
                                    </td>

                                    <td><a href="panier.php?del=<?=$product['idActivite']?>"><img src="delete.png"></a></td>
                                </tr>

                            <?php 
                                } else {
                                }
                            endforeach;
                        } 
                    ?>


                <tr class="total">
                    <th>Total : <?=$total?>€</th>
                </tr>
            </table>
            <a href="https://buy.stripe.com/test_3cseYDf3IdICa8E144" class="btn-checkout">Passer à la caisse</a>
        </section>
    </div>


    <?php include("footer.php"); ?>
</body>

</html>