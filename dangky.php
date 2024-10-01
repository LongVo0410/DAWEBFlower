<?php
include "index.php";
echo $otp_chuoi=str_shuffle("0123456789");
echo "<br>";
echo $otp=substr($otp_chuoi,0,5);
$act_str=rand(1000000,1000000000);
echo "<br>";
$activation_code=str_shuffle(("abcdefghijklmno".$act_str));
echo $activation_code;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
    
    $row=null;
    $isSuccess = false;
    if (isset($_POST['checkemail'])){
        $isEmailTonTai=false;
        $email = $_POST['email'];
        $sql = "SELECT * FROM dangky WHERE email = '$email' ";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result); // dùng để truy vấn kiểm tra hàng đó có trùng không
        if ($row) {
            $isEmailTonTai = true;
        }


    }
    if (isset($_POST['create'])) {
        $name = $_POST['name1'];
        $email = $_POST['email'];
        $password = sha1($_POST['password1']);
        $confirmpassword = sha1($_POST['confirmpassword']); // Cần mã hóa cùng phương thức
        $phone=$_POST['number'];
        $sql = "SELECT * FROM dangky WHERE email = '$email' ";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result); // dùng để truy vấn kiểm tra hàng đó có trùng không
        if ($row) {
            $isEmailTonTai = true;
        }
        else{
            $isEmailTonTai = false;
        }
        if ($password == $confirmpassword && $isEmailTonTai==false) {
            // Nếu mật khẩu khớp, chèn vào cơ sở dữ liệu
            $sql = "INSERT INTO dangky (name, email, password,phone,otp,activate_code,status) VALUES (?, ?, ?,?,?,?,0)";
            $insert = $connect->prepare($sql);
            $insert->execute([$name, $email, $password,$phone,$otp,$activation_code]);
            $isSuccess = true; // Cập nhật kết quả thành công
        }
    }
    ?>
    <form action="dangky.php" method="post" id="dangky">
        <section class="vh-100 bg-image">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                    <!-- Check email tồn tại hay không -->
                                     <?php 
                                     if (isset($_POST['checkemail'])){
                                        if($row){
                                            echo '<p style="color: red;">Email đã tồn tại</p>';
                                        }
                                        else{
                                            echo '<p style="color: green;">Email chưa tồn tại</p>';
                                        }
                                     }
                                     if (isset($_POST['create'])){
                                        if($password !=$confirmpassword){
                                            echo '<p style="color: red;">Mật khẩu không khớp!!!</p>';
                                        }
                                     }
                                    if($isSuccess){
                                        echo '<p style="color: green;">Đăng ký thành công</p>';
                                    }
                                     ?>
                                    <?php ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="name1" class="form-control form-control-lg"  />
                                        <label class="form-label" for="name">Your Name</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control form-control-lg" required />
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="submit" name="checkemail" class="btn btn-primary" value="Check Email" />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password1" class="form-control form-control-lg"  />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="confirmpassword" class="form-control form-control-lg"  />
                                        <label class="form-label" for="confirmpassword">Repeat your password</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="number" class="form-control form-control-lg"  />
                                        <label class="form-label" for="number">Your Phone</label>
                                    </div>
                                    <!-- <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="otp" class="form-control form-control-lg" placeholder="Input OTP" />
                                        
                                    </div>
                                    <div class="d-flex ">
                                        <input type="submit" value="Send OTP" name="sendOTP" class="btn btn-primary">
                                    </div> -->
                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" name="agree"  />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="create" id="tick" value="Đăng ký" class="btn btn-primary">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="login.php"
                                            class="fw-bold text-body"><u>Login here</u></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php 
    if($isSuccess && $isEmailTonTai== false){
        include './PHPMailer/src/Exception.php';
        include './PHPMailer/src/PHPMailer.php';
        include './PHPMailer/src/SMTP.php';
        include './PHPMailer/src/POP3.php';
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 0;                     
        $mail->isSMTP();                                         
        $mail->Host       = 'smtp.gmail.com';                  
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'longvo0410000@gmail.com';                   
        $mail->Password   = 'ummobicewoyzgguk';                             
        $mail->SMTPSecure = 'tls';           
        $mail->Port       = 587;                                   
        $mail->CharSet = 'UTF-8'; 
        $mail->setFrom('longvo0410000@gmail.com', 'Website bán hoa');
        $mail->addAddress("$email", "$name");   
        
        $mail->isHTML(true);                                
        $mail->Subject = "Hello bạn $name đã đăng ký website của chúng tôi ";
        $mail->Body    = "OTP của $name là: <b>$otp</b> ";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
    }
    ?>
  </body>
</html>
