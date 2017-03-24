<?php


include('connect.php');

//$options = array(
//        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
//);
//
//try {
//    $bdd = new PDO(SERVER_DB, USER, PASS,$options );
//} catch (Exception $e){
//    die('Connexion à la base de données impossible');
//
//}

$bdd = mysqli_connect (SERVER,USER,PASS,DB);

//$sql = 'SELECT sport FROM sports.sport';
//$res = $bdd -> query($sql);
//$sports = $res -> fetchAll(PDO::FETCH_ASSOC);


$sql = 'SELECT sport FROM sports.sport';
$res = $bdd -> query($sql);
$sports = $res -> fetchAll(PDO::FETCH_ASSOC);



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

    .tabProd p{
        width: 400px;
        text-align: justify;
        margin-right: auto;
        margin-left: auto;
    }
    .tabProd h2{
       color: grey;
        font-size: 30px;
    }

    .tabProd h3{
        color: #66cd94;
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
        <div class="row text-center thumb">
            <div class="col-lg-12 col-lg-offset-10 col-md-10 col-md-offset-1 tabProd">
                <h1><?= $data['product']['brands']?></h1>
                <div class="product-img">
                    <img src="<?= $data['product']['image_small_url']?>"/>
                </div>
                <hr/>
                <h2>Ingrédients </h2>
                <p><?= $data['product']['ingredients_text_with_allergens_fr']?></p>

                <img src="nutriscore-<?= $data['product']['nutrition_grade_fr']?>.svg"/>

                <h3>Calories : <?= $data['product']['nutriments']['energy_value'], $data['product']['nutriments']['energy_unit']?></h3>

                </div>

            </div>
        </div>
        <div class="row">
        <div class="spChoice">
            <form method="POST">
                <label for="sport">Votre sport :</label>
                <select class="form-control" id="sport" name="sport">
                    <?php
                    $sport = mysqli_query($bdd, "SELECT * FROM sport");
                    while ($data1=mysqli_fetch_assoc($sport)) {
                        $truc = $data1['sport'];
                        echo '<option value="'.$data1['sport'].'">'.$truc.'</option>';
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-default" name="selection" value="Selectionner" />
            </form>
        </div>
    </div>
    <?php


    $calprod = $data['product']['nutriments']['energy_value'];
    var_dump($calprod);

    if (isset($_POST['sport'])) {
        var_dump($_POST['sport']);
        $resCal = mysqli_query($bdd, "SELECT kcalh FROM sport where sport='".$_POST['sport']."'");


        while ($data2=mysqli_fetch_assoc($resCal)) {
            $calorie = $data2['kcalh'];
            $heure=floor($calprod/$calorie);
            $minute= ((($calprod/$calorie)-$heure)*60);

            echo 'il faut se motiver pendant '.$heure.' heures et '.round($minute).' minutes !';
        }
    }
    ?>

        </div>
        </div>
    </div>


</section>

<?php
    include ('footer.php');
?>
