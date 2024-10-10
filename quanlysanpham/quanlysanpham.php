<form action="xuly.php" method="POST" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="ten_sanpham" required></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="ma_sanpham"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="gia_sanpham"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong_sanpham"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh_sanpham"></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea name="tomtat_sanpham" rows="10" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea name="noidung_sanpham" rows="10" style="resize: none"></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc">
                    <?php 
                        $sqldanhmuc="SELECT * from  danhmuc ";
                        $querydanhmuc=mysqli_query($connect,$sqldanhmuc);
                        while($rowdanhmuc=mysqli_fetch_array($querydanhmuc)){
                            ?>
                        <option value="<?php echo $rowdanhmuc['danhmuc_id']?>"><?php echo $rowdanhmuc['danhmuc_ten']?></option>
                        <?php 
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang_sanpham">
                    <option value="1">Kích hoạt</option>
                    <option value="2">Ẩn</option>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" name="them_sanpham" value="Thêm sản phẩm" class="btnSua">
</form>
