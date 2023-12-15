<?php include("../inc/top.php"); ?>

<!-- <p><a class="btn btn-info" href="index.php?action=them">Thêm khách hàng</a></p> -->
<h4 class="text-info">Danh sách khách hàng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">Email</th>
        <th class="text-info">Số điện thoại</th>
        <th class="text-info">Mật khẩu</th>
        <th class="text-info">Họ tên</th>
        <th class="text-info">Hình ảnh</th>
        <th class="text-info">Loại quyền</th>
        <th>Trạng thái</th>
        <th>Khóa</th>
    </tr>
    <?php
    foreach ($nguoidung as $n) :
        foreach ($quyen as $q) :
            if ($n["loai"] == "3" && $q["id"] == "3") {
    ?>
