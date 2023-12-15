<?php
include("../include/top.php");

// Số mặt hàng trên mỗi trang
$itemsPerPage = 5;

// Tính toán số trang dựa trên tổng số mặt hàng và số mặt hàng trên mỗi trang
$totalItems = count($mathang);
$totalPages = ceil($totalItems / $itemsPerPage);

// Xác định trang hiện tại từ tham số 'page' trong URL
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Xác định chỉ mục bắt đầu và kết thúc của mặt hàng trên trang hiện tại
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);

// Lấy mảng mặt hàng cho trang hiện tại
$pagedMathang = array_slice($mathang, $startIndex, $itemsPerPage);

?>

<h3>Quản lý hoa tươi</h3> 
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm hoa mới
</a>
<br> <br> 
<table class="table table-hover">
	<tr>
		<th>Tên hoa</th>
		<th>Giá bán</th>
		<th>Số lượng</th>
		<th>Hình ảnh</th>		
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php foreach($pagedMathang as $m): ?>
	<tr>
		<td>
			<a href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>">
			<?php echo $m["tenmh"]; ?>
			</a>	
		</td>
		<td><?php echo $m["giaban"]; ?></td>
		<td><?php echo $m["soluongton"]; ?></td>
		<td>
			<a href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>">
			<img src="../../img/giohang/<?php echo $m["hinhanh"]; ?>" width="80" class="img-thumbnail" style="width: 150px;height: 150px;"></a>
		</td>
		<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="edit"></a></td>
		<td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="trash-2"></a></td>
	</tr>
	<?php endforeach; ?>
</table>

<!-- Hiển thị phân trang -->
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