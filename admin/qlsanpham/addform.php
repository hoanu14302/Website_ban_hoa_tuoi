<?php include("../inc/top.php"); ?>

<h3>Thêm mặt hàng</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="action" value="xulythem">
<div class="mb-3 mt-3">
	<label for="optdanhmuc" class="form-label">Hãng sản xuất</label>
	<select class="form-select" name="optdanhmuc">
	<?php
	foreach($danhmuc as $d):
	?>
		<option value="<?php echo $d["id"]; ?>"><?php echo $d["tendanhmuc"]; ?></option>
	<?php
	endforeach;
	?>
	</select>
</div>
<div class="mb-3 mt-3">
	<label for="txttenmathang" class="form-label">Tên mặt hàng</label>
	<input class="form-control" type="text" name="txttenmathang" placeholder="Nhập tên" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtgianhap" class="form-label">Giá nhập</label>
	<input class="form-control" type="number" name="txtgianhap" value="0">
</div>
<div class="mb-3 mt-3">
	<label for="txtgiaban" class="form-label">Giá bán</label>
	<input class="form-control" type="number" name="txtgiaban" value="0">
</div>
<div class="mb-3 mt-3">
	<label for="txtsoluong" class="form-label">Số lượng</label>
	<input class="form-control" type="number" name="txtsoluong" value="0">
</div>
<div class="mb-3 mt-3">
	<label for="txtmota" class="form-label">Mô tả</label>
	<textarea id="txtmota" class="form-control" name="txtmota" placeholder="Nhập mô tả" required></textarea>
</div>
<div class="mb-3 mt-3">
	<label>Hình ảnh</label>
	<input class="form-control" type="file" name="filehinhanh">
</div>
<div class="mb-3 mt-3">
	<input type="submit" value="Lưu" class="btn btn-success">
	<input type="reset" value="Hủy" class="btn btn-warning">
</div>
</form>

<?php include("../inc/bottom.php"); ?>