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

    if($count>3){
        $maxPage = round($data['count']/3)+1;
        $k = 3;
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
        background-color: #66cd94;
       display: block;
    }

    .thumb{
        margin-top: 150px;
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
        <div class="row text-center" id="result">
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


                    <div class="col-sm-6 col-md-4 col-lg-4  thumb">
                        <div class="thumbnail">

                            <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                            <div class="caption">
                                <h1><?= $name?></h1>

                                <p><a href="produit.php?id=<?= $data['products'][$i]['code']?>" class="btn btn-accent" role="button">I Want It</a> </p>
                            </div>
                        </div>

                </div>

                <?php
            }
            if($maxPage>1){?>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                <?php
                $page=0;
                for ($page=0;$page<$maxPage;$page++){
                    echo'<li><a href="'.$url.' = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='.$search.'&search_simple=1&action=process&json=1&page='.$page.'">'.$page.'</a></li>';

                    }
                ?>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                    </ul>
            </nav>
          <?php  }
            ?>

        </div>

    </div>
    <?php
}

?>

</body>
</html>
