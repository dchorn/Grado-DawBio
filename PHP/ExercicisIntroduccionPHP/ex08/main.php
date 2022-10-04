<?php
// Programa que, donat un array amb una llista de paraules, dóna la posició 
// en què es troba una paraula donada o indica, si és el cas, que no hi és.

// array with different names
$array = ['Bart','Hommer','Lisa','Maggy','Marge'];

// word to search in the array 
$word = "Bart";

// for loop to search our word in the array and save his position
if (in_array($word, $array)) {
    for($i=0;$i<=sizeof($array)-1;$i++) {
        if($word == $array[$i]) {
            echo "The word is in position : " . $i;}
    };
} else { // if the word is not in the array, print that.
    echo "The word is not in the array!";
};
?>
