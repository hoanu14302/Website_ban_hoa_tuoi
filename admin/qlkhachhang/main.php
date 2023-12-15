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
                <tr>
                    <td><?php echo $n["email"]; ?></td>
                    <td><?php echo $n["sodienthoai"]; ?></td>
                    <td><?php echo $n["matkhau"]; ?></td>
                    <td><?php echo $n["hoten"]; ?></td>
                    <td><img width="50px" src="../../images/users/<?php echo $n["hinhanh"]; ?>" alt="<?php echo $n["hinhanh"]; ?>"></td>
                    <td><?php echo $q["tenquyen"]; ?></td>
                    <td><?php if ($n["trangthai"] == 1) { ?>
                            <dt class=" text-success font-weight">Hoạt động</dt>
                        <?php } else { ?>
                            <dt class=" text-danger">Khóa</dt>

                        <?php } ?>
                    </td>
                    <td><a href="index.php?action=khoa&id=<?php echo $n['id']; ?>&trangthai=<?php echo $n['trangthai']; ?>" class="btn btn-warning">Khóa</a></td>
                </tr>
    <?php
            }
        endforeach;
    endforeach;
    ?>
</table>
<?php include("../inc/bottom.php"); ?>