
<form action="xuly.php" method="POST">
    <table border="1">
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Password</th>
            <th>Activate</th>
            <th>Kích hoạt Admin</th>
            <th>Quản lý</th>
        </tr>
        <tr>
            <th><input type="text" name="ten_taikhoan" placeholder="Nhập tên tài khoản" required></th>
            <th><input type="email" name="email_taikhoan" placeholder="Nhập email tài khoản" required></th>
            <th><input type="password" name="matkhau_taikhoan" placeholder="Nhập mật khẩu tài khoản" required></th>
            <th>1</th>
            <th><input type="text" name="kichhoatadmin_taikhoan" required>  </th>

            <th><input type="submit" name="them_taikhoan" value="Thêm" class="btnSua"></th>
        </tr>
</form>