

<?php

include('connect.php');

$options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

try {
    $bdd = new PDO(SERVER_DB, USER, PASS,$options );
} catch (Exception $e){
    die('Connexion à la base de données impossible');

}
$sql = 'SELECT * FROM sport';
$res = $bdd -> query($sql);
$sports = $res -> fetchAll();

foreach($sports as $sport) {
    echo $sport['sport'].'<br/>';}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OFF</title>
</head>
<body>
<?php


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
            </div>
        </div>
    </div>

</section>

</body>
</html>



