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
    $query = $db->prepare("SELECT `id`, `breed_name`, `country_of_origin`, `fluffiness_rating`, `image` FROM `cat_types` WHERE `hidden` = 0;");
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
            <div class='deleteButton' 
            <form method='post' action='delete.php'>
            <input type='hidden' name='id' value=' $catBreed[id] ' />
            <button type='submit'>Delete</button>
            </form></div>
        </div>";
    }
    return $result;
};

/**
 * Checks to see if inputted data has been set in the submitted form
 *
 * @param array $insertedData
 *
 * @return bool which shows true or false depending on whether the inputted data has been set
 */
function checkKeys(array $insertedData): bool {
    if (isset($insertedData['name'])
        && isset($insertedData['country'])
        && isset($insertedData['fluffiness'])
        && isset($insertedData['url'])) {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Checks if country parameter exists within list of all existing countries
 *
 * @param $country
 *
 * @return bool showing true/ false depending on whether the country exists in the list of existing countries
 */
function validateCountry(string $country): bool {

    $countries = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];

    if (in_array($country, $countries)) {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Checks to see whether input is within 0-5 inline with the number options for fluffiness rating
 *
 * @param $num
 *
 * @return bool returns true/false depending on whether the input is between 0-5
 */
function validateFluffiness(int $num): bool {

    $numbers = [0,1,2,3,4,5];

    if (in_array($num, $numbers)) {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Checks to see whether the inputted string length is between more than 0 and less than 255
 *
 * @param string $name
 *
 * @return bool
 */
function validateName(string $name): bool {

    if (strlen($name) > 0 && strlen($name) < 255) {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Inserts user input for cat name, country of origin, fluffiness rating and image url into the database
 *
 * @param pdo $db
 * @param string $name
 * @param string $country
 * @param int $fluffiness
 * @param string $url
 *
 * @return void
 */
function insertIntoDB (pdo $db, string $name, string $country, int $fluffiness, string $url): void {
    $query = $db->prepare("INSERT INTO `cat_types` (`breed_name`, `country_of_origin`, `fluffiness_rating`, `image`) 
    VALUES (:name, :country, :fluffiness, :url);");
    $query->bindParam(':name', $name);
    $query->bindParam(':country', $country);
    $query->bindParam(':fluffiness', $fluffiness);
    $query->bindParam(':url', $url);
    $query->execute();
}


function deleteCat(PDO $db, int $id): bool {
    $query = $db->prepare("UPDATE `cat_types` SET `hidden` = 1 WHERE `id` = :id;");
    $query->bindParam(':id', $id);
    return $query->execute();
}
