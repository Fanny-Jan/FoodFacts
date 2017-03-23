<?php
    $api = file_get_contents("https://world.openfoodfacts.org/categories.json");
    $json = json_decode($api, true);
echo '<pre>' . print_r($json, true) . '</pre>';

?>