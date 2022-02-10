<?php

use PHPUnit\Framework\TestCase;

require_once '../functions.php';

class functionsTest extends TestCase
{
    public function testSuccess()
    {
        //Success Test for printCatBreed
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
            "<div class='breed'> 
            <div class = 'name'>new cat breed</div> 
            <div class = 'countryOfOrigin'>Country of Origin: Alaska</div>
            <div class = 'fluffiness'>Fluffiness Rating: 5</div>
            <div class = 'photo'><img alt='Cat Photo' src='url.png'/></div>
        </div><div class='breed'> 
            <div class = 'name'>special cat breed</div> 
            <div class = 'countryOfOrigin'>Country of Origin: France</div>
            <div class = 'fluffiness'>Fluffiness Rating: 3</div>
            <div class = 'photo'><img alt='Cat Photo' src='newurl.png'/></div>
        </div>";

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
        $expected = "No cat information given!";

        $case = printCatBreed($emptyArray);

        $this->assertEquals($expected, $case);

    }

    public function testCountrySuccess() {
        $input = 'Afghanistan';
        $expected = true;
        $case = validateCountry($input);
        $this->assertEquals($expected, $case);

    }

    public function testCountryFailure() {
        $input = "hello";
        $expected = false;
        $case = validateCountry($input);
        $this->assertEquals($expected, $case);
    }

    public function testCountryMalformed () {
        $input = [1,2,3];
        $this->expectException(TypeError::class);
        validateCountry($input);
    }

    public function testFluffinessSuccess () {
        $input = 1;
        $expected = true;
        $case = validateFluffiness($input);
        $this->assertEquals($expected, $case);

    }

    public function testFluffinessFailure () {
        $input = 8;
        $expected = false;
        $case = validateFluffiness($input);
        $this->assertEquals($expected, $case);

    }

    public function testFluffinessMalformed () {
        $input = [1,2,3];
        $this->expectException(TypeError::class);
        validateFluffiness($input);

    }

    public function testCheckKeysSuccess() {
        $array = [
            'name' => 'Cat',
            'country' => 'Afghanistan',
            'fluffiness' => 5,
            'url' => 'https://www.bristolarc.org.uk/uploads/images/2021-02-19/1613752550-found-a-cat-header.jpg'];
        $expected = true;
        $case = checkKeys($array);
        $this->assertEquals($expected, $case);
    }

    public function testCheckKeysFailure() {
        $array = [
                'name' => 'Cat',
                'country' => 'Afghanistan',
                'fluffiness' => 5,
                'url' => null];
        $expected = false;
        $case = checkKeys($array);
        $this->assertEquals($expected, $case);
    }

    public function testCheckKeysMalformed() {
        $input = 'I am a string';
        $this->expectException(TypeError::class);
        validateFluffiness($input);
    }

    public function testValidateNameSuccess() {
        $input = 'Special Cat';
        $expected = true;
        $case = validateName($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateNameFailure()
    {
        $input = '';
        $expected = false;
        $case = validateName($input);
        $this->assertEquals($expected, $case);
    }

    public function testValidateNameMalformed() {
        $input = ['hello', 'bonjour', 'hola'];
        $this->expectException(TypeError::class);
        validateName($input);
    }

}
