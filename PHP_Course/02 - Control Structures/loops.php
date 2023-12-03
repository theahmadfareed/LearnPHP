<?php
echo "<br>";
$arr = array("Ali", "Hadi", "Mosa");
$i = 0;
while ($i < count($arr)) {
  echo $arr[$i], " ";
  $i++;
}
echo "<br>";
$j = 0;
do {
  echo $arr[$j], " ";
  $j++;
} while ($j < count($arr));
echo "<br>";
for ($i = 0; $i < count($arr); $i++) {
  echo $arr[$i], " ";
}
echo "<br>";
foreach ($arr as $item) {
  echo $item, " ";
}
echo "<br>";
$friends = array(
  "Pakistan" => "Ahmad",
  "Lahore" => "Hadi",
  "Multan" => "Tahir",
);
foreach ($friends as $city => $friend) {
  echo "{$city} = {$friend} <br>";
}
