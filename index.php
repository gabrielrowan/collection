<?php

require_once "functions.php";

$db = get_db();
$catBreeds = retrieve_db_items($db);

$result = printCatBreed($catBreeds);
echo $result;



?>


