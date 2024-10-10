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
        include "menu.php"; // Hiển thị menu`
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
            else if ($view=='quanlysanpham'){
                
                echo '<br>';
                echo '<h3 >Thêm sản phẩm mới</h3>';
                include "quanlysanpham/quanlysanpham.php";
                echo "<br>";
                echo '<h3 >Liệt kê sản phẩm</h3>';
                echo '<table border="1">
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td>Mã sản phẩm</td>
                            <td>Giá</td>
                            <td>Số lượng</td>
                            <td>Hình ảnh</td>
                            <td>Tóm tắt</td>
                            <td>Nội dung</td>
                            <td>Tình trạng</td>
                            <td>Danh mục sản phẩm</td>
                            <td>Quản lý</td>
                        </tr>';
                // SQL
                $query="SELECT * from sanpham,danhmuc where sanpham.danhmuc_id=danhmuc.danhmuc_id order by id_sanpham asc ";
                $result = mysqli_query($connect, query: $query);
                while($row=mysqli_fetch_assoc($result)){
                    $tam=$row['hinhanh_sanpham'];
                    if (isset($_GET['suasanpham']) && $_GET['suasanpham'] == $row['id_sanpham']) {
                        $rowtoUpdate=$row;
                        ?>
                        <form action="xuly.php" method="POST" enctype="multipart/form-data">
                                <tr>
                                    <td>Tên sản phẩm</td>
                                    <td><input type="text" name="ten_sanpham" required value="<?php echo $rowtoUpdate['ten_sanpham'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td><input type="text" name="ma_sanpham" value="<?php echo $rowtoUpdate['ma_sanpham'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Giá sản phẩm</td>
                                    <td><input type="text" name="gia_sanpham" value="<?php echo $rowtoUpdate['gia_sanpham'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Số lượng</td>
                                    <td><input type="text" name="soluong_sanpham" value="<?php echo $rowtoUpdate['soluong_sanpham'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh</td>
                                    <td><input type="file" name="hinhanh_sanpham">
                                    <img src="uploads/<?php echo $rowtoUpdate['hinhanh_sanpham']?>" width="50%">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tóm tắt</td>
                                    <td><textarea name="tomtat_sanpham" rows="10" style="resize: none;"><?php echo $rowtoUpdate['tomtat_sanpham'];?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Nội dung</td>
                                    <td><textarea name="noidung_sanpham" rows="10" style="resize: none"><?php echo $rowtoUpdate['noidung_sanpham'];?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Tình trạng</td>
                                    <td>
                                        <select name="tinhtrang_sanpham">
                                            <?php 
                                            if($rowtoUpdate['tinhtrang_sanpham']==1){
                                            ?>
                                            <option value="1" selected>Kích hoạt</option>
                                            <option value="2">Ẩn</option>
                                            <?php 
                                            }else{ ?>
                                                <option value="1">Kích hoạt</option>
                                                <option value="2" selected>Ẩn</option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Danh mục sản phẩm</td>
                                    <td>
                                        <select name="danhmuc" >
                                    <?php 
                                        $sqldanhmuc="SELECT * from  danhmuc  ";
                                        $querydanhmuc=mysqli_query($connect,$sqldanhmuc);
                                        while($rowdanhmuc=mysqli_fetch_array($querydanhmuc)){
                                            if($rowdanhmuc['danhmuc_id']==$rowtoUpdate['danhmuc_id']){
                                                ?>
                                                <option selected value="<?php echo $rowdanhmuc['danhmuc_id']?>"><?php echo $rowdanhmuc['danhmuc_ten']?></option>
                                            <?php }else{
                                            ?>
                                        <option value="<?php echo $rowdanhmuc['danhmuc_id']?>"><?php echo $rowdanhmuc['danhmuc_ten']?></option>
                                        <?php 
                                        }}
                                    ?>
                                        </select>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>Quản lý</td>
                                    <td>
                                    <input type="hidden" name="idsanpham" value="<?php echo $rowtoUpdate['id_sanpham'];?>">
                                    <input type="submit" name="updatesanpham" value="Lưu" class="btnSua">
                                </td>
                                </tr>
                                <tr>
                                    <td>Tên sản phẩm</td>
                                    <td>Mã sản phẩm</td>
                                    <td>Giá</td>
                                    <td>Số lượng</td>
                                    <td>Hình ảnh</td>
                                    <td>Tóm tắt</td>
                                    <td>Nội dung</td>
                                    <td>Tình trạng</td>
                                    <td>Quản lý</td>
                                </tr>
                            
                        </form>
                      <?php
                    }else{
                        
                        echo '<tr>';
                        echo '<td>'.$row['ten_sanpham'].'</td>';
                        echo '<td>'.$row['ma_sanpham'].'</td>';
                        echo '<td>'.$row['gia_sanpham'].'</td>';
                        echo '<td> '.$row['soluong_sanpham'].'</td>';?>
                        <td> <img src="uploads/<?php echo $tam?>" width="50%"></td>
                        <?php echo '<td>'.$row['tomtat_sanpham'].'</td>';
                        echo '<td>'.$row['noidung_sanpham'].'</td>';?>

                        <td>
                        <?php if($row['tinhtrang_sanpham']==1)
                            echo ' Kích hoạt';
                        else{
                            echo ' Ẩn';
                        }
                        echo '<td>'.$row['danhmuc_ten'].'</td>';
                        ?></td>
                        <?php 
                        echo '<td>
                                <a href="admin.php?view=quanlysanpham&suasanpham='.$row['id_sanpham'].'">Sửa</a> |
                                <a href="xuly.php?idsanpham='.$row['id_sanpham'].'&query=xoasanpham">Xóa</a>
                            </td>';
                        echo '</tr>';
                        }   
                    }
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
        
        
        ?>
    </div>
</body>
</html>
