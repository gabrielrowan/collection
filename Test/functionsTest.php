<?php

use PHPUnit\Framework\TestCase;

require_once '../functions.php';

class functionsTest extends TestCase
{
    public function testSuccess()
    {
        //Success Test
        $array =    [[  "breed_name" => "new cat breed",
                        "country_of_origin" => "Alaska",
                        "fluffiness_rating" => "5",
                        "image" => "url.png"],
                    [   "breed_name" => "special cat breed",
                        "country_of_origin" => "France",
                        "fluffiness_rating" => "3",
                        "image" => "newurl.png"]
                    ];

        $expected =
            '<div class="breed">' .
            '<div class = "name">' . "new cat breed" . '</div>' .
            '<div class = "countryOfOrigin">' . "Country of Origin: " . "Alaska" . '</div>' .
            '<div class = "fluffiness">' . "Fluffiness Rating: " . "5" . '</div>' .
            '<div class = "photo">' .  "<img src='" . "url.png" . "'/>" . '</div>' .
            '</div>' .
            '<div class="breed">' .
            '<div class = "name">' . "special cat breed" . '</div>' .
            '<div class = "countryOfOrigin">' . "Country of Origin: " . "France" . '</div>' .
            '<div class = "fluffiness">' . "Fluffiness Rating: " . "3" . '</div>' .
            '<div class = "photo">' . "<img src='" . "newurl.png" . "'/>" . '</div>' .
            '</div>';

        $case = printCatBreed($array);

        $this->assertEquals($expected, $case);

    }
    //Malformed Test
    public function testMalformed()
    {

        $input = 1;
        $this->expectException(TypeError::class);
        printCatBreed($input);

    }
    //Failure Test
    public function testFailure()

    {
        $emptyArray = [];
        $expected = "No cat informative given!";

        $case = printCatBreed($emptyArray);

        $this->assertEquals($expected, $case);

    }

}
