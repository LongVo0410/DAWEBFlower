
<!-- Đang fix gọn code -->

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
            <td>Quản lý</td>
            <td>
            <input type="hidden" name="idsanpham" value="'.$rowtoUpdate['id_sanpham'].'">
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