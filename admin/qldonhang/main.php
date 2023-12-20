<?php include("../include/top.php"); ?>

<h4 class="text-info">Danh sách đơn hàng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">ID đơn hàng</th>
        <th class="text-info">Người dùng</th>
        <th class="text-info">Địa chỉ</th>
        <th class="text-info">Ngày</th>
        <th class="text-info">Tổng tiền</th>
        <th class="text-info">Ghi chú</th>
        <th class="text-info">Trạng thái</th>
    </tr>
    <?php
    foreach ($donhang as $d) :
        foreach ($nguoidung as $n) :
            if ($d["nguoidung_id"] == $n["id"]) {
    ?>

                <tr>
                    <td><a href="index.php?action=chitiet&id=<?php echo $d['id']; ?>"><?php echo $d["id"]; ?></a></td>
                    <td><?php echo $n["hoten"]; ?></td>
                    <td><?php echo $n["diachi"]; ?></td>
                    <td><?php echo $d["ngay"]; ?></td>
                    <td><?php echo $d["tongtien"]; ?></td>
                    <td><?php echo $d["ghichu"]; ?></td>
                    <td><?php echo $d["trangthai"]; ?></td>
                    <td>
                    <td>
                        <?php
                        if ($d["trangthai"] == 0) {
                            echo '<a href="index.php?action=capnhat&id=' . $d['id'] . '&trangthai=1" class="btn btn-primary">Chưa giao</a>';
                        } else {
                            echo '<a href="index.php?action=capnhat&id=' . $d['id'] . '&trangthai=0" class="btn btn-success">Đã giao</a>';
                        }
                        ?>
                    </td>
                    </td>
                </tr>

    <?php
            }
        endforeach;
    endforeach;
    ?>
</table>
<?php include("../include/bottom.php"); ?>