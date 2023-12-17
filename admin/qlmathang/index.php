<?php
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/mathang.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$dm = new DANHMUC();
$mh = new MATHANG();

switch ($action) {
    case "xem":
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "them":
        $danhmuc = $dm->laydanhmuc();
        include("addform.php");
        break;
    case "xulythem":
        // xử lý file upload
        // Dẫn nơi lưu theo danh mục
        $hinhanh = "img/hoa/" . $_POST["optdanhmuc"] . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan1 = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan1);

        // Dẫn nơi lưu theo giỏ hàng
        $hinhanh = "img/giohang/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan2 = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan2);
        // xử lý thêm		
        $mathanghh = new MATHANG();
        $mathanghh->settenmh($_POST["txttenmathang"]);
        $mathanghh->setmota($_POST["txtmota"]);
        $mathanghh->setgiagoc($_POST["txtgianhap"]);
        $mathanghh->setgiaban($_POST["txtgiaban"]);
        $mathanghh->setsoluongton($_POST["txtsoluong"]);
        $mathanghh->setdanhmuc_id($_POST["optdanhmuc"]);
        $mathanghh->sethinhanh($hinhanh);
        $mh->themmathang($mathanghh);

        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "xoa":
        if (isset($_GET["id"])) {
            $mathanghh = new MATHANG();
            $mathanghh->setid($_GET["id"]);
            $mh->xoamathang($mathanghh);
        }
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "chitiet":
        if (isset($_GET["id"])) {
            $m = $mh->laymathangtheoid($_GET["id"]);
            include("detail.php");
        } else {
            $mathang = $mh->laymathang();
            include("main.php");
        }
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $m = $mh->laymathangtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc();
            include("updateform.php");
        } else {

            $mathang = $mh->laymathang();
            include("main.php");
        }
        break;
    case "xulysua":
        $mathanghh = new MATHANG();
        $mathanghh->setid($_POST["txtid"]);
        $mathanghh->setdanhmuc_id($_POST["optdanhmuc"]);
        $mathanghh->settenmh($_POST["txttenhang"]);
        $mathanghh->setmota($_POST["txtmota"]);
        $mathanghh->setgiagoc($_POST["txtgiagoc"]);
        $mathanghh->setgiaban($_POST["txtgiaban"]);
        $mathanghh->setsoluongton($_POST["txtsoluongton"]);
        $mathanghh->setluotxem($_POST["txtluotxem"]);
        $mathanghh->setluotmua($_POST["txtluotmua"]);
        $mathanghh->sethinhanh($_POST["txthinhcu"]);

        // upload file mới (nếu có)
        if ($_FILES["filehinhanh"]["name"] != "") {
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            // Dẫn nơi lưu theo danh mục
            $hinhanh = "img/hoa/" . $_POST["optdanhmuc"] . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $duongdan1 = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan1);

            // Dẫn nơi lưu theo giỏ hàng
            $hinhanh = "img/giohang/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $duongdan2 = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan2);
        }

        // sửa mặt hàng
        $mh->suamathang($mathanghh);
        // hiển thị ds mặt hàng
        $mathang = $mh->laymathang();
        include("main.php");
        break;

    default:
        break;
}
