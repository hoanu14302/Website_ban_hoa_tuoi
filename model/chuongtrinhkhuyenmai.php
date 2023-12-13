<?php
class CHUONGTRINHKHUYENMAI
{
    private $id;
    private $ten_km;
    private $mota;
    private $phantramgiam;
    private $hinhanh_km;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function getten_km()
    {
        return $this->ten_km;
    }

    public function setten_km($value)
    {
        $this->ten_km = $value;
    }
    public function getmota()
    {
        return $this->mota;
    }

    public function setmota($value)
    {
        $this->mota = $value;
    }
    public function getphantramgiam()
    {
        return $this->phantramgiam;
    }

    public function setphantramgiam($value)
    {
        $this->phantramgiam = $value;
    }
    public function gethinhanh_km()
    {
        return $this->hinhanh_km;
    }

    public function sethinhanh_km($value)
    {
        $this->hinhanh_km = $value;
    }

    // Lấy danh sách
    public function laykhuyenmai()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM chuongtrinhkhuyenmai";
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


    // Lấy danh mục theo id
    public function laykhuyenmaitheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM chuongtrinhkhuyenmai WHERE id=:id";
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
    // Thêm mới
    public function themkhuyenmai($khuyenmaimoi)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO chuongtrinhkhuyenmai(ten_km,mota,phantramgiam,hinhanh_km) VALUES(:ten_km,:mota,:phantramgiam,:hinhanh_km)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":ten_km", $khuyenmaimoi->ten_km);
            $cmd->bindValue(":mota", $khuyenmaimoi->mota);
            $cmd->bindValue(":phantramgiam", $khuyenmaimoi->phantramgiam);
            $cmd->bindValue(":hinhanh_km", $khuyenmaimoi->hinhanh_km);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoakhuyenmai($khuyenmai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM chuongtrinhkhuyenmai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $khuyenmai->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suakhuyenmai($khuyenmai)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE chuongtrinhkhuyenmai SET tenkhuyenmai=:tenkhuyenmai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenkhuyenmai", $khuyenmai->tenkhuyenmai);
            $cmd->bindValue(":id", $khuyenmai->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
