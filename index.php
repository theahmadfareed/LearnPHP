<?php
echo "Hello World from PHP and Ahmad!";

//  Constants
define("NAME", "Muhammad");
const DB_HOST = 'localhost';


//  Variables
/*
$name = "Ali";
$age = 29;
$height = 5.8;
$subjects = array("ML", "CV", "DIP");
$subjects = ["ML", "CV", "DIP"];
$married = false;
$children = null;
*/


//  Operators
/*
 * Comparison = [==, ===, <,>, <=,>=, <>, !=, !==]
 * Arithmetic = [+, -, *, /, **, %, ++, --]
 * Logical = [&&, ||, !]
 * Operator Precedence = [() -> ** -> *,/,% -> +,-]
*/


//  Math Functions
/*
 * abs(-5)
 * round(5.6)
 * floor(5.4)
 * ceil(5.4)
 * pow(10, 2)
 * sqrt(4)
 * max(5,6,100)
 * min(5,6,100)
 * pi()
 * rand(1, 6)
*/


//  String Functions
/*
 * strtolower()
 * strtolower()
 * trim()
 * str_pad()
 * str_replace()
 * strrev()
 * str_shuffle()
 * strcmp()
 * strlen()
 * strpos()
 * substr()
 * explode()
 * implode()
*/


//  Conditional Statements
//  Loops


//  Arrays
/*
echo "<br>";
$arr = array("Ali", "Hadi", "Mosa");
foreach ($arr as $item) {
    echo $item, " ";
}
*/

//  Associative Arrays
/*
echo "<br>";
$friends = array(
    "Pakistan" => "Ahmad",
    "Lahore" => "Hadi",
    "Multan" => "Tahir",
    );
foreach ($friends as $city => $friend) {
    echo "{$city} = {$friend} <br>";
}
*/

//  Array Functions
/*
 * count()
 * array_push()
 * array_pop()
 * array_shift()
 * array_reverse()
 * array_keys()
 * array_values()
 * array_flip()
 * in_array()
*/


//  isset(), empty()
//  Include()
//  Custom Functions


//  Sanitize & Validate Input
/*
filter_input(INPUT_POST, username, FILTER_SANITIZE_SPECIAL_CHARS);
filter_input(INPUT_POST, password, FILTER_SANITIZE_SPECIAL_CHARS);
filter_input(INPUT_POST, email, FILTER_SANITIZE_EMAIL);
filter_input(INPUT_POST, age, FILTER_SANITIZE_NUMBER_INT);
*/


//  Cookies
/*
 * setcookie(,,,)
 * $_COOKIE[]
*/

//  Session
/*
 * session_start()
 * session_destroy()
 * $_SESSION[]
 * header()
*/

//  Server
/*
 * htmlspecialchars($_SERVER["PHP_SELF"])
 * $_SERVER["REQUEST_METHOD"]
*/

//  Hashing
/*
 * password_hash($password, PASSWORD_DEFAULT)
 * password_verify(,)
*/


//  Connecting to Database
/*
 * MySQL = mysqli_connect(), mysqli_query(), mysqli_close(), mysqli_sql_exception, mysqli_num_rows, mysqli_fetch_assoc
 * MongoDB =
 * PostgreSQL =
*/


//  Exception Handling
