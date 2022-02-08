<?php

require_once "functions.php";

$db = get_db();
$catBreeds = retrieve_db_items($db);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="normalize.css">
    <meta name="viewport" content="width=device-width">
    <title>Cats of the World</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=Roboto+Mono:wght@300&family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>

<header>
<h1>Cats of the World! 	&#127758</h1>
</header>
<main>
    <?php

    $result = printCatBreed($catBreeds);
    echo $result;

    ?>
</main>
</body>
</html>

