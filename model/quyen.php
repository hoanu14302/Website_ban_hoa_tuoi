<?php
class QUYEN
{
    private $id;
    private $tenquyen;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettenquyen()
    {
        return $this->tenquyen;
    }

    public function settenquyen($value)
    {
        $this->tenquyen = $value;
    }

    // Lấy danh sách
    public function layquyen()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM quyen";
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
    public function layquyentheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM quyen WHERE id=:id";
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
    public function themquyen($quyen)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO quyen(tenquyen) VALUES(:tenquyen)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenquyen", $quyen->tenquyen);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoaquyen($quyen)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM quyen WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $quyen->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suaquyen($quyen)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE quyen SET tenquyen=:tenquyen WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenquyen", $quyen->tenquyen);
            $cmd->bindValue(":id", $quyen->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
