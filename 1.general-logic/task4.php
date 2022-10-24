<?php 
// Write a function that takes a number and returns the volume of a sphere with that diameter.   

$diameter = readline('Enter the diameter: '); 

function getVolume(string $d) {
    $volume = (4 / 3) * (pi() * pow(($d / 2), 3));
    echo 'Volume of sphere is: '.$volume;
}

print_r(getVolume($diameter));

?>