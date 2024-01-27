<?php
$loi = "";

if (isset($_POST["btndangki"]) == true) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $date = $_POST["date"];

  if (strlen($username) == 0) {
    $loi .= "Chưa nhập tên đăng nhập<br>";
  }
  if (strlen($username) < 6) {
    $loi .= "Tên đăng nhập quá ngắn<br>";
  }
  if (strlen($password) < 6) {
    $loi .= "Mật khẩu quá ngắn<br>";
  }
  if (strlen($fullname) == 0) {
    $loi .= "Chưa nhập họ tên<br>";
  }
  if (strlen($email) < 6) {
    $loi .= "Email nhập không đúng<br>";
  }
  if (strlen($date) < 10) {
    $loi .= "Chưa nhập ngày sinh<br>";
  }

  if ($loi == "") {
    $conn = new PDO("mysql:host=localhost; dbname=nckh; charset=utf8", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO t_user SET username=?, password=?, fullname=?, email=?, date=?, randomkey=?, active=?";
    $st = $conn->prepare($sql);
    $randomkey = substr(md5(rand(0, 99999)), 0, 20);
    $st->execute([$username, $password, $fullname, $email, $date, $randomkey, 0]);
    $id = $conn->lastInsertId();
    $randomkeyWithId = $randomkey . $id;

    // Thêm thông tin người dùng vào bảng user_tests
    $sql_insert_user_tests = "INSERT INTO user_tests (id_name, username, fullname) VALUES (?, ?, ?)";
    $stmt_insert_user_tests = $conn->prepare($sql_insert_user_tests);
    $stmt_insert_user_tests->execute([$id, $username, $fullname]);

    $sqlUpdate = "UPDATE t_user SET randomkey = ? WHERE id = ?";
    $stUpdate = $conn->prepare($sqlUpdate);
    $stUpdate->execute([$randomkeyWithId, $id]);

    GuiMail($conn, $email, $fullname, $id, $randomkey);
    header('Location: login.php');
  }
}

function GuiMail($conn, $email, $fullname, $idUser, $randomkey)
{
  require "PHPMailer-master/src/PHPMailer.php";
  require "PHPMailer-master/src/SMTP.php";
  require 'PHPMailer-master/src/Exception.php';
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);
  try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'batungnguyen78@gmail.com';
    $mail->Password = 'mxea rvjt gqqt zmtd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('batungnguyen78@gmail.com', 'MindWell');
    $mail->addAddress($email, $fullname);
    $mail->isHTML(true);
    $mail->Subject = 'Thư kích hoạt tài khoản';
    $noidungthu = "<h1>Thư kích hoạt tài khoản</h1>
            Xin chúc mừng Bạn đã kích hoạt tài khoản thành công, vui lòng quay lại trang để tiến hành đăng nhập
        ";
    $mail->Body = $noidungthu;
    $mail->smtpConnect(array(
      "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => true
      )
    ));
    $mail->send();
    $sqlUpdateActive = "UPDATE t_user SET active = 1 WHERE id = ?";
    $stUpdateActive = $conn->prepare($sqlUpdateActive);
    $stUpdateActive->execute([$idUser]);
    echo 'Đã gửi mail xong';
  } catch (Exception $e) {
    echo 'Error: ', $mail->ErrorInfo;
  }
}
?>

<!-- Tiếp theo là đoạn mã HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang đăng ký</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../CSS/signup.css">
</head>

<body class="align">
  <div class="grid">
    <form method="POST" class="form login">
      <center>
        <h2>Sign Up</h2>
      </center>
      <?php if ($loi != "") { ?>
        <div class="alert alert-danger"><?php echo $loi ?></div>
      <?php } ?>
      <div class="form_field">
        <label for="username"><i class="fa fa-user" style="color: #606468;"></i></label>
        <input onblur="checkun(this)" value="<?= isset($username) ? $username : "" ?>" type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập từ 6 kí tự trở lên">
        <div id="loitenDangnhap" class="form-text text-danger "></div>
      </div>
      <div class="form_field">
        <label for="password"><i class="fa fa-lock" style="color: #606468;"></i></label>
        <input value="<?= isset($password) ? $password : "" ?>" type="password" class="form-control" id="password" name="password" autocomplete=”new-password” placeholder="Nhập mật khẩu từ 6 kí tự trở lên">
      </div>
      <div class="form_field">
        <label for="fullname"><i class="fa fa-user" style="color: #606468;"></i></label>
        <input value="<?= isset($fullname) ? $fullname : "" ?>" type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập họ tên">
      </div>
      <div class="form_field">
        <label for="email"><i class="fa fa-user" style="color: #606468;"></i></label>
        <input onblur="checkemail(this)" value="<?= isset($email) ? $email : "" ?>" type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
        <div id="loiEmail" class="form-text text-danger "></div>
      </div>
      <div class="form_field">
        <label for="date"><i class="fa fa-user" style="color: #606468;"></i></label>
        <input value="<?= isset($date) ? $date : "" ?>" type="date" class="form-control" id="date" name="date">
      </div>

      <div class="form_field">
        <button class="submitButton" type="submit" id="submit" name="btndangki">Đăng ký</button>
      </div>

    </form>
    <script>
      function checkun(obj) {
        var username = obj.value;
        var url = "http://localhost/NCKH/huythuan/ADMIN/dangky_check.php?username=" + username;
        fetch(url)
          .then(d => d.json())
          .then(data => {
            if (data.count > 0) {
              document.getElementById('loitenDangnhap').innerText = "Tên đăng nhập " + username + " đã có người dùng";
            } else document.getElementById('loitenDangnhap').innerText = "Bạn có thể dùng tên " + username;

          })
      }

      function checkemail(obj) {
        var email = obj.value;
        var url = "http://localhost/NCKH/huythuan/ADMIN/dangky_check2.php?email=" + email;
        fetch(url)
          .then(d => d.json())
          .then(data => {
            if (data.count > 0) {
              document.getElementById('loiEmail').innerText = "Email " + email + " đã có người dùng";
            } else document.getElementById('loiEmail').innerText = "Bạn có thể dùng email " + email;

          })
      }
    </script>
  </div>

</body>

</html>