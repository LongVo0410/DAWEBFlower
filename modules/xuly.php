<?php 
include "../index.php";
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
if (isset($_POST['update'])) {
    $id = $_POST['danhmuc_id'];
    $tenmuc = $_POST['danhmuc_ten'];

    // Cập nhật tên danh mục
    $sqlupdate = "UPDATE danhmuc SET danhmuc_ten='$tenmuc' WHERE danhmuc_id='$id'";
    mysqli_query($connect, $sqlupdate);

    // Sau khi cập nhật, quay lại trang quản lý danh mục
    header('Location: admin.php?view=quanlydanhmuc');
}
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
?>