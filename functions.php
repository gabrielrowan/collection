<?php

function get_db() {

    return $db = new PDO('mysql:host=db; dbname=gabriel-collection', 'root', 'password');

}

function retrieve_db_items($db) {

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = $db->prepare("SELECT `breed_name`, `country_of_origin`, `fluffiness_rating`, `image` FROM `cat_types`;");
    $query->execute();
    return $query->fetchAll();

}

