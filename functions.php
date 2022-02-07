<?php

/**
 * Description: Connects the php file to the database
 * @return object
 */

function get_db(): object {

    return new PDO('mysql:host=db; dbname=gabriel-collection', 'root', 'password');

}

/**
 * Description: Returns queried data from the database
 * @param object $db - The database you are querying
 * @return array - All queried data will be placed in an array
 */

function retrieve_db_items(object $db): array {

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = $db->prepare("SELECT `breed_name`, `country_of_origin`, `fluffiness_rating`, `image` FROM `cat_types`;");
    $query->execute();
    return $query->fetchAll();

}

