<?php

/*include('connect.php');

$options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

try {
    $bdd = new PDO(SERVER_DB, USER, PASS,$options );
} catch (Exception $e){
    die('Connexion à la base de données impossible');

}
$sql = 'SELECT sport FROM sports.sport';
$res = $bdd -> query($sql);
$sports = $res -> fetchAll(PDO::FETCH_ASSOC);*/



include ('header.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
    $data = json_decode(file_get_contents($url), true);
}

?>

<style>
    .hero {
        background-image: url("public/img/header-nutriSport-2.jpg");
    }
    .thumb{
        margin-top: 100px;
    }
    .thumb h1{
        color: #66cd94;
        font-size: 30px;
    }

    .thumb p{
        text-align: center;
    }
</style>
<body id="top">
<section class="hero">
    <section class="navigation">
        <header>
            <div class="header-content">
                <div class="logo"><a href="index.php"><img src="public/img/Logo_NutriSport.png" Nutri'Sport Logo"></a>
                </div>

            </div>
        </header>
    </section>
    <div class="container">
        <div class="row thumb">
            <div class="col-lg-12 col-lg-offset-6 col-md-10 col-md-offset-1 tabProd">
                <h1><?= $data['product']['brands']?></h1>
                <div class="product-img">
                    <img src="<?= $data['product']['image_small_url']?>"/
                </div>

            </div>

            <p><?= $data['product']['ingredients_text_with_allergens_fr']?></p>
            
        </div>
        <div class="row">
        <div class="spChoice">
            <?php

         echo' <select class="form-control" name="sport">';
                    foreach ($sports as $sport){
                        foreach ($sport as $s) {
                            echo '<option>' . $s . '</option>';
                        }
               }

              echo '</select>';
                ?>

        </div>
        </div>
    </div>

</section>




<table>
    <tr>
        <td>Product Name</td>
        <td><?= $data['product']['product_name_fr']?></td>
    </tr>
    <tr>
        <td>Brand</td>
        <td><?= $data['product']['brands']?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><img src="<?= $data['product']['image_small_url']?>"/></td>
    </tr>
    <tr>
        <td>Nutri Score</td>
        <td><img src="nutriscore-<?= $data['product']['nutrition_grade_fr']?>.svg"/></td>
    </tr>
    <tr>
        <td>Ingrédients</td>
        <td><?= $data['product']['ingredients_text_with_allergens_fr']?></td>
    </tr>
    <tr>
        <td>Calories</td>
        <td><?= $data['product']['nutriments']['energy_value'], $data['product']['nutriments']['energy_unit']?></td>
    </tr>
</table>


<?php
    include ('footer.php');
?>