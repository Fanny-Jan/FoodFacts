<?php
include ('header.php');


//Default parameters by case
$country = 'fr'; //Country by using OFF
$productSlug = 'produit'; //Product by language (producto in spanish or product in english)

$url = 'http://{country}.openfoodfacts.org/api/v0/{product}/{scan}.json';
    $produit = $_GET['name'];
    $url = str_replace(['{country}','{product}','{scan}'],[$country,$productSlug,$produit],$url);

$result = file_get_contents($url);
$json = json_decode($result, true);

https://world.openfoodfacts.org/cgi/search.pl?search_terms=banania&search_simple=1&action=process&json=1

// Get the datas we want
$productName = $json['product']['product_name'];
$brand = $json['product']['brands'];
$image = $json['product']['image_small_url'];
$nutriscore = $json['product']['nutrition_grade_fr'];
$ingredients = $json['product']['ingredients_text_with_allergens_fr'];
$energy_value = $json['product']['nutriments']['energy_value'];
$energy_unit = $json['product']['nutriments']['energy_unit'];
$viewData = file_get_contents('produit.php');
echo str_replace(
    ['{productName}','{brand}','{image}', '{nutriscore}','{ingredients}','{energy_value}','{energy_unit}','{json}'],
    [$productName,$brand,$image, $nutriscore, $ingredients, $energy_value, $energy_unit, print_r($json,true)],
    $viewData);
