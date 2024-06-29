<?php
    require_once '../config.php';
    require_once '../models/TaiKhoanModel.php';

    $model=new TaiKhoanModel($connect);
    $id=$_GET['id'];
    //
   
    //update tài khoản
    function updateTK($model,$id){
        
        $taikhoan=$_POST['TenTK'];
        $matkhau=$_POST['MatKhau'];
        $ten=$_POST['TenNguoiDung'];
        $ngaysinh=$_POST['NgaySinh'];
        $diachi=$_POST['DiaChi'];
        $sodienthoai=$_POST['SDT'];
        $email=$_POST['Email'];
        $model->updateTK($id, $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten);
        
    }
        updateTK($model,$id);
        echo '<script>alert("Sửa thành công!");</script>';
        // Chuyển hướng người dùng đến trang ./listTK.php
        echo '<script>window.location.href = "../index.php";</script>';
    



?>