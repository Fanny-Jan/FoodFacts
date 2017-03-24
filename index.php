<?php

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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Nutri'Sport</title>

    <meta name="description" content="Nutri'Sport - Éliminer les calories acquis en faisant du sport ! " />
    <meta property="og:title" content="Nutri'Sport" />
    <meta property="og:description" content="Éliminer les calories acquis en faisant du sport !" />

    <!-- MOBILE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="public/img/Logo_NutriSport_ico.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="public/img/Logo_NutriSport_ico.png" sizes="32x32" />

    <!-- CSS and SCRIPTS -->
    <link rel="stylesheet" type="text/css" href="public/css/styles.css" />
    <link rel="stylesheet" href="public/css/normalize.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/jquery.fancybox.css">
    <link rel="stylesheet" href="public/css/flexslider.css">
    <link rel="stylesheet" href="public/css/queries.css">
    <link rel="stylesheet" href="public/css/etline-font.css">
    <link rel="stylesheet" href="public/bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <style> /* Firefox seems to have issues loading the clip path from inside the CSS */
        .link--urpi::before {
            -webkit-clip-path: url(#cp_up);
            clip-path: url(#cp_up);
        }

        .link--urpi::after {
            -webkit-clip-path: url(#cp_down);
            clip-path: url(#cp_down);
        }
    </style>
</head>


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
                        <form action="./request.php" method="get">
                            <input type="text" class="form-control btn btn-fill btn-margin-right" placeholder="Tapez votre recherche" name="ean13">
                            <input class="btn btn-accent " type="submit" name="Ok" value="trouver ce code barre !">
                        </form>

                        </div>
                    </div>

                    <!--<a href="#" class="btn btn-fill btn-large btn-margin-right">TEASER SHOW 2016</a> <a href="#" class="btn btn-accent btn-large">BUY TICKETS</a>-->
                </div>
            </div>
        </div>
    </div>

</section>



</body>
</html>


