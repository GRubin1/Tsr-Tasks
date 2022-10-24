<?php 
/* Write a function that takes a string containing a sentence or (body of text) and a
second string containing a word and returns the number of times the word appears in
the string. */  

$sentence = readline('Enter sentence: ');
$word = readline('Enter searh word: ');

function countWords(string $sentence, string $word)
{
    $arrWord = explode(' ', $sentence);

    $uniqArr = array_count_values($arrWord);

    print_r($uniqArr[$word]);
}

echo countWords($sentence, $word);

?>
