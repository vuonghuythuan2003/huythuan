<?php
  session_start();
  if(isset($_POST['nutdangnhap']) == true) {
      $username=$_POST['username'];
      $password=$_POST['password'];
      $conn = new PDO("mysql:host=localhost; dbname=nckh; charset=utf8", "root"); 
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $sql = "SELECT * FROM t_user WHERE username=? AND password=? AND active=1";
      $st=$conn->prepare($sql);
      $st->execute([$username,$password]);

      if ($st->rowCount() == 1) {
          $user = $st->fetch();
          $idgroup = $user['idgroup'];
          
          if ($idgroup == 0) {
              $_SESSION['login_id'] = $user['id'];
              $_SESSION['login_user'] = $user['username'];
              $_SESSION['login_fullname'] = $user['fullname'];
              header('location: ../views/test.php');
              exit();
          } elseif ($idgroup == 1) {
              $_SESSION['admin_id'] = $user['id'];
              $_SESSION['admin_user'] = $user['username'];
              $_SESSION['admin_fullname'] = $user['fullname'];
              header('location: indexadmin.php');
              exit();
          } else {
              echo "Unknown user role";
          }
      } else {
          echo "Mật khẩu hoặc tài khoản đăng nhập sai";
      }
  }
  ?>



  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Trang Đăng nhập</title>
      <link rel="stylesheet" href="../CSS/login.css">

  </head>
  <body>
        <form method="post">
            <div class="vid-container">
                <video id="Video1" class="bgvid back" autoplay="true" muted="muted" preload="auto" loop>
                    <source src="../videos/intro.mp4" type="video/mp4">
                </video>
                <div class="inner-container">
                    <div class="box">
                        <h1 style="color:#fff">Login</h1>
                        <input value="<?php if(isset($username)==true )echo $username;?>" for="username"  type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập của bạn">
                        <input value="<?php if(isset($password)==true )echo $password;?>" for="password" type="password" class="form-control" id="password" name="password" autocomplete=”new-password” placeholder="Nhập mật khẩu của bạn">
                        <button type="submit" name="nutdangnhap" class="btn btn-primary">Login</button>
                        <p>Not a member? <span class="signup"><a href ="signup.php">Sign Up</a></span></p>
                        <p><span class="signup"><a href ="quenmk.php">Quên mật khẩu</a></span></p>

                    </div>
                </div>
            </div>
        </form>

  </body>
  </html>
