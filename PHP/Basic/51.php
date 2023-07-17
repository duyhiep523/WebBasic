<?php
$listUsers = array(
    1 => array(
        'id' => "01",
        'name' => "Nguyễn Văn A",
        'age' => 20
    ),
    2 => array(
        'id' => "02",
        'name' => "Nguyễn Văn B",
        'age' => 21
    ),
    3 => array(
        'id' => "03",
        'name' => "Nguyễn Văn C",
        'age' => 22
    )
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đẩy dữ liệu mảng lên table</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #D6EEEE;
    }
</style>

<body>
    <?php
    // unset($listUsers);
    if (!empty($listUsers) && is_array($listUsers)) {
        ?>
        <table width="50%">
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Tuổi</th>
            </tr>
            <?php
            $temp = 0;
            foreach ($listUsers as $user) {
                $temp++;
                ?>
                <tr>
                    <td>
                        <?php echo $temp ?>
                    </td>
                    <td>
                        <?php echo $user['id'] ?>
                    </td>
                    <td>
                        <?php echo $user['name'] ?>
                    </td>
                    <td>
                        <?php echo $user['age'] ?>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    <?php } else { ?>
        <p>
            khong co
        </p>
    <?php } ?>

</body>

</html>
