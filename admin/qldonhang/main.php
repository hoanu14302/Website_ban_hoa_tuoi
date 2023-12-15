<?php include("../include/top.php"); ?>

<h4 class="text-info">Danh sách đơn hàng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">Người dùng</th>
        <th class="text-info">Địa chỉ</th>
        <th class="text-info">Ngày</th>
        <th class="text-info">Tổng tiền</th>
        <th class="text-info">Ghi chú</th>
    </tr>
    <?php
    foreach ($donhang as $d) :
            foreach ($nguoidung as $n) :
                if ($d["nguoidung_id"] == $n["id"]) {
    ?>
                    <tr>
                        <td><?php echo $n["hoten"]; ?></td>
                        <td><?php echo $n["diachi"]; ?></td>
                        <td><?php echo $d["ngay"]; ?></td>
                        <td><?php echo $d["tongtien"]; ?></td>
                        <td><?php echo $d["ghichu"]; ?></td>
                    </tr>
    <?php
                }
            endforeach;
        endforeach;
    ?>
</table>
<?php include("../include/bottom.php"); ?>