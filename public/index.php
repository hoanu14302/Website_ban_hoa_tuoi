<?php
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/mathang.php");
require("../model/giohang.php");
require("../model/nguoidung.php");
require("../model/donhang.php");
require("../model/detail_donhang.php");
require("../model/chuongtrinhkhuyenmai.php");

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$mh = new MATHANG();
$mathangxemnhieu = $mh->laymathangxemnhieu();
$mathangmuanhieu = $mh->laymathangmuanhieu();
$nd = new NGUOIDUNG();
$nguoidung = $nd->laydanhsachnguoidung();
$dh = new DONHANG();
$dhct = new DONHANGCT();
// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "null";
}

switch ($action) {
    case "null":
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "group":
        if (isset($_REQUEST["id"])) {
            $madm = $_REQUEST["id"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendm"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        } else {
            include("main.php");
        }
        break;
    case "detail":
        if (isset($_GET["id"])) {
            $mahang = $_GET["id"];
            $dm = $_GET["danhmuc"];
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
        if (isset($_REQUEST["danhmuc"]))
            $dm = $_GET["danhmuc"];
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
                    xoamotmathang($id);
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
    case "dangnhap":
        include("dangnhap.php");
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
            if ($_SESSION["nguoidung"]["loai"] == "3") {
                $mathang = $mh->laymathang();
                include("main.php");
            } else {
            }
        } else {
            include("dangnhap.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "dangky":
        include("dangky.php");
        break;
    case "xldangky":
        $loai = $_POST["txtloai"];
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fhinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../images/products/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        //xử lý thêm mặt hàng
        $nguoidungmoi = new NGUOIDUNG();
        $nguoidungmoi->setemail($_POST["txtemail"]);
        $nguoidungmoi->setsodienthoai($_POST["txtsodienthoai"]);
        $nguoidungmoi->setmatkhau($_POST["txtmatkhau"]);
        $nguoidungmoi->sethoten($_POST["txthoten"]);
        $nguoidungmoi->setloai($loai);
        $nguoidungmoi->settrangthai($_POST["txttrangthai"]);
        $nguoidungmoi->setdiachi($_POST["txtdiachi"]);
        $nguoidungmoi->sethinhanh($hinhanh);
        // thêm
        $nd->themnguoidung($nguoidungmoi);
        // load 
        $mathang = $mh->laymathang();
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($_POST["txtemail"]);
        include("main.php");
        break;
    case "hoso":
        include("hoso.php");
        break;
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodt = $_POST["txtsdt"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];
        $diachi = $_POST["txtdiachi"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            $duongdan = "../images/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        }
        $nd->capnhatnguoidung($mand, $email, $sodt, $hoten, $hinhanh, $diachi);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("hoso.php");
        break;
    case "thanhtoan":
        // Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
        if ($isLogin == FALSE) {
            include("dangnhap.php");
        } else {
            $giohang = laygiohang();
            include("thanhtoan.php");
        }
        break;
    case "htdonhang":
        // Thêm đơn hàng mới
        $donhangmoi = new DONHANG();
        $ngay = date("Y-m-d");
        $ghichu = "";
        $donhangmoi->setnguoidung_id($_SESSION["id"]);
        $donhangmoi->setngay($ngay);
        $donhangmoi->settongtien($_POST["txttongtien"]);
        $donhangmoi->setghichu($ghichu);
        $dh->themdonhang($donhangmoi);

        // Lấy ID của đơn hàng mới tạo
        $donhang_id = $donhangmoi->getid();

        // // Thêm đơn hàng chi tiết
        // $dhctmoi = new DONHANGCT();
        // $dhctmoi->setdonhang_id($donhang_id);
        // $dhctmoi->setmathang_id($_SESSION["mathang_id"]);
        // $thanhtien = $dhctmoi->setthanhtien();
        // // $dhctmoi->setghichu($ghichu);
        // $dhct->themdonhangct($dhctmoi);

        xoagiohang();
        $mathang = $mh->giamsoluong($_POST["txtid"], $_POST["txtsl"]);
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "search":
        if (isset($_POST["timkiem"])) {
            $ten_tk = $_POST["txtsearch"];
            if ($ten_tk != "") {
                // lấy thông tin sản phẩm
                $mathang = $mh->timkiemmathang($ten_tk);
                include("timkiem.php");
            } else {
                $mathang = $mh->laymathang();
                include("main.php");
            }
        }
        break;
    default:
        break;
}
