<?php include("../include/top.php"); ?>

<p><a class="btn btn-info" href="index.php?action=them">Thêm khuyến mãi</a></p>
<h4 class="text-info">Danh sách khuyến mãi</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">Tên khuyến mãi</th>
        <th class="text-info">Mô tả</th>
        <th class="text-info">Phần trăm giảm</th>
        <th class="text-info">Hình ảnh khuyến mãi</th>
    </tr>
    <?php
    foreach ($khuyenmai as $k) :
    ?>
        <tr>
            <td><?php echo $k["ten_km"]; ?></td>
            <td><?php echo $k["mota"]; ?></td>
            <td><?php echo $k["phantramgiam"]; ?></td>
            <td><img width="50px" src="../../img/carousel/<?php echo $k["hinhanhkm"]; ?>" alt="<?php echo $k["hinhanhkm"]; ?>" style="width: 400px;height: 150px;"></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<?php include("../include/bottom.php"); ?>