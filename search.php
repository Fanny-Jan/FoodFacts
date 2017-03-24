<?php
$error = 0;
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
                    <a href="#" class="thumbnail">
                        <img src="<?= $img?>" alt="Image du produit"/>
                        <h1><?= $name?></h1>
                    </a>
                </div>
                <?php
            }
            if($maxPage>1){
                ?>
                <button id="showNext" onclick="nextpage('<?php echo $search;?>', 2)">Afficher les résultats suivants</button>
                <?php
            }
            ?>
            <ul id="pages" class="pagination">
                <li class="unavailable">Pages :</li>
                <li class="current"><a href="">1</a></li>
                <li><a href="/cgi/search.pl?action=process&search_terms=coca&sort_by=unique_scans_n&page_size=20&page=2">2</a></li>

            </ul>


        </div>
    </div>
    <?php
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}

?>