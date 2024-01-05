<?php 
$loi="";
if (isset($_POST['nutguiyeucau'])==true){
    $email = $_POST['email'];
    $conn = new PDO("mysql:host=localhost; dbname=nckh; charset=utf8", "root"); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= "SELECT * FROM t_user WHERE email=?";
    $st=$conn->prepare($sql);
    $st->execute([$email]);
    $count = $st->rowCount();
    if ($count==0){
        $loi="Email bạn nhập chưa đăng ký";
    }else{
        $newpw = substr( md5(rand(0,999999)),0,8);
        $sql= "UPDATE t_user SET password=? WHERE email=?";
        $st=$conn->prepare($sql);
        $st->execute([$newpw, $email]);

        GuiMkmoi($email, $newpw);
    }
}
?>
<?php
function GuiMkmoi($email, $newpw){
    require "PHPMailer-master/src/PHPMailer.php"; 
    require "PHPMailer-master/src/SMTP.php"; 
    require 'PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->SMTPDebug = 0; 
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true; 
        $mail->Username = 'batungnguyen78@gmail.com';
        $mail->Password = 'mxea rvjt gqqt zmtd';  
        $mail->SMTPSecure = 'ssl';  
        $mail->Port = 465;                
        $mail->setFrom('batungnguyen78@gmail.com', 'NCKH-hunre' ); 
        $mail->addAddress($email);   
        $mail->isHTML(true); 
        $mail->Subject = 'Thư gửi lại mật khẩu';
        $noidungthu = "<h1>Thư gửi lại mật khẩu</h1>
            Bạn nhận được thư này do bạn hoặc ai đó yêu cầu mật khẩu mới 
            Mật khẩu của bạn là {$newpw}
        "; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong, hãy vào gmail lấy mật khẩu mới của bạn';
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<form method = "POST" style="width:600px;" class="border border-primary border-2 m-auto p-2">
    <h4 class="mb-3 text-center" >Quên mật khẩu</h4>
    <?php if($loi!=""){ ?>
        <div class="alert alert-danger"><?= $loi?></div>
    <?php } ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input value="<?php if(isset($email)==true) echo $email ?>" type="email" class="form-control" id="email" name="email">
    </div>
    <button type="submit" name="nutguiyeucau" value="nutgui" class="btn btn-primary">Gửi yêu cầu cấp lại mật khẩu mới</button>
    <a href="doimatkhau.php">Đổi mật khẩu</a>
</form>
</body>
</html>
