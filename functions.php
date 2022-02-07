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


/**
 * Description: Iterates through cat breeds array and prints out HTML formatted results per cat breed
 * @param array $catBreeds
 * @return string Outputs a concatenated list of HTML formatted results per cat breed
 */



function printCatBreed(array $catBreeds): string {
    $result = "";
    foreach ($catBreeds as $catBreed) {
        $result .= '<div class="breed">' .
            '<div class = "name">' . "Breed Name: " . $catBreed['breed_name'] . '</div>' .
            '<div class = "countryOfOrigin">' . "Country of Origin: " . $catBreed['country_of_origin'] . '</div>' .
            '<div class = "fluffiness">' . "Fluffiness Rating: " . $catBreed['fluffiness_rating'] . '</div>' .
            '<div class = "photo">' . "Cat Photo: " . "<img src='" . $catBreed['image'] . "'/>" . '</div>' .
        '</div>';
    }
    return $result;
}








