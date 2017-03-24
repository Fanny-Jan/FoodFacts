


//    $api = file_get_contents("https://world.openfoodfacts.org/categories.json");
//    $json = json_decode($api, true);
//echo '<pre>' . print_r($json, true) . '</pre>';
//

/*  CATEGORIES 
 *
 *
    $api = file_get_contents("https://fr.openfoodfacts.org/categories.json");
    $json = json_decode($api, true);
echo '<pre>' . print_r($json, true) . '</pre>';
   $test = $json['tags'][27]['name'];
    var_dump($test);

    foreach ($json as $value){
        foreach ($value as $cat){
            foreach ($cat as $name){
                echo $name .'</br>';
            }
        }
    }
*/






$api = file_get_contents("https://fr.openfoodfacts.org/categories.json");
$json = json_decode($api, true);
/*echo '<pre>' . print_r($json, true) . '</pre>';
$test= $json['tags'][''][''];*/



?>

<!Doctype html>
<!--[if lt IE 7]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie9" lang="en"> <![endif]-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Food Facts TEAM</title>
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>

<?php
include ('header.php');

?>
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
            <div class="col-md-10 col-md-offset-1">
                <div class="hero-content text-center">
                    <img src="public/img/Logo_NutriSport_ico.png" Nutri'Sport Logo">
                    <p class="intro">Nutri'Sport, le sport intelligent !<br/> </p>
                    <div class="row">
                        <div class="form-group">
                        <form action="search.php" method="GET">
                            <input type="text" class="form-control btn btn-fill btn-margin-right" placeholder="Tapez votre recherche" name="search">
                            <input class="btn btn-accent " type="submit" name="Ok" value="Rechercher !">
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="down-arrow floating-arrow footer">
        <p>Copyright © 2017 Wild Code Scholl & Nutri'Sport | Created with <span class="fa fa-heart pulse2"></span> by Fanny Guillaume & Hagera
        </p>
    </div>

</section>



</body>
</html>


