<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OFF</title>
</head>
<body>
<?php


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
    $data = json_decode(file_get_contents($url), true);
}

//    $productSlug = 'produit';
//    $url = 'http://fr.openfoodfacts.org/api/v0/{product}/{scan}.json';
//    $name = $_GET['name'];
//    //$url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$name'&search_simple=1&action=process&json=1&page=1";
//    $url = str_replace(['{product}','{scan}'],[$productSlug,$name],$url);
//    $result = file_get_contents($url);
//    $data = json_decode($result, true);
//
//
//    $productName = $data['product']['product_name'];
//    $brand = $data['product']['brands'];
//    $image = $data['product']['image_small_url'];
//    $nutriscore = $data['product']['nutrition_grade_fr'];
//    $ingredients = $data['product']['ingredients_text_with_allergens_de'];
//    $energy_value = $data['product']['nutriments']['energy_value'];
//    $energy_unit = $data['product']['nutriments']['energy_unit'];
//    $viewData = file_get_contents('produit.php');
//    echo str_replace(
//        ['{productName}','{brand}','{image}', '{nutriscore}','{ingredients}','{energy_value}','{energy_unit}','{data}'],
//        [$productName,$brand,$image, $nutriscore, $ingredients, $energy_value, $energy_unit, print_r($data,true)],
//        $viewData);



?>

<h2>Example Output</h2>
<table>
    <tr>
        <td>Product Name</td>
        <td><?= $data['product']['product_name_fr']?></td>
    </tr>
    <tr>
        <td>Brand</td>
        <td><?= $data['product']['brands']?></td>
    </tr>
    <tr>
        <td>Image</td>
        <td><img src="<?= $data['product']['image_small_url']?>"/></td>
    </tr>
    <tr>
        <td>Nutri Score</td>
        <td><img src="nutriscore-<?= $data['product']['nutrition_grade_fr']?>.svg"/></td>
    </tr>
    <tr>
        <td>Ingrédients</td>
        <td><?= $data['product']['ingredients_text_with_allergens_fr']?></td>
    </tr>
    <tr>
        <td>Calories</td>
        <td><?= $data['product']['nutriments']['energy_value'], $data['product']['nutriments']['energy_unit']?></td>
    </tr>
</table>

</body>
</html>