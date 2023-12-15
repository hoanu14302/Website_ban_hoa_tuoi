<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/donhang.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$dh = new DONHANG();
$nd = new NGUOIDUNG();

switch ($action) {
    case "xem":
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("main.php");
        break;
    case "them":
        $donhang = $pq->laydonhang();

        include("add.php");
        break;
    case "xulythem":
       
        break;
   
    default:
        break;
}
