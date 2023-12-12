<?php
class NGUOIDUNG
{
    private $id;
    private $email;
    private $sodienthoai;
    private $matkhau;
    private $hoten;
    private $loai;
    private $trangthai;
    private $hinhanh;
    private $diachi;

    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($value)
    {
        $this->email = $value;
    }
    public function getsodienthoai()
    {
        return $this->sodienthoai;
    }
    public function setsodienthoai($value)
    {
        $this->sodienthoai = $value;
    }
    public function getmatkhau()
    {
        return $this->matkhau;
    }
    public function setmatkhau($value)
    {
        $this->matkhau = $value;
    }
    public function gethoten()
    {
        return $this->hoten;
    }
    public function sethoten($value)
    {
        $this->hoten = $value;
    }
    public function getloai()
    {
        return $this->loai;
    }
    public function setloai($value)
    {
        $this->loai = $value;
    }
    public function gettrangthai()
    {
        return $this->trangthai;
    }
    public function settrangthai($value)
    {
        $this->trangthai = $value;
    }
    public function gethinhanh()
    {
        return $this->hinhanh;
    }
    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }
    public function getdiachi()
    {
        return $this->diachi;
    }
    public function setdiachi($value)
    {
        $this->diachi = $value;
    }
    // khai báo các thuộc tính (SV tự viết)

    public function kiemtranguoidunghople($email, $matkhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", md5($matkhau));
            $cmd->execute();
            $valid = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $valid;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy thông tin người dùng có $email
    public function laythongtinnguoidung($email)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $ketqua = $cmd->fetch();
            $cmd->closeCursor();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // lấy tất cả ng dùng
    public function laydanhsachnguoidung()
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm ng dùng mới, trả về khóa của dòng mới thêm
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function themnguoidung($nguoidung)
    {
        $db = DATABASE::connect();
        try {
            $sql = "INSERT INTO nguoidung(email,sodienthoai,matkhau,hoten,loai,trangthai,hinhanh,diachi) 
VALUES(:email,:sodienthoai,:matkhau,:hoten,:loai,:trangthai,:hinhanh,:diachi)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':email', $nguoidung->email);
            $cmd->bindValue(':matkhau', md5($nguoidung->matkhau));
            $cmd->bindValue(':sodienthoai', $nguoidung->sodienthoai);
            $cmd->bindValue(':hoten', $nguoidung->hoten);
            $cmd->bindValue(':loai', $nguoidung->loai);
            $cmd->bindValue(':trangthai', $nguoidung->trangthai);
            $cmd->bindValue(':hinhanh', $nguoidung->hinhanh);
            $cmd->bindValue(':diachi', $nguoidung->diachi);
            $cmd->execute();
            $id = $db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
    // (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
    public function capnhatnguoidung($id, $email, $sodt, $hoten, $hinhanh, $diachi)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set hoten=:hoten, email=:email,sodienthoai=:sodt, hinhanh=:hinhanh, diachi=:diachi where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':sodt', $sodt);
            $cmd->bindValue(':hoten', $hoten);
            $cmd->bindValue(':hinhanh', $hinhanh);
            $cmd->bindValue(':diachi', $diachi);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi mật khẩu
    public function doimatkhau($email, $matkhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set matkhau=:matkhau where email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':matkhau', md5($matkhau));
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3 khách hàng)
    public function doiloainguoidung($email, $loai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set loai=:loai where email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':loai', $loai);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Đổi trạng thái (0 khóa, 1 kích hoạt)
    public function doitrangthai($id, $trangthai)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set trangthai=:trangthai where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':trangthai', $trangthai);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
