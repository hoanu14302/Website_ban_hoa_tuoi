<div class="d-flex flex-column">
<?php foreach($sanphamxemnhieu as $x): ?>
	<div style="max-height:100px"><a class="text-decoration-none" href="index.php?action=detail&id=<?php echo $x["id"]; ?>">		
		<img style="max-width:15%" class="img-thumbnail float-start m-2" 
			src="../<?php echo $x["hinhanh"]; ?>" 
			alt="<?php echo $x["tensp"]; ?>">		
		<h6 class="card-title text-info"><?php echo $x["tensp"]; ?></h6>
		<p class="card-text text-danger fw-bold"><?php echo number_format($x["giaban"]); ?>đ</p>	</a>	
	</div>
<?php endforeach; ?>
</div>