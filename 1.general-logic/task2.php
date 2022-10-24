<?php 
    // Write a function that returns the number of vowels and consonants in a string (as separate values).

    $inputVal = readline('Enter a string: ');

    function getVowels(string $str) {
        $arrVowels = array('a','e','i','o','u');
        $arrStr = str_split($str);
        $arrStr = array_filter($arrStr, function($value) {
            return (!is_null($value) && $value !== ' ');
        });

        $vowels = [];
        $cons = [];

        foreach($arrStr as $key => $value) {
            if(in_array(strtolower($value), $arrVowels)) {
                array_push($vowels, $value);
            } else {
                array_push($cons, $value);
            }
        }

        $output = array(
            'vowels' => array(
                'count' => count($vowels),
                'data' => $vowels),
            'cons' => array(
                'count' => count($cons),
                'data' => $cons),
        );

        return $output;
    }

    $stringData = getVowels($inputVal);

    $output = 'Number of vowels: '.$stringData['vowels']['count']."\n"."Number of consonants: ".$stringData['cons']['count'];
    echo($output);
    exit;

?>