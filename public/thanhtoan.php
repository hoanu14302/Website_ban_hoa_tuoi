<?php include("include/top.php"); ?>
<div class="row ">
    <h3 class="text-dark text-left">Vui lòng xác nhận thông tin</h3>
    <div class="col-6 ">
        <div class="card-header">
            <h4 class="text-info text-left">Thông tin khách hàng</h4>
        </div>
        <div class="card-body">
            <form method="post" action="../public/index.php">
                <input type="hidden" name="txtid" value="<?php echo $_SESSION['nguoidung']['id']; ?>">
                <input type="hidden" name="txttongtien" value="<?php echo number_format(tinhtiengiohang()); ?>">
                <input type="hidden" name="action" value="htdonhang">
                <div class="my-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="txtemail" value="<?php echo $_SESSION['nguoidung']['email']; ?>" required>
                </div>
                <div class="my-3">
                    <label for="txtsdt" class="form-label">Số điện thoại:</label>
                    <input type="number" class="form-control" id="sdt" placeholder="Số điện thoại" name="txtsdt" value="<?php echo $_SESSION['nguoidung']['sodienthoai']; ?>" required>
                </div>
                <div class="my-3">
                    <label for="txthoten" class="form-label">Họ tên:</label>
                    <input type="text" class="form-control" id="hoten" placeholder="Họ tên" name="txthoten" value="<?php echo $_SESSION['nguoidung']['hoten']; ?>" required>
                </div>
                <div class="my-3">
                    <label for="txtdiachi" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="txtdiachi" value="<?php echo $_SESSION['nguoidung']['diachi']; ?>" required>
                </div>
                <div class="my-3 text-left">
                    <input class="btn btn-primary" type="submit" value="Hoàn tất đơn hàng">
                </div>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="card-header">
            <h4 class="text-info text-left">Thông tin đơn hàng</h4>
        </div>
        <div class="card-body">
            <form action="post">
                <!-- <input type="hidden" name="txtsl" value="<php echo $_SESSION['giohang']['solg']; ?>"> -->
                <table class="table table-bordered">
                    <tr>
                        <th class="text-white bg-info">Sản phẩm</th>
                        <th class="text-white bg-info">Đơn giá</th>
                        <th class="text-white bg-info">Số lượng</th>
                        <th class="text-white bg-info">Thành tiền</th>
                    </tr>
                    <?php foreach ($giohang as $id => $mh): ?>
                        <input type="hidden" name="txtsl" value="<?php echo $mh['soluong']; ?>">
                        <tr>
                            <td><img width="50" src="../img/giohang/<?php echo $mh["hinhanh"]; ?>" alt=""> <?php echo $mh["tenmh"]; ?></td>
                            <td><?php echo number_format($mh["giaban"]); ?>đ</td>
                            <td><?php echo $mh['soluong']; ?></td>
                            <td><?php echo number_format($mh["thanhtien"]); ?>đ</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="text-white bg-info">
                            <dt>Tổng tiền</dt>
                        </td>
                        <td class="text-white bg-info">
                            <dt><?php echo number_format(tinhtiengiohang()); ?>đ</dt>
                        </td>
                    </tr>
                </table>
                <div class="my-3 text-left">
                    <input class="btn btn-primary" type="submit" value="Hoàn tất đơn hàng">
                </div>

            </form>
        </div>
    </div>
</div>
<?php include("include/bottom.php"); ?>