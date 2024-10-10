<?php 
include "../index.php";
// Xóa danh mục
if(isset($_GET['query'])=='xoa'){
    $id=$_GET['iddanhmuc'];
    $sqlxoa="DELETE from danhmuc  where danhmuc_id='".$id."'";
    mysqli_query($connect,$sqlxoa);
    header('Location:admin.php?view=quanlydanhmuc');
}
// Xóa tài khoản
if(isset($_GET['query'])=='xoataikhoan'){
    $id=$_GET['idtaikhoan'];
    $sqlxoa="DELETE from dangky where id='".$id."'";
    mysqli_query($connect,$sqlxoa);
    header('location:admin.php?view=quanlytaikhoan');
}
// Xóa sản phẩm
if(isset($_GET['query'])=='xoasanpham'){
    $id=$_GET['idsanpham'];
    $sql="SELECT * from  sanpham  where id_sanpham ='$id'LIMIT 1";
    $query=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh_sanpham']);
    }
    $sqlxoa="DELETE from sanpham where id_sanpham='".$id."'";
    mysqli_query($connect,$sqlxoa);
    header('location:admin.php?view=quanlysanpham');
}

// Thêm tài khoản
if(isset($_POST['them_taikhoan'])){
    // Lấy tên, email,password ,status,admin_Status từ form bên quanlytaikhoan.php
    $ten_taikhoan = mysqli_real_escape_string($connect, $_POST['ten_taikhoan']);
    $email_taikhoan = mysqli_real_escape_string($connect, $_POST['email_taikhoan']);
    $matkhau_taikhoan = mysqli_real_escape_string($connect, $_POST['matkhau_taikhoan']);
    $kichhoatadmin_taikhoan = mysqli_real_escape_string($connect, $_POST['kichhoatadmin_taikhoan']);
     // Chèn danh mục mới vào cơ sở dữ liệu
     $query = "INSERT INTO dangky (name,email,password,status,admin_status) VALUES ('$ten_taikhoan','$email_taikhoan','$matkhau_taikhoan',1,'$kichhoatadmin_taikhoan')";
     if (mysqli_query($connect, $query)) {
         echo "<script>alert('Thêm tài khoản thành công');</script>";
     } else {
         echo "<script>alert('Lỗi: Không thể thêm tài khoản');</script>";
     }
 
     // Làm mới lại trang để hiển thị danh mục mới
     echo "<script>window.location.href='admin.php?view=quanlytaikhoan';</script>";
 }
 // Thêm sản phẩm
 if(isset($_POST['them_sanpham'])){
    $ten_sanpham=$_POST['ten_sanpham'];
    $ma_sanpham=$_POST['ma_sanpham'];
    $gia_sanpham=$_POST['gia_sanpham'];
    $soluong_sanpham=$_POST['soluong_sanpham'];
    $hinhanh_sp=$_FILES['hinhanh_sanpham']['name'];
    $hinhanh_sptmp=$_FILES['hinhanh_sanpham']['tmp_name'];
    $hinhanh_sp=time().'_'.$hinhanh_sp;
    $tomtat_sanpham=$_POST['tomtat_sanpham'];
    $noidung_sanpham=$_POST['noidung_sanpham'];
    $tinhtrang_sanpham=$_POST['tinhtrang_sanpham'];
    $danhmuc_sanpham=$_POST['danhmuc'];

    $query ="INSERT INTO sanpham(ten_sanpham,ma_sanpham,gia_sanpham,soluong_sanpham,hinhanh_sanpham,tomtat_sanpham,noidung_sanpham,tinhtrang_sanpham,danhmuc_id) 
    VALUES ('$ten_sanpham','$ma_sanpham','$gia_sanpham','$soluong_sanpham','$hinhanh_sp','$tomtat_sanpham','$noidung_sanpham','$tinhtrang_sanpham','$danhmuc_sanpham')";
    
    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Thêm sản phẩm thành công');</script>";
        move_uploaded_file($hinhanh_sptmp,'uploads/'.$hinhanh_sp);
    }else {
        echo "<script>alert('Lỗi: Không thể thêm sản phẩm');</script>";
    }
    
    echo "<script>window.location.href='admin.php?view=quanlysanpham';</script>";
 }
 if(isset($_POST['updatesanpham'])){
    
    $idsp=$_POST['idsanpham'];
    $ten_sanpham=$_POST['ten_sanpham'];
    $ma_sanpham=$_POST['ma_sanpham'];
    $gia_sanpham=$_POST['gia_sanpham'];
    $soluong_sanpham=$_POST['soluong_sanpham'];
    $hinhanh_sp=$_FILES['hinhanh_sanpham']['name'];
    $hinhanh_sptmp=$_FILES['hinhanh_sanpham']['tmp_name'];
    $tomtat_sanpham=$_POST['tomtat_sanpham'];
    $noidung_sanpham=$_POST['noidung_sanpham'];
    $tinhtrang_sanpham=$_POST['tinhtrang_sanpham'];
    $danhmuc_sanpham=$_POST['danhmuc'];
    if($hinhanh_sp!=''){
        $hinhanh_sp = time().'_'.$hinhanh_sp;
        move_uploaded_file($hinhanh_sptmp,'uploads/'.$hinhanh_sp);
        $sql="SELECT * from  sanpham  where id_sanpham ='$idsp' LIMIT 1";
        $query=mysqli_query($connect,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/' . $row['hinhanh_sanpham']);
        }
        $sqlupdate="UPDATE sanpham SET ten_sanpham='$ten_sanpham', ma_sanpham='$ma_sanpham', gia_sanpham='$gia_sanpham', soluong_sanpham='$soluong_sanpham',hinhanh_sanpham='$hinhanh_sp' 
        ,tomtat_sanpham='$tomtat_sanpham',noidung_sanpham='$noidung_sanpham',tinhtrang_sanpham='$tinhtrang_sanpham',danhmuc_id='$danhmuc_sanpham'  WHERE id_sanpham='$idsp';";
    }
    else{
        $sqlupdate="UPDATE sanpham SET ten_sanpham='$ten_sanpham', ma_sanpham='$ma_sanpham', gia_sanpham='$gia_sanpham', soluong_sanpham='$soluong_sanpham' 
        ,tomtat_sanpham='$tomtat_sanpham',noidung_sanpham='$noidung_sanpham',tinhtrang_sanpham='$tinhtrang_sanpham',danhmuc_id='$danhmuc_sanpham'  WHERE id_sanpham='$idsp'";
    }
    mysqli_query($connect,$sqlupdate);
    header('location:admin.php?view=quanlysanpham');
}
 // Thêm danh mục
 if (isset($_POST['them_danhmuc'])) {
     $ten_danhmuc = mysqli_real_escape_string($connect, $_POST['ten_danhmuc']); // Lấy tên danh mục từ form
 
     // Chèn danh mục mới vào cơ sở dữ liệu
     $query = "INSERT INTO danhmuc (danhmuc_ten) VALUES ('$ten_danhmuc')";
     if (mysqli_query($connect, $query)) {
         echo "<script>alert('Thêm danh mục thành công');</script>";
     } else {
         echo "<script>alert('Lỗi: Không thể thêm danh mục');</script>";
     }
 
     // Làm mới lại trang để hiển thị danh mục mới
     echo "<script>window.location.href='admin.php?view=quanlydanhmuc';</script>";
 }
 // Update danh mục
