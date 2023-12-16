<?php include("../include/top.php"); ?>
<div>
    <h4 class="text-info">Danh sách hoa hết hàng</h4>
    <table class="table table-hover">
        <tr>
            <th>Tên hoa</th>
            <th>Gía bán</th>
            <th class="text-danger">Số lượng</th>
            <th>Hình ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
        foreach ($mathanghh as $mhhhhhh) :
        ?>
            <tr>
                <td><?php echo $mhhh["tenmh"]; ?>
                </td>
                <td><?php echo number_format($mhhh["giaban"]); ?></td>
                <td><?php echo $mhhh["soluongton"]; ?></td>
                <td><img width="150px" class="thumnail" src="../../img/giohang/<?php echo $mhhh['hinhanh']; ?>  "></td>
                <td><a href="index.php?action=sua&id=<?php echo $mhhh['id']; ?>" class="btn btn-warning">Sửa</a></td>
                <td><a href="index.php?action=xoa&id=<?php echo  $mhhh['id']; ?>" class="btn btn-danger">Xóa</a></td>
            </tr>
        <?php
        endforeach;

        ?>
    </table>
</div>
<?php include("../include/bottom.php"); ?>