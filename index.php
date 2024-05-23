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
/*
function divide($dividend, $divisor) {
    if ($divisor === 0) {
        throw new Exception("Division by zero is not allowed");
    }
    return $dividend / $divisor;
}

try {
  // Code that might throw an exception
  $result = divide(10, 0); // This will throw an exception
  echo $result;  // This line won't be executed
} catch (Exception $e) {
  // Handle the exception
  echo "Error: " . $e->getMessage(); // Handle the exception
} finally {
  // Code that always executes (e.g., closing a file)
}
*/

// Catching Specific Exceptions
/*
class DivisionByZeroError extends Exception {}

function divide($dividend, $divisor) {
    if ($divisor === 0) {
        throw new DivisionByZeroError("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    $result = divide(10, 0);
} catch (DivisionByZeroError $e) {
  echo "Error: " . $e->getMessage(); // Handle division by zero error
} catch (Exception $e) {
  echo "General Error: " . $e->getMessage(); // Handle other exceptions
}

*/
// Catching Custom Exceptions
/*
class MyCustomException extends Exception {
  public function __construct($message = "", $code = 0) {
    parent::__construct($message, $code);
  }
}

function validateAge($age) {
  if ($age < 18) {
    throw new MyCustomException("User must be 18 years or older");
  }
}

try {
  validateAge(15); // This will throw an exception
} catch (MyCustomException $e) {
  echo "Error: " . $e->getMessage();
}


*/
