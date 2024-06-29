<?php
    require_once '../config.php';
    require_once '../models/TaiKhoanModel.php';

    $model=new TaiKhoanModel($connect);

    //
    function checkTK($model, $username,$email) {
        // Gọi phương thức của model để lấy danh sách tài khoản từ database
        $result = $model->getListTK();
    
        // Duyệt qua mảng $result để kiểm tra tên tài khoản và email
        foreach ($result as $taikhoan) {
            if ($taikhoan['TenTK'] === $username && $taikhoan['Email']==$email) {
                return true; // Nếu tìm thấy tên tài khoản hoặc email tồn tại
            }
        }
    
        return false; // Nếu không tìm thấy tên tài khoản hoặc email tồn tại
    }
    //update tài khoản
    function updateTK($model){
        $id=$_GET['id'];
        $taikhoan=$_POST['TenTK'];
        $matkhau=$_POST['MatKhau'];
        $ten=$_POST['TenNguoiDung'];
        $ngaysinh=$_POST['NgaySinh'];
        $diachi=$_POST['DiaChi'];
        $sodienthoai=$_POST['SDT'];
        $email=$_POST['Email'];
        $model->updateTK($id, $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten);
        
    }
    //Thêm tài khoản
    function addTK($model){
        $taikhoan=$_POST['TenTK'];
        $matkhau=$_POST['MatKhau'];
        $ten=$_POST['TenNguoiDung'];
        $ngaysinh=$_POST['NgaySinh'];
        $diachi=$_POST['DiaChi'];
        $sodienthoai=$_POST['SDT'];
        $email=$_POST['Email'];
        if(!checkTK($model,$taikhoan,$email)){
            $model->addTK($taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten);
            echo '<script>alert("Thêm thành công!");</script>';
            // Chuyển hướng người dùng đến trang ./listTK.php
            echo '<script>window.location.href = "../adminWeb.php";</script>';
        }else{
            echo '<script>alert("Tài khoản bị trùng!");</script>';
            echo '<script>window.location.href = "../adminWeb.php";</script>';
        }
    }
    function deleteTK($model){
        $id=$_GET['id'];
        $model->deleteVePhim($id);
        $model->deleteTK($id);
        echo '<script>alert("Xóa tài khoản thành công!");</script>';
        echo '<script>window.location.href = "../adminWeb.php?action=listTK";</script>';
        
    }
    
    $bien=$_GET['query'];
    
    if($bien=="sua"){
        updateTK($model);
        echo '<script>alert("Sửa thành công!");</script>';
        // Chuyển hướng người dùng đến trang ./listTK.php
        echo '<script>window.location.href = "../adminWeb.php?action=listTK";</script>';
    }
    else if($bien=="them"){
        addTK($model);
       
    }else if($bien =="xoa"){
        deleteTK($model);
        // Hiển thị thông báo xóa thành công bằng JavaScript
    echo '<script>alert("Xóa thành công!");</script>';

    // Chuyển hướng người dùng đến trang ./listTK.php
    echo '<script>window.location.href = "adminWeb.php?action=listTK";</script>';
    
    }
    else{
        echo "lol";
    }



?>