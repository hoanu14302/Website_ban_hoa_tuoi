<?php 
require("../../model/database.php");
require("../../model/danhmuc.php");

//Xét người dùng có đăng nhập chưa
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}

$dm = new DANHMUC();
$idsua = 0;

switch($action){
    case "xem":
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "sua": // hiển thị form
    	$idsua = $_GET["id"];
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "capnhat": // lưu dữ liệu sửa mới vào db
    	// gán dữ liệu từ form
    	$dmmoi = new DANHMUC();
    	$dmmoi->setid($_POST["id"]);
    	$dmmoi->settendm($_POST["ten"]);
    	// sửa
    	$dm->suadanhmuc($dmmoi);
    	// load danh sách
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "them":
    	// gán dữ liệu từ form
    	$dmmoi = new DANHMUC();
    	$dmmoi->settendm($_POST["ten"]);
    	// thêm
    	$dm->themdanhmuc($dmmoi);
    	// load danh sách
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    case "xoa":
    	// lấy dòng muốn xóa
    	$dmxoa = new DANHMUC();
    	$dmxoa->setid($_GET["id"]);
    	// xóa
    	$dm->xoadanhmuc($dmxoa);
    	// load danh sách
        $danhmuc = $dm->laydanhmuc();       
        include("main.php");
        break;
    default:
        break;
}
?>
