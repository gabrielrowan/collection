<?php

require_once 'functions.php';

if (isset($_POST['id'])) {
    $db = get_db();
    deleteCat($db, $_POST['id']);
}

header('Location: index.php');
