<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <title>Admin Control</title>
</head>
<body>
    <h2 style="text-align: center; font-size: 50px;">Admin Control</h2>
    <div>
    <?php 
        include "menu.php"; // Hiển thị menu
    ?>

    <div class="content">
        <?php
        // Kết nối cơ sở dữ liệu
        include "../index.php";

        // Kiểm tra xem tham số view có tồn tại không
        if (isset($_GET['view'])) {
            $view = $_GET['view'];

            // Nếu view là "quanlytaikhoan", hiển thị bảng quản lý tài khoản
            if ($view == 'quanlytaikhoan') {
                echo "<br>";
                echo '<h3 >Quản lý tài khoản</h3>';
                echo '<table border="1">
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Activate</th>
                            <th>Kích hoạt Admin</th>
                            <th>Quản lý</th>
                        </tr>';

                // Truy vấn dữ liệu từ bảng "dangky"
                $query = "SELECT * FROM dangky";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    if (isset($_GET['suataikhoan']) && $_GET['suataikhoan'] == $row['id']) {
                        // Hiển thị input text với giá trị cũ
                        echo '<form action="xuly.php" method="POST">';
                        echo '<td><input type="text" name="tentaikhoan" value="'.$row['name'].'"></td>';
                        echo '<td><input type="email" name="emailtaikhoan" value="'.$row['email'].'"></td>';
                        echo '<td><input type="text" name="phonetaikhoan" value="'.$row['phone'].'"></td>';
                        echo '<td><input type="text" name="activatetaikhoan" value="'.$row['status'].'"></td>';
                        echo '<td><input type="text" name="kichhoatadmintaikhoan" value="'.$row['admin_status'].'"></td>';
                        echo '<td>
                                <input type="hidden" name="idtaikhoan" value="'.$row['id'].'">
                                <input type="submit" name="updatetaikhoan" value="Lưu" class="btnSua">
                              </td>';
                        echo '</form>';
                    } else {
                    // Kiểm tra người dùng bấm vào nút Sửa
                           echo ' <td>'.$row['name'].'</td>';
                            echo '<td>'.$row['email'].'</td>';
                           echo '<td>'.$row['phone'].'</td>';
                           echo ' <td>'.$row['status'].'</td>';
                           echo ' <td>'.$row['admin_status'].'</td>';

                          echo '  <td>
                                <a href="admin.php?view=quanlytaikhoan&suataikhoan='.$row['id'].'">Sửa</a> |
                                <a href="xuly.php?idtaikhoan='.$row['id'].'&query=xoataikhoan">Xóa</a>
                            </td>';
                        echo '</tr>';
                }
            }
                echo '</table>';
                echo '<h3>Thêm tài khoản mới</h3>';
                include "quanlytaikhoan/quanlytaikhoan.php";    
            // Nếu view là "quanlydanhmuc", hiển thị bảng quản lý danh mục
            } elseif ($view == 'quanlydanhmuc') {
                echo "<br>";
                echo '<h3>Quản lý danh mục</h3>';
                echo '<table border="1">
                        <tr>
                            <th>Tên danh mục</th>
                            <th>Quản lý</th>
                        </tr>';

                // Truy vấn dữ liệu từ bảng "danhmuc"
                $query = "SELECT * FROM danhmuc";
                $result = mysqli_query($connect, query: $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    // Kiểm tra nếu người dùng bấm vào nút sửa cho danh mục cụ thể
                    if (isset($_GET['sua']) && $_GET['sua'] == $row['danhmuc_id']) {
                        // Hiển thị input text với giá trị cũ
                        echo '<form action="xuly.php" method="POST">';
                        echo '<td><input type="text" name="danhmuc_ten" value="'.$row['danhmuc_ten'].'"></td>';
                        echo '<td>
                                <input type="hidden" name="danhmuc_id" value="'.$row['danhmuc_id'].'">
                                <input type="submit" name="update" value="Lưu" class="btnSua">
                              </td>';
                        echo '</form>';
                    } else {
                        // Hiển thị giá trị danh mục bình thường
                        echo '<td>'.$row['danhmuc_ten'].'</td>';
                        echo '<td>
                                <a href="admin.php?view=quanlydanhmuc&sua='.$row['danhmuc_id'].'">Sửa</a> |
                                <a href="xuly.php?iddanhmuc='.$row['danhmuc_id'].'&query=xoa">Xóa</a>
                              </td>';
                    }
                    echo '</tr>';
                }

                echo '</table>';
                echo '<h3>Thêm danh mục mới</h3>';
                include "quanlydanhmuc/quanlydanhmuc.php";
            }
            else if ($view=='trangchu'){
                header('location:../trangchu.php');
            }
            else if ($view=='dangky'){
                header('location:../dangky.php');
            }
            else if ($view=='login'){
                header('location:../login.php');
            }
        }
        if(isset($_POST['them_taikhoan'])){
           // Lấy tên, email,password ,status,admin_Status từ form bên quanlytaikhoan.php
           $ten_taikhoan = mysqli_real_escape_string($connect, $_POST['ten_taikhoan']);
           $email_taikhoan = mysqli_real_escape_string($connect, $_POST['email_taikhoan']);
           $matkhau_taikhoan = mysqli_real_escape_string($connect, $_POST['matkhau_taikhoan']);
           $activate_taikhoan = mysqli_real_escape_string($connect, $_POST['activate_taikhoan']);
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
        ?>
    </div>
</body>
</html>
