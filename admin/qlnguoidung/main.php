<?php include("../include/top.php"); ?>

<p><a class="btn btn-info" href="index.php?action=them">Thêm người dùng</a></p>
<h4 class="text-info">Danh sách người dùng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">Hình ảnh</th>
        <th class="text-info">Email</th>
        <th class="text-info">Số điện thoại</th>
        <th class="text-info">Địa chỉ</th>
        <th class="text-info">Họ tên</th>
        <th class="text-info">Loại quyền</th>
        <th>Trạng thái</th>
        <th>Khóa</th>
    </tr>
    <?php
    foreach ($nguoidung as $n) :
        foreach ($quyen as $q) :
            if ($n["loai"] == $q["id"]) {
    ?>
                <tr>
                    <td><img src="../../img/users/<?php echo $n["hinhanh"]; ?>" alt="" srcset="" style="width: 150px;height: 150px;"></td>
                    <td><?php echo $n["email"]; ?></td>
                    <td><?php echo $n["sodienthoai"]; ?></td>
                    <td><?php echo $n["diachi"]; ?></td>
                    <td><?php echo $n["hoten"]; ?></td>
                    <td><?php echo $q["tenquyen"]; ?></td>
                    <td><?php if ($n["trangthai"] == 1) { ?>
                            <dt class=" text-primary font-weight">Hoạt động</dt>
                        <?php } else { ?>
                            <dt class=" text-danger">Khóa</dt>

                        <?php } ?>
                    </td>
                    <td>
                        <?php
                        $trangthai = $n['trangthai'];
                        $buttonText = ($trangthai == '0') ? 'Mở khóa' : 'Khóa';
                        $buttonClass = ($trangthai == '0') ? 'btn btn-success' : 'btn btn-warning';
                        ?>
                        <a href="index.php?action=khoa&id=<?php echo $n['id']; ?>&trangthai=<?php echo $n['trangthai']; ?>" class="<?php echo $buttonClass; ?>"><?php echo $buttonText; ?></a>
                    </td>
                </tr>
    <?php
            }
        endforeach;
    endforeach;
    ?>
</table>
<?php include("../include/bottom.php"); ?>