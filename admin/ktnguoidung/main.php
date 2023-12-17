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
        foreach ($mathanghh as $m) :
        ?>
            <tr>
                <td><a href="index.php?action=chitiet&id=<?php echo $m['id']; ?>">
                    <?php echo $m["tenmh"]; ?>
                </a>
                </td>
                <td><?php echo number_format($m["giaban"]); ?></td>
                <td><?php echo $m["soluongton"]; ?></td>
                <td><img width="150px" class="thumnail" src="../../img/giohang/<?php echo $m['hinhanh']; ?>  "></td>
                <td><a href="index.php?action=sua&id=<?php echo $m['id']; ?>" class="btn btn-warning">Sửa</a></td>
                <td><a href="index.php?action=xoa&id=<?php echo  $m['id']; ?>" class="btn btn-danger">Xóa</a></td>
            </tr>
        <?php
        endforeach;

        ?>
    </table>
</div>
<?php include("../include/bottom.php"); ?>