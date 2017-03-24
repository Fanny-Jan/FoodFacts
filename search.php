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

    if($count>20){
        $maxPage = round($data['count']/20)+1;
        $k = 20;
    }else{
        $maxPage = 1;
        $k = $count;
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
        <div class="row text-center tabProd" id="result">
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


                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                            <div class="caption">
                                <h1><?= $name?></h1>

                                <p><a href="produit.php?id=<?= $data['products'][$i]['code']?>" class="btn btn-fill btn-margin-right" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            if($maxPage>1){
                ?>

                <?php
            }
            ?>

        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php
}

?>

</body>
</html>
