<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/chuongtrinhkhuyenmai.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$km = new CHUONGTRINHKHUYENMAI();

switch ($action) {
    case "xem":
        $khuyenmai = $km->laykhuyenmai();
        include("main.php");
        break;
    case "them":
        include("add.php");
        break;
    case "xulythem":
        // xử lý file upload
		$hinhanh = "img/caurosel/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        //xử lý thêm mặt hàng
        $kmmoi = new CHUONGTRINHKHUYENMAI();
        $kmmoi->setten_km($_POST["txttenkm"]);
        $kmmoi->setmota($_POST["txtmota"]);
        $kmmoi->setphantramgiam($_POST["txtphantram"]);
        $kmmoi->sethinhanh_km($hinhanh);
        $km->themkhuyenmai($kmmoi);

        $khuyenmai = $km->laykhuyenmai();
        include("main.php");
        break;
    default:
        break;
}
