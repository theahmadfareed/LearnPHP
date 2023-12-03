// Arrays
<!-- 
$arr = array("Ali", "Hadi", "Mosa");
$friends = array(
"Pakistan" => "Ahmad",
"Lahore" => "Hadi",
"Multan" => "Tahir",
);
//
$arr = ["Ali", "Hadi", "Mosa"];
$friends = [
"Pakistan" => "Ahmad",
"Lahore" => "Hadi",
"Multan" => "Tahir",
]; 
-->

<?php

echo "<br>";
$arr = ["Ali", "Hadi", "Mosa", 29, 27, 26, true, 5.5, null, "<h1>Hello World</h1>"];
foreach ($arr as $item) {
  echo $item, " ";
}

echo "<br>";
$friends = [
  "Pakistan" => "Ahmad",
  "Lahore" => "Hadi",
  "Multan" => "Tahir",
];
foreach ($friends as $city => $friend) {
  echo "{$city} = {$friend} <br>";
}
?>