<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");
// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
// Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
} else {
    $action = "macdinh";
}
$nd = new NGUOIDUNG();
$pq = new QUYEN();
$mh = new MATHANG();
$dm = new DANHMUC();
switch ($action) {
    case "macdinh":
        $mathanghh = $mh->laymathanghethang();
        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;

    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            if (isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"] !== null && isset($_SESSION["nguoidung"]["loai"])) {

                $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
                $mathanghh = $mh->laymathanghethang();
                include("main.php");
            } else {
                echo "Bạn không có quyền truy cập!";
                include("login.php");
            }
        } else {
            echo "Email hoặc mật khẩu không đúng!";
            include("login.php");
        }
        break;

    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        include("login.php");
        break;
    case "hoso":
        include("profile.php");
        break;
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodt = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            $duongdan = "../../img/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        }
        $nd->capnhatnguoidung($mand, $email, $sodt, $hoten, $hinhanh, $diachi);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("main.php");
        break;
    case "xoa":
        $mhxoa = new mathang();
        $mhxoa->setid($_GET["id"]);
        $mathang = $mh->xoamathang($mhxoa);
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $m = $mh->laymathangtheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc();
            include("../qlmathang/updateform.php");
        } else {
            $mathang = $mh->laymathang();
            include("main.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // Khởi tạo mảng lưu trữ các thông báo lỗi
        $errors = [];

        // Kiểm tra và xử lý dữ liệu khi người dùng gửi form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Kiểm tra và xử lý dữ liệu ở đây
            // Kiểm tra nếu trường tên mặt hàng rỗng
            if (empty($_POST["txttenmh"])) {
                $errors[] = "Vui lòng nhập tên mặt hàng.";
            }
            // Kiểm tra nếu trường mô tả rỗng
            if (empty($_POST["txtmota"])) {
                $errors[] = "Vui lòng nhập mô tả mặt hàng.";
            }

            // Kiểm tra nếu trường giá bán rỗng hoặc không phải số
            if (empty($_POST["txtgiaban"]) || !is_numeric($_POST["txtgiaban"])) {
                $errors[] = "Vui lòng nhập giá bán hợp lệ.";
            }

            // Kiểm tra nếu trường số lượng tồn rỗng hoặc không phải số
            if (empty($_POST["txtsoluongton"]) || !is_numeric($_POST["txtsoluongton"])) {
                $errors[] = "Vui lòng nhập số lượng tồn hợp lệ.";
            }
            // Nếu không có lỗi, tiến hành xử lý và cập nhật dữ liệu
            if (empty($errors)) {
                // gán dữ liệu từ form
                $mhsua = new mathang();
                $mhsua->setid($_POST["txtid"]);
                $mhsua->setmota($_POST["txtmota"]);
                $mhsua->setdanhmuc_id($_POST["optdanhmuc"]);
                $mhsua->settenmh($_POST["txttenmh"]);
                $mhsua->setgiaban($_POST["txtgiaban"]);
                $mhsua->setsoluongton($_POST["txtsoluongton"]);
                $mhsua->sethinhanh($_POST["txthinhcu"]);
                $mhsua->setluotxem($_POST["txtluotxem"]);
                $mhsua->setluotmua($_POST["txtluotmua"]);

                if ($_FILES["filehinhanh"]["name"] != "") {
                    //xử lý load ảnh
                    // Dẫn nơi lưu theo danh mục
                    $hinhanh = "img/hoa/" . $_POST["optdanhmuc"] . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
                    $duongdan1 = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
                    move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan1);

                    // Dẫn nơi lưu theo giỏ hàng
                    $hinhanh = "img/giohang/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
                    $duongdan2 = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
                    move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan2);
                }
                // sửa
                $mh->suamathang($mhsua);
            }
            // load danh sách
            $mathanghh = $mh->laymathanghethang();
            include("main.php");
            break;
        }
    default:
        break;
}
