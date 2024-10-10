<?php
session_start();
session_unset(); // Xóa tất cả các session
session_destroy(); // Hủy phiên làm việc
header('Location: trangchu.php'); // Chuyển hướng về trang chủ
exit();
?>