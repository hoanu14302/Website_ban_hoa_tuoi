<?php
include("../include/top.php");

	// Số danh mục trên mỗi trang
	$itemsPerPage = 10;

	// Tính toán số trang dựa trên tổng số danh mục và số danh mục trên mỗi trang
	$totalItems = count($danhmuc);
	$totalPages = ceil($totalItems / $itemsPerPage);

	// Xác định trang hiện tại từ tham số 'page' trong URL
	$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

	// Xác định chỉ mục bắt đầu và kết thúc của danh mục trên trang hiện tại
	$startIndex = ($currentPage - 1) * $itemsPerPage;
	$endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);

	// Lấy mảng danh mục cho trang hiện tại
	$pagedDanhmuc = array_slice($danhmuc, $startIndex, $itemsPerPage);

?>

<h4 class="text-info">Danh sách danh mục</h4> 
<table class="table table-hover">
	<tr><th>ID</th><th>Tên danh mục</th><th>Sửa</th><th>Xóa</th></tr>
	<?php 
	foreach ($pagedDanhmuc as $d) : 
		if($d["id"] == $idsua){ // hiển thị form
	?>
		<tr>
		<form method="post">
			<input type="hidden" name="action" value="capnhat">
			<input type="hidden" name="id" value="<?php echo $d["id"]; ?>">
			<td><?php echo $d["id"]; ?></td>
			<td><input class="form-control" name="ten" type="text" value="<?php echo $d["tendm"]; ?>"></td>
			<td><input class="btn btn-success" type="submit" value="Lưu"></td>
		</form>
			<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>" class="btn btn-danger">Xóa</a></td>
		</tr>

	<?php 
		} // end if 
		else {
	?>
		<tr>
			<td><?php echo $d["id"]; ?></td>
			<td><?php echo $d["tendm"]; ?></td>
			<td><a href="index.php?action=sua&id=<?php echo $d["id"]; ?>" class="btn btn-warning">Sửa</a></td>
			<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>" class="btn btn-danger">Xóa</a></td>
		</tr>
	<?php 
		} // end else
	endforeach; 
	?>
</table>

<h4><a class="text-decoration-none text-info" data-bs-toggle="collapse" data-bs-target="#demo">Thêm mới danh mục</a><h4>

<div id="demo" class="collapse">
	 
	<form method="post"> 
		<input type="hidden" name="action" value="them">
	<div class="row">	
		<div class="col">
			<input type="text" class="form-control" name="ten" placeholder="Nhập tên danh mục">
		</div>
		<div class="col">
			<input type="submit" class="btn btn-info" value="Lưu">
		</div>
		<div class="col"></div>
	</div>
	</form>
</div>

<div class="pagination">
	<?php for ($i = 1; $i <= $totalPages; $i++): ?>
		<?php if ($i == $currentPage): ?>
			<span class="current-page"><?php echo $i; ?></span>
		<?php else: ?>
			<a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>
</div>


<?php include("../include/bottom.php"); ?>
