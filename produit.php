
<?php

include ('header.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
    $data = json_decode(file_get_contents($url), true);
}

?>

<style>
    .hero{
        background-image: url("public/img/header-nutriSport-2.jpg");
    }
</style>
<body id="top">
<section class="hero">
    <section class="navigation">
        <header>
            <div class="header-content">
                <div class="logo"><a href="#"><img src="public/img/Logo_NutriSport.png" Nutri'Sport Logo"></a>
                </div>

            </div>
        </header>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-6 col-md-10 col-md-offset-1 tabProd">
                <h1><?= $data['product']['brands']?></h1>
                <div class="product-img">
                    <img src="<?= $data['product']['image_small_url']?>"/
                </div>



            </div>
        </div>
    </div>

</section>

</body>
</html>



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