<?php

$api = file_get_contents("https://fr.openfoodfacts.org/categories.json");
$json = json_decode($api, true);
echo '<pre>' . print_r($json, true) . '</pre>';



?>

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
<body>
    <H1>OPEN FOOD FACTS</H1>
    <div class="container-fluid">
        <div class="row">
            <div class="form-group">
                <form method="post" action="">


                </form>
            </div>
        </div>

    </div>
</body>
</html>