if (isset($_POST['update'])) {
    $id = $_POST['danhmuc_id'];
    $tenmuc = $_POST['danhmuc_ten'];

    // Cập nhật tên danh mục
    $sqlupdate = "UPDATE danhmuc SET danhmuc_ten='$tenmuc' WHERE danhmuc_id='$id'";
    mysqli_query($connect, $sqlupdate);

    // Sau khi cập nhật, quay lại trang quản lý danh mục
    header('Location: admin.php?view=quanlydanhmuc');
}
// Update tài khoản
if(isset($_POST['updatetaikhoan'])){
    $id = $_POST['idtaikhoan'];
    $tentaikhoan =$_POST['tentaikhoan'];
    $emailtaikhoan=$_POST['emailtaikhoan'];
    $phonetaikhoan=$_POST['phonetaikhoan'];
    $activatetaikhoan=$_POST['activatetaikhoan'];
    $kickhoatadmintaikhoan=$_POST['kichhoatadmintaikhoan'];
    $sqlupdate="UPDATE dangky SET name='$tentaikhoan', email='$emailtaikhoan', phone='$phonetaikhoan', status='$activatetaikhoan',admin_status='$kickhoatadmintaikhoan' WHERE id='$id'";
    mysqli_query($connect,$sqlupdate);
    header('location:admin.php?view=quanlytaikhoan');
}
// Update sản phẩm

?>