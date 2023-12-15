<?php include("../include/top.php"); ?>

<form method="post" enctype="multipart/form-data" action="index.php">
	<input type="hidden" name="action" value="xulythem">
	<div class="md-3 mt-3">
		<label for="optquyen" class="form-label">Phân quyền</label>
		<select class="form-select" name="optquyen">
			<?php foreach ($quyen as $q) : ?>
				<option value="<?php echo $q['id']; ?>"><?php echo $q['tenquyen']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="md-3 mt-3">
		<label for="txthoten" class="form-label">Họ tên người dùng</label>
		<input class="form-control" type="text" name="txthoten" placeholder="Nhập họ tên">
	</div>
	<div class="md-3 mt-3">
		<label for="txtemail" class="form-label">Email</label>
		<input class="form-control" type="email" name="txtemail" placeholder="Nhập email">
	</div>
	<div class="md-3 mt-3">
		<label for="txtsodienthoai" class="form-label">Số điện thoại</label>
		<input class="form-control" type="number" name="txtsodienthoai" placeholder="Nhập số điện thoại">
	</div>
	<div class="md-3 mt-3">
		<label for="txtdiachi" class="form-label">Địa chỉ</label>
		<input class="form-control" type="text" name="txtdiachi" placeholder="Nhập địa chỉ">
	</div>
	<div class="md-3 mt-3">
		<label for="txtmatkhau" class="form-label">Mật khẩu</label>
		<input class="form-control" type="text" name="txtmatkhau" placeholder="Nhập mật khẩu"></input>
	</div>
	<div class="md-3 mt-3">
		<label for="txttrangthai" class="form-label">Trạng thái</label>
		<input class="form-control" type="number" name="txttrangthai" value="1"></input>
	</div>
	<div class="md-3 mt-3">
		<label>Hình ảnh</label>
		<input type="file" class="form-control" name="fileanh"></input>
	</div>
	<div class="md-3 mt-3">
		<input type="submit" value="Lưu" class="btn btn-success"></input>
		<input type="reset" value="Hủy" class="btn btn-warning"></input>
	</div>
</form>

<?php include("../include/bottom.php"); ?>