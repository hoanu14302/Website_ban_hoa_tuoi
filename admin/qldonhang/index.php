<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/donhang.php");
require("../../model/mathang.php");
require("../../model/detail_donhang.php");

$n = new NGUOIDUNG();

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$dh = new DONHANG();
$nd = new NGUOIDUNG();
$mh = new MATHANG();
$dhct = new DONHANGCT();
switch ($action) {
    case "xem":
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "chitiet":
        if (isset($_GET["id"])) {
            $id_dh = $_GET["id"];
            // tăng lượt xem lên 1
            $donhanghh = $dh->laydonhangtheoid($id_dh);
            $donhangct = $dhct->laydonhangct();
            $mathang = $mh->laymathang();
            include("detail.php");
        }
        break;
    case "capnhat": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form
        $donhang_id = $_GET["id"];
        $trangthai = $_GET["trangthai"];
        // sửa
        $dh->capnhattrangthai($donhang_id, $trangthai);        
        // load danh sách
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    default:
        break;
}
