<?php
$error = 0;
$_POST['search']='pizza buitoni';
if(isset($_POST['search'])){
    $search = str_replace(' ', '+', $_POST['search']);
    if(is_int($search)&&strlen($search)==13){
        header('Location : produit.php?id='.$search);
        exit();
    }

    $url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=1'";
    $result = json_decode(file_get_contents($url), true);
    //var_dump($result);
    echo count($result);
    $count = $result['count'];
    $maxPage = round($result['count']/10);
}

?>



