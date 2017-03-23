<?php
include 'bdd.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
$error = 0;
$_POST['search']='pizza buitoni';
if(isset($_POST['search'])){
    $search = str_replace(' ', '+', $_POST['search']);
    if(is_int($search)&&strlen($search)==13){
        header('Location : produit.php?id='.$search);
        exit();
    }
    // On initialise la BDD
    //Récupère le nombre de résultat. On le divise par 20 (=nb de page). On incrémente le numéro de la page dans l'url pour afficher tout les produits
    $url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=1'";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
    var_dump($data);
    //echo count($data);
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
?>


<?php
include 'bdd.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
$error = 0;
$_GET['id']=3116740029809;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    // On initialise la BDD
    $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
    //var_dump($data);
    //echo $data['product']['nutriments']['energy'];
    //echo "<br />";
    //echo $data['product']['nutriments']['energy_unit'];
    $query = mysqli_query($bdd, "SELECT * FROM sports");
    while($sports = mysqli_fetch_assoc($query)){
        //On convertit les Kj pour 100g en Kj
        $kcal100 = $data['product']['nutriments']['energy']*4.18;
        //On récupère le poids du produit
        $quantity = $data['product']['quantity'];
        //On convertit les kcal pour 100 g en kcal pour tout le produit
        $kcal = $kcal100*$quantity/100;
        //On calcule le temps nécessaire pour bruler les calories de 100g et du produit
        $time100 = round($kcal100/$sports['kcal/h']);
        $time = round($kcal/$sports['kcal/h']);
        echo 'En pratiquant '. $sports['sport'].',il vous faudra '.$time100.' heures pour bruler les calories de 100g de '.$data['product']['product_name'].'. IL vous faudr '.$time.' heures pour bruler les calories de tout le produit <br />';
    }
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
?>
