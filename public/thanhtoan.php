<?php include("include/top.php"); ?>
<form method="post" action="../public/index.php">
    <div class="row">
        <input type="hidden" name="action" value="htdonhang">
        <h3 class="text-dark text-left">Vui lòng xác nhận thông tin</h3>
        <div class="col-6 ">
            <div class="card-header">
                <h4 class="text-info text-left">Thông tin khách hàng</h4>
            </div>
            <div class="card-body">
                <input type="hidden" name="txtid" value="<?php echo $_SESSION['nguoidung']['id']; ?>">
                <input type="hidden" name="txttongtien" value="<?php echo number_format(tinhtiengiohang()); ?>">

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
            </div>
        </div>
        <div class="col-6">
            <div class="card-header">
                <h4 class="text-info text-left">Thông tin đơn hàng</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
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
                            <td><input type="hidden" name="txtid_mh" value="<?php echo $mh["id"]; ?>"><?php echo $mh["id"]; ?></td>
                            <td><img width="50" src="../img/giohang/<?php echo $mh["hinhanh"]; ?>" alt=""></td>
                            <td><input type="hidden" name="txttenmh" value="<?php echo $mh["tenmh"]; ?>"><?php echo $mh["tenmh"]; ?></td>
                            <td><input type="hidden" name="txtdongia" value="<?php echo number_format($mh["giaban"]); ?>"><?php echo number_format($mh["giaban"]); ?>đ</td>
                            <td><input type="hidden" name="txtsl" value="<?php echo $mh["soluong"]; ?>"><?php echo $mh["soluong"]; ?></td>
                            <td><input type="hidden" name="txtthanhtien" value="<?php echo number_format($mh["thanhtien"]); ?>"><?php echo number_format($mh["thanhtien"]); ?>đ</td>

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
                <div>Ghi chú
                    <br>
                    <textarea name="txtghichu" id="ghichu" cols="50" rows="6"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include("include/bottom.php"); ?>