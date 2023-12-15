<?php
class MATHANG
{
    // khai báo các thuộc tính
    private $id;
    private $tenmh;
    private $danhmuc_id;
    private $mota;
    private $giagoc;
    private $giaban;
    private $soluongton;
    private $hinhanh;
    private $luotxem;
    private $luotmua;
    private $true_false_km;
    private $khuyenmai_id;

    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function gettenmh()
    {
        return $this->tenmh;
    }
    public function settenmh($value)
    {
        $this->tenmh = $value;
    }
    public function getmota()
    {
        return $this->mota;
    }
    public function setmota($value)
    {
        $this->mota = $value;
    }
    public function getgiagoc()
    {
        return $this->giagoc;
    }
    public function setgiagoc($value)
    {
        $this->giagoc = $value;
    }
    public function getgiaban()
    {
        return $this->giaban;
    }
    public function setgiaban($value)
    {
        $this->giaban = $value;
    }
    public function getsoluongton()
    {
        return $this->soluongton;
    }
    public function setsoluongton($value)
    {
        $this->soluongton = $value;
    }
    public function gethinhanh()
    {
        return $this->hinhanh;
    }
    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }
    public function getdanhmuc_id()
    {
        return $this->danhmuc_id;
    }
    public function setdanhmuc_id($value)
    {
        $this->danhmuc_id = $value;
    }
    public function getluotxem()
    {
        return $this->luotxem;
    }
    public function setluotxem($value)
    {
        $this->luotxem = $value;
    }
    public function getluotmua()
    {
        return $this->luotmua;
    }
    public function setluotmua($value)
    {
        $this->luotmua = $value;
    }
    public function gettrue_false_km()
    {
        return $this->true_false_km;
    }
    public function settrue_false_km($value)
    {
        $this->true_false_km = $value;
    }
    public function getkhuyenmai_id()
    {
        return $this->khuyenmai_id;
    }
    public function setkhuyenmai_id($value)
    {
        $this->khuyenmai_id = $value;
    }

    // Lấy danh sách
    public function laymathang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mathang ORDER BY id DESC ";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Tìm kiếm 
    public function timkiemmathang($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mathang where tenmh like '%$search%'  ";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laymathangtheodanhmuc($danhmuc_id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:madm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":madm", $danhmuc_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laymathangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mathang SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật số lượng
    public function giamsoluong($id, $soluongmua)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mathang SET soluongton=soluongton-:soluongmua WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluongmua", $soluongmua);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng xem nhiều
    public function laymathangxemnhieu()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mathang ORDER BY luotxem DESC LIMIT 3";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng mua nhiều
    public function laymathangmuanhieu()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mathang ORDER BY luotmua DESC LIMIT 3";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm mới
    public function themmathang($mathang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
mathang(tenmh,danhmuc_id,mota,giagoc,giaban,soluongton,hinhanh,luotxem,luotmua) 
VALUES(:tenmh,:danhmuc_id,:mota,:giagoc,:giaban,:soluongton,:hinhanh,0,0,:true_false_km,:khuyenmai_id)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmh", $mathang->tenmh);
            $cmd->bindValue(":danhmuc_id", $mathang->danhmuc_id);
            $cmd->bindValue(":mota", $mathang->mota);
            $cmd->bindValue(":giagoc", $mathang->giagoc);
            $cmd->bindValue(":giaban", $mathang->giaban);
            $cmd->bindValue(":soluongton", $mathang->soluongton);
            $cmd->bindValue(":hinhanh", $mathang->hinhanh);
            $cmd->bindValue(":true_false_km", $mathang->true_false_km);
            $cmd->bindValue(":khuyenmai_id", $mathang->khuyenmai_id);

            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoamathang($mathang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM mathang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $mathang->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suamathang($mathang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mathang SET tenmh=:tenmh,
            danhmuc_id=:danhmuc_id,
            mota=:mota,
            giagoc=:giagoc,
            giaban=:giaban,
            soluongton=:soluongton,
            hinhanh=:hinhanh,
            luotxem=:luotxem,
            luotmua=:luotmua,
            true_false_km=:true_false_km,
            khuyenmai_id=:khuyenmai_id

            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmh", $mathang->tenmh);
            $cmd->bindValue(":mota", $mathang->mota);
            $cmd->bindValue(":giagoc", $mathang->giagoc);
            $cmd->bindValue(":giaban", $mathang->giaban);
            $cmd->bindValue(":soluongton", $mathang->soluongton);
            $cmd->bindValue(":danhmuc_id", $mathang->danhmuc_id);
            $cmd->bindValue(":hinhanh", $mathang->hinhanh);
            $cmd->bindValue(":luotxem", $mathang->luotxem);
            $cmd->bindValue(":luotmua", $mathang->luotmua);
            $cmd->bindValue(":true_false_km", $mathang->true_false_km);
            $cmd->bindValue(":khuyenmai_id", $mathang->khuyenmai_id);

            $cmd->bindValue(":id", $mathang->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
