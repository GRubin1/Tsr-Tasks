<?php
// 

$inputNum = readline('Enter a number: ');

function getPrimes($baseNum, $arrPrimes) {

    function checkPrime($checkNum) {
        $skip = 0;

        if($checkNum < 1){ 
            return false;
        }

        for($i = 2; $i < $checkNum; $i++) {
            if($checkNum % $i == 0) {
                $skip++;
                return false;
                break;
            }
        }

        if($skip == 0) {
            return true;
        }

        return false;
    }

    for($i = $baseNum + 1; count($arrPrimes) < 20; $i++) { 
       $isPrime = checkPrime($i);

       if($isPrime){
        array_push($arrPrimes, $i);
       }
    }

    return $arrPrimes;
}

print_r(getPrimes($inputNum, []))
?>
