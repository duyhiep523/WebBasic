<?php
$title = "<h1>PHP <span class=``>Tutorial</span></h1>";
$content = "<p>PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.</p>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        echo "{$title}{$content}";
        ?>
    </div>
</body>

</html>