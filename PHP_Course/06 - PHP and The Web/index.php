<?php
echo "PHP and Web";
session_start() or die("Session not start");
$_SESSION['demo'] = 5;
echo "<br>" . $_SESSION['demo'] . "<br>";
$id = 5;
setcookie("demo", $id, time() + (60 * 60 * 24 * 7));
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and Web</title>
</head>

<body>

    <ul>
        <li>
            <p>Forms($_GET[], $_POST[])
                <br>Example Code:
            </p>
        </li>
        <li>
            <p>Links(href="get.php?id=<?php echo $id ?>")
                <br>Example Code:
            </p>
        </li>
        <li>
            <p>Cookies($_COOKIES['demo'], setcookie('demo', <?php echo $id ?>, time()+(60*60*24*7)))
                <br>Example Code:
            </p>
        </li>
        <li>
            <p>Sessions($_SESSION['demo'], session_start(), session_destroy(), header())
                <br>Example Code:
            </p>
        </li>
    </ul>

</body>

</html>