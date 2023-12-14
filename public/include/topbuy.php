<div class="d-flex flex-column">
	<?php
	$count = 0; // Biến đếm số lượng sản phẩm
	foreach ($danhmuc as $dm) :
		foreach ($mathangmuanhieu as $x) :
			if ($count >= 3) break; // Nếu đã hiển thị 3 sản phẩm, thoát khỏi vòng lặp
	?>
			<div style="max-height:100px"><a class="text-decoration-none" href="index.php?action=detail&id=<?php echo $x["id"]; ?>">
					<img style="width:100px; height: 100px;" class="img-thumbnail float-start m-2" src="../img/hoa/<?php echo $dm["tendm"]; ?>/<?php echo $x["hinhanh"]; ?>" 
					alt="<?php echo $x["tenmh"]; ?>">
					<h6 class="card-title text-info"><?php echo $x["tenmh"]; ?></h6>
					<p class="card-text text-danger fw-bold"><?php echo number_format($x["giaban"]); ?>đ</p>
				</a>
			</div>
	<?php
			$count++; // Tăng biến đếm lên sau khi hiển thị một sản phẩm
		endforeach;
	endforeach;
	?>
</div>