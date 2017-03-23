<?php

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
/*
$api = file_get_contents("https://fr.openfoodfacts.org/categories.json");
$json = json_decode($api, true);
echo '<pre>' . print_r($json, true) . '</pre>';*/


//Default parameters by case
$country = 'fr'; //Country by using OFF
$productSlug = 'produit'; //Product by language (producto in spanish or product in english)


//Format url
$url = 'http://{country}.openfoodfacts.org/api/v0/{product}/{scan}.json';

// Where we will set the value of the scan
$barcode = (int) $_GET['ean13'];
$url = str_replace(['{country}','{product}','{scan}'],[$country,$productSlug,$barcode],$url);

// Connection to the API (french version here)
$result = file_get_contents($url);

// Decoding the JSON into an usable array (the value "true" confirms that the return is only an array)
$json = json_decode($result, true);

// Get the datas we want
$productName = $json['product']['product_name'];
$brand = $json['product']['brands'];
$image = $json['product']['image_small_url'];
$nutriscore = $json['product']['image_nutrition_thumb_url'];
$viewData = file_get_contents('responsive.html');
echo str_replace(
    ['{productName}','{brand}','{image}', '{nutriescore}','{json}'],
    [$productName,$brand,$image, $nutriscore,print_r($json,true)],
    $viewData);

?>




