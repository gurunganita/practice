<!-- to find the length of a string -->
<?php
$movie ="Avengers Endgame";
$length= strlen($movie);
echo "The length of $movie is $length.";
?>
<br>
<!-- to check if the given string lies in the provided input -->
 <?php
 $txt ="The world war II started in the year 1939AD.";
 var_dump(str_contains($txt,"war"));
 ?>
 <br>
 <!-- using str-count_word to cound the no. of word in the string -->
  <?php
  echo str_word_count("Nihao! It's the AI chatbot Deepseek");
  ?>
  <br>
  <br>
  <!-- using strpos to find the position of the word in the provided string -->
   <?php
   $phrase="sembedded systems includes the microchips i.e. the hardware";
   $position = strpos($phrase,"microchips");
   echo "The postion of the word microchips in the given phrase is $position.";
// echo strpos("Avengers Infinity War","Infinity");
   ?>
