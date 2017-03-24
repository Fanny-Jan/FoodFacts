<?php

include ('header.php');
if(isset($_GET['search'])){
    $search = str_replace(' ', '+', $_GET['search']);
    if(is_int($search)&&strlen($search)==13){
        header('Location : produit.php?id='.$search);
        exit();
    }
    $url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=1";
    $data = json_decode(file_get_contents($url), true);
    $count = $data['count'];
    //echo $count;

    if($count>18){
        $maxPage = round($data['count']/18)+1;
        $k = 18;
    }else{
        $maxPage = 1;
        $k = $count;
    }
    ?>
<style>
    .hero{
        background-image: url("public/img/header-nutriSport-2.jpg");
    }

    .thumbnail{
        background-color: rgba(102, 205, 148,0.4);
        display: block;
        border: none;
    }
    .thumbnail h1{
        font-size: 20px;
        color:white;
    }

    .thumbnail img{
        overflow:hidden;
        -webkit-border-radius:50px;
        -moz-border-radius:50px;
        border-radius:70px;
        width:130px;
        height:130px;
    }

    .thumb:first-child{
        margin-top: 200px;
    }
    .thumb h1{
        color: white;
        font-size: 30px;

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
        <div class="row text-center  thumb" id="result">
            <h1>Choisissez votre produit parmis la sélection suivante </h1>
            <hr/>
            <?php
            for($i=0;$i<$k;$i++){
                if(!isset($data['products'][$i]['product_name_fr'])){
                    $name = $data['products'][$i]['product_name'];
                }else{
                    $name = $data['products'][$i]['product_name_fr'];
                }
                if(!isset($data['products'][$i]['image_small_url'])){
                    $img = "http://placehold.it/200x200";
                }else{
                    $img = $data['products'][$i]['image_small_url'];
                }
                ?>


                    <div class="col-sm-6 col-md-4 col-lg-4 ">
                        <div class="thumbnail ">

                            <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                            <div class="caption">
                                <h1><?= $name?></h1>

                                <p><a href="produit.php?id=<?= $data['products'][$i]['code']?>" class="btn btn-accent" role="button">I Want It</a> </p>
                            </div>
                        </div>

                </div>

                <?php
            }
            if($maxPage>1){
                ?>
                <button id="showNext" onclick="showNext('<?php echo $search;?>', 2)">Afficher les résultats suivants</button>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}

include ('footer.php');
?>

