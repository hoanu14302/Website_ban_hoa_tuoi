<?php 
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/mathang.php");


$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$mh = new MATHANG();
$mathangxemnhieu = $mh->laymathangxemnhieu();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action){
    case "null": 	
    	$mathang = $mh->laymathang();	
        include("main.php");
        break;
    case "group": 
        if(isset($_REQUEST["id"])){
            $madm = $_REQUEST["id"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];   
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
    case "detail": 
        if(isset($_GET["id"])){
            $mahang = $_GET["id"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
        break;
        case "chovaogio":
            if (isset($_REQUEST["id"]))
                $id = $_REQUEST["id"];
            if (isset($_REQUEST["soluong"]))
                $soluong = $_REQUEST["soluong"];
            else
                $soluong = "1";
            if (isset($_SESSION["giohang"][$id])) {
                $soluong += $_SESSION["giohang"][$id];
                $_SESSION["giohang"][$id] = $soluong;
            } else {
                themhangvaogio($id, $soluong);
            }
            $giohang = laygiohang();
            include("cart.php");
            break;
        case "xemgiohang":
            $giohang = laygiohang();
            include("cart.php");
            break;
        case "capnhatgio":
            if (isset($_REQUEST["mh"])) {
                $mh = $_REQUEST["mh"];
                foreach ($mh as $id => $soluong) {
                    if ($soluong > 0)
                        capnhatsoluong($id, $soluong);
                    else
                        xoamotsanpham($id);
                }
            }
            $giohang = laygiohang();
            include("cart.php");
            break;
        case "xoagiohang":
            xoagiohang();
            $giohang = laygiohang();
            include("cart.php");
            break;
    
    default:
        break;
}
?>
