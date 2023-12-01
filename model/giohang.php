<?php
// Tạo mảng SESSION giohang rỗng nếu nó không tồn tại
if (!isset($_SESSION['giohang']) ) {
    $_SESSION['giohang'] = array();
}

// Hàm thêm sản phẩm vào giỏ
function themhangvaogio($id, $soluong) {
    //Cập nhập Số lượng vào SESSION - Làm tròn
    $_SESSION['giohang'][$id] = round($soluong, 0);
}


// Cập nhật số lượng của giỏ hàng
function capnhatsoluong($id, $soluong) {
    if (isset($_SESSION['giohang'][$id])) {
        $_SESSION['giohang'][$id] = round($soluong, 0);
    }
}

// Xóa một sản phẩm trong giỏ hàng
function xoamotmathang($id) {
    if (isset($_SESSION['giohang'][$id])) {
        unset($_SESSION['giohang'][$id]);
    }
}

// Hàm lấy mảng các sản phẩm trong giohang
function laygiohang() {
	
    //Tạo mảng rỗng để lưu danh sách sản phẩm trong giỏ
    $mh = array();
    $mh_db = new MATHANG();
    
    //Duyệt mảng SESSION giohang và lấy từng id sản phẩm cùng số lượng
    foreach ($_SESSION['giohang'] as $id => $soluong ) {
        // Gọi hàm lấy thông tin của sản phẩm theo mã sản phẩm
        $m = $mh_db->laymathangtheoid($id);
        $dongia = $m['giaban'];
        $solg = intval($soluong);        
        // Tính tiền
        $thtien = round($dongia * $soluong, 2);

        // Lưu thông tin trong mảng items để hiển thị lên giỏ hàng
        $mh[$id]['tenmathang'] = $m['tenmathang'];
        $mh[$id]['hinhanh'] = $m['hinhanh'];        
        $mh[$id]['giaban'] = $dongia;
        $mh[$id]['soluong'] = $solg;
        $mh[$id]['thanhtien'] = $thtien;
    }
    return $mh;
}

// Đếm số sản phẩm trong giỏ hàng
function demhangtronggio() {
    return count($_SESSION['giohang']);
}

// Đếm tổng số lượng các sản phẩm trong giỏ
function demsoluongtronggio() {
    $tongsl = 0;
	//Lấy mảng các sản phẩm từ trong SESSION
    $giohang = laygiohang();
    foreach ($giohang as $item) {
        $tongsl += $item['soluong'];
    }
    return $tongsl;
}

// Tính tổng thành tiền trong giỏ hàng
function tinhtiengiohang () {
    $tong = 0;
    $giohang = laygiohang();
    foreach ($giohang as $mh) {
        $tong += $mh['giaban'] * $mh['soluong'];
    }
    return $tong;
}

// Xóa tất cả giỏ hàng
function xoagiohang() {
    $_SESSION['giohang'] = array();
}

?>