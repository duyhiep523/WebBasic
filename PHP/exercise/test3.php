<?php
// bai 1
$arr = array();
for ($i = 0; $i <= 150; $i++) {

    if ($i % 2 != 0) {
        $arr[] = $i;
    }
}
// echo "<pre>";
// print_r ($arr);
// echo "</pre>";
// ket thuc bai 1
$list_news = array(
    'hôm qua' => array(
        'title' => "Doanh nghiệp thuộc Bộ Công Thương tính sót hàng nghìn tỷ đồng khi cổ phần hóa'",
        'content' => "Cổ phần hóa doanh nghiệp Nhà nước thuộc Bộ Công Thương chậm, xác định giá trị chưa chính xác dẫn tới hàng nghìn tỷ đồng chưa tính đủ, theo Thanh tra Chính phủ."

    ),
    'hôm nay' => array(
        'title' => "Phan Công Khanh 'cầm cố xe McLaren của người khác để lấy tiền'",
        'content' => "Phan Công Khanh, trùm buôn siêu xe, bị cáo buộc lừa bà chủ chiếc McLaren đưa giấy tờ để bán giúp, sau đó mang thế chấp lấy tiền tiêu xài"
    ),
    'ngày mai' => array(
        'title' => "Ngân hàng Nhà nước cấp hết hạn mức tín dụng cả năm",
        'content' => "Hôm nay, Ngân hàng Nhà nước đã phân bổ tiếp hạn mức tăng trưởng tín dụng cho các nhà băng gần chạm mức trần cả năm 14%. "
    ),
);
$list_product = array(
    "Quần" => array(
        "màu" => "3 màu",
        "số lượng" => 100,
        "giá" => 120000
    ),
    "áo" => array(
        "màu" => "3 màu",
        "số lượng" => 111,
        "giá" => 130000
    ),
    "giày" => array(
        "màu" => "3 màu",
        "số lượng" => 222,
        "giá" => 140000
    ),
    "dép" => array(
        "màu" => "3 màu",
        "số lượng" => 333,
        "giá" => 150000
    )

);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <p class="col-12 bg-dark text-center text-white">Bài tập 3</p>
            </div>
        </div>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Tin tức</h1>
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                            foreach ($list_news as $new) {
                                ?>
                                <div class="col-4">
                                    <img src="img/tải xuống.jpg" alt="" class=".mx-auto d-block">
                                </div>
                                <div class="col-8">
                                    <h1>
                                        <?php echo $new['title'] ?>
                                    </h1>
                                    <p>
                                        <?php echo $new['content'] ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h1>Sản phẩm</h1>
                    <div class="container-fluid">
                        <div class="row">
                            <?php foreach ($list_product as $key => $value) { ?>
                                <div class="col-3">
                                    <img src="img/tải xuống.jpg" alt="">
                                    <h1>
                                        <?php echo $key ?>
                                    </h1>
                                    <div class="d-flex align-items-center">
                                        <p class="mr-2">Màu
                                            <?php echo $value["màu"] ?>
                                        </p>
                                        <p>số lượng
                                            <?php echo $value["số lượng"] ?>
                                        </p>
                                    </div>
                                    <p>
                                        giá
                                        <?php echo $value["giá"] ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </main>
    <footer>
        <div class=" container-fluid">
            <div class="row">
                <p class="col-12 bg-dark text-center text-white">Bài tập 3</p>
            </div>
        </div>
    </footer>
</body>

</html>