<?php
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
