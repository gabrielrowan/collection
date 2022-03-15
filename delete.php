<?php

require_once 'functions.php';

if (isset($_POST['id'])) {
    $db = getDb();
    deleteCat($db, $_POST['id']);
}

header('Location: index.php');

