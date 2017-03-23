<?php
    $api = file_get_contents("https://world.openfoodfacts.org/categories.json");
    json_decode($api);
var_dump($api);


?>