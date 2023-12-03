<?php
echo "Hello";
$handle = fopen("demo.txt", "w");
fwrite($handle, "Hello World from PHP!");
fclose($handle);
$handle = fopen("demo.txt", "r");
$text = fread($handle, filesize("demo.txt"));
echo "<br>" . $text;
fclose($handle);

unlink("demo.txt");
