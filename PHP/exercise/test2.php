<?php
$list_member = array(
    'name' => "Hiệp",
    'age' => "1998",
    'weight' => "57kg"
);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <p>Tôi là <strong>
            <?php echo $list_member['name'] ?>
        </strong>,sinh năm <strong>
            <?php echo $list_member['age'] ?>
        </strong>, cân nặng <strong>
            <?php echo $list_member['weight'] ?>
        </strong></p>
</body>

</html>