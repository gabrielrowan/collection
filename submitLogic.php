<?php

$insertedData = $_POST;

if (isset($insertedData[breed_name]) && isset($insertedData[country_of_origin]) && isset($insertedData[fluffiness_rating]) &&
    isset($insertedData[image]) {
    filter_var($insertedData[breed_name], FILTER_SANITIZE_STRING);
    filter_var($insertedData[image], FILTER_SANITIZE_URL);
        if (filter_var())



}
)