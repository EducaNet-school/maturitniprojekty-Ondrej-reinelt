<?php

function selection_sort($numbers) {
    for ($i = 0; $i < count($numbers); $i++) {
      $min_c = $i;
      for ($j = $i + 1; $j < count($numbers); $j++) {
        if ($numbers[$j] < $numbers[$min_c]) {
          $min_c = $j;
        }
      }
      if ($min_c != $i) {
        $temp = $numbers[$i];
        $numbers[$i] = $numbers[$min_c];
        $numbers[$min_c] = $temp;
      }
    }
    return $numbers;
   
  }
  
  $numbers = [8, -3, 9, 20, 15, 90, 12];
  print_r(selection_sort($numbers));


  //bubble sort

  function bubble_sort($numbers) {
    while (true) {
      $swapped = false;
      for ($i = 0; $i < count($numbers) - 1; $i++) {
        if ($numbers[$i] > $numbers[$i + 1]) {
          $temp = $numbers[$i];
          $numbers[$i] = $numbers[$i + 1];
          $numbers[$i + 1] = $temp;
          $swapped = true;
        }
      }
      if (!$swapped) {
        break;
      }
    }
  }
  
  $numbers = [30, 70, 42, 91, 53, 2, 16, 18];
  bubble_sort($numbers);
  print_r($numbers);
  
?>