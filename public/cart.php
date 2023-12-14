<?php include("include/top.php"); ?>
<?php
if (demhangtronggio() == 0) { ?>
    <h3 class="text-info">Giỏ hàng rỗng!</h3>
    <p>Vui lòng chọn sản phẩm...</p>
<?php } else { ?>
    <h3 class="text-info">Giỏ hàng của bạn: </h3>
    <form action="index.php">
        <table class="table table-hove">
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên hàng</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php foreach ($giohang as $id => $mh) : ?>
                <tr>
                    <td><?php echo $mh["id"]; ?></td>
                    <td><img width="50" src="../img/hoa/<?php echo $dm ?>/<?php echo $mh["hinhanh"]; ?>" alt=""> </td>
                    <td><?php echo $mh["tenmh"]; ?></td>
                    <td><?php echo number_format($mh["giaban"]); ?>đ</td>
                    <td><input type="number" name="mh[<?php echo $id; ?>]" id="" value="<?php echo $mh["soluong"]; ?>"> </td>
                    <td><?php echo number_format($mh["thanhtien"]); ?>đ</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"></td>
                <td class="fw-bold">Tổng tiền</td>
                <td class="text-danger fw-bold">
                    <?php echo number_format(tinhtiengiohang()); ?>đ
                </td>
            </tr>
        </table>
        <div class="row">
            <div class="col">
                <a href="index.php?action=xoagiohang">Xóa giỏ hàng</a>
                (Xóa một mặt hàng nhập số lượng = 0)
            </div>
            <div class="col text-end">
                <input type="hidden" name="action" value="capnhatgio">
                <input type="submit" class="btn btn-warning" value="Cập nhật">
                <a href="index.php?action=thanhtoan" class="btn btn-success">Thanh toán</a>
            </div>
        </div>
    </form>
<?php } //end if 
?>
<?php include("include/bottom.php"); ?>