<!doctype html>
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
<?php
if(isset($_GET['search'])){
    $search = str_replace(' ', '+', $_GET['search']);
    if(is_int($search)&&strlen($search)==13){
        header('Location : produit.php?id='.$search);
        exit();
    }
    $url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=1";
    $data = json_decode(file_get_contents($url), true);
    $count = $data['count'];
    echo $count;

    if($count>20){
        $maxPage = round($data['count']/20)+1;
        $k = 20;
    }else{
        $maxPage = 1;
        $k = $count;
    }
    ?>

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
                <div class="col-xs-3">
                    <a href="produit.php?id=<?= $data['products'][$i]['code']?>" class="thumbnail">
                        <div class="img-div">
                            <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                        </div>
                        <h1><?= $name?></h1>
                    </a>
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

?>

</body>
</html>
