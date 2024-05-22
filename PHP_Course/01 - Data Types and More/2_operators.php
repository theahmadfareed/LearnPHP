// Operators
<!-- 
Comparison = [==, ===, <,>, <=,>=, <>, !=, !==]
Arithmetic = [+, -, *, /, **, %, ++, --]
Logical = [&&, ||, !]
Operator Precedence = [() -> ** -> *,/,% -> +,-] 
-->

<?php
echo "<br>", 5 + 2, "<br>";
echo 5 - 2, "<br>";
echo 5 / 2, "<br>";
echo 5 * 2, "<br>";
echo 5 ** 2, "<br>";
echo 5 % 2, "<br>";
$a = 6;
echo $a++, "<br>";
echo $a--, "<br>";

if ($a != 5 || $a > 5) {
  echo "Hello";
}
