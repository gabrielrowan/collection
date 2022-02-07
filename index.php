<?php

require_once "functions.php";

$db = get_db();
$result = retrieve_db_items($db);

echo '<pre>';
var_dump($result);
echo '<pre>';

?>


