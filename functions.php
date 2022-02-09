<?php

/**
 * Connects the php file to the database
 *
 * @return object
 */
function get_db(): PDO {
    return new PDO('mysql:host=db; dbname=gabriel-collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

/**
 * Returns queried data from the database
 *
 * @param object $db - The database you are querying
 *
 * @return array - Returns an array of cat data from the database
 */
function retrieve_db_items(PDO $db): array {
    $query = $db->prepare("SELECT `breed_name`, `country_of_origin`, `fluffiness_rating`, `image` FROM `cat_types`;");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Iterates through cat breeds array and prints out HTML formatted results per cat breed
 *
 * @param array $catBreeds
 *
 * @return string Outputs a concatenated list of HTML formatted results per cat breed
 */
function printCatBreed(array $catBreeds): string {
    if (!count($catBreeds)) {
        return "No cat information given!";
    }
    $result = "";
    foreach ($catBreeds as $catBreed) {
        $result .= "<div class='breed'> 
            <div class = 'name'>$catBreed[breed_name]</div> 
            <div class = 'countryOfOrigin'>Country of Origin: $catBreed[country_of_origin]</div>
            <div class = 'fluffiness'>Fluffiness Rating: $catBreed[fluffiness_rating]</div>
            <div class = 'photo'><img alt='Cat Photo' src='$catBreed[image]'/></div>
        </div>";
    }
    return $result;
};