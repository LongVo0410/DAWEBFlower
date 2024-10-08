<?php
include "index.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
    session_start();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = sha1($_POST['password1']); // Hash the password
        $flagtbao = false;
        // Prepare SQL query to check credentials
        $sql = "SELECT * FROM dangky WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connect, $sql);
      
        if($result->num_rows>0){
            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['name'];
            $flagtbao=true;
            header('location:trangchu.php');
        }
        else{
            header('location:login.php');
        }
        

    }
    ?>
    <form action="login.php" method="post" id="dangky">
        <section class="vh-100 bg-image">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Login</h2>
                                    <?php 
                                    echo '<p style="color: red;">Đăng nhập không thành công!!!</p>';

                                    ?>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control form-control-lg"  />
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password1" class="form-control form-control-lg"  />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" name="login" id="ticklogin" value="Đăng nhập" class="btn btn-primary">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="dangky.php"
                                            class="fw-bold text-body"><u>Sign up here</u></a></p>
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
    <script type="text/javascript">
        $(document).ready(function(){
            <?php if (isset($_POST['login'])): ?>
                var isSuccess = <?php echo $flagtbao ? 'true' : 'false'; ?>;
                if (isSuccess) {
                    Swal.fire({
                        icon: "success",
                        title: "Đăng nhập thành công",
                        
                    });
                    
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Đăng nhập thất bại",
                        text: "Password or Email không tìm thấy!"
                    });
                    
                    
                }
            <?php endif; ?>
        });
    </script>
  </body>
</html>