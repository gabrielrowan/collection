<?php

require 'functions.php';

$insertedData = $_POST;

if (checkKeys($insertedData)) {
    //sanitise
    $sanitisedBreedName = filter_var($insertedData['name'], FILTER_SANITIZE_STRING);
    $sanitisedCountry = filter_var($insertedData['country'], FILTER_SANITIZE_STRING);
    $sanitisedFluffiness = filter_var($insertedData['fluffiness'], FILTER_SANITIZE_NUMBER_INT);
    $sanitisedURL = filter_var($insertedData['url'], FILTER_SANITIZE_URL);
    //validate
    if (validateCountry($sanitisedCountry)
        && validateFluffiness(intval($sanitisedFluffiness))
        && filter_var($sanitisedURL, FILTER_VALIDATE_URL)
        && strlen($sanitisedBreedName) > 0
        && strlen($sanitisedBreedName) < 255) {
        $db = get_db();
        insertIntoDB($db, $sanitisedBreedName, $sanitisedCountry, $sanitisedFluffiness,  $sanitisedURL);
    }
}
header('Location: index.php');
