// Math Functions
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

// String Functions
/*
* strlen()
* strrev()
* str_shuffle()
* strcmp()
* strpos()
* substr()
* str_replace()
* strtolower()
* strtolower()
* trim()
* str_pad()
* explode()
* implode()
*/

// Array Functions
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

// isset(), empty(), Include()

<?php
function display_message($message)
{
  return "<br><h1>$message</h1><br>";
}

$message = display_message("Hello ALi!");
echo $message;
?>