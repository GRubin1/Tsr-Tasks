<?php

    $arrDemo = array(0, 2, 4, 6, 6, 10, 12, 12, 16, 16, 4, 22, 26);

    // Find the first number with a repeating value in the whole array.
    function firstConsecutive(array $arrVals) {
        foreach($arrVals as $key => $val) {
            if($val == $arrVals[$key + 1]) {
                return 'First consecutive value is '.$val.' at index '.$key."\n";
                break;
            }
        }
    };
    echo(firstConsecutive($arrDemo));

    // Find the first number with a same value as the previous array element.
    function firstRepeat(array $arrVals) {
        sort($arrVals);
        foreach($arrVals as $key => $val) {
            if($val == $arrVals[$key + 1]) {
                return 'First repeated value is '.$val.' at index '.$key."\n";
                break;
            }
        }
    }
    echo(firstRepeat($arrDemo));

?>