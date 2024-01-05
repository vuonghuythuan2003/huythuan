<?php
if(session_id()=='') session_start();
if (isset($_SESSION['login_id'])==false){
    header('location:login.php');
    exit();
}
$username=$_SESSION['login_user'];
$loi="";
if (isset($_POST['btndoimk'])==true){
    $passwordold=$_POST['passwordold'];
    $passwordnew_1=$_POST['passwordnew_1'];
    $passwordnew_2=$_POST['passwordnew_2'];
    $conn = new PDO("mysql:host=localhost; dbname=nckh; charset=utf8", "root"); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= "SELECT * FROM t_user WHERE username=? AND password=?";
    $st=$conn->prepare($sql);
    $st->execute([$username, $passwordold]);
    if( $st->rowCount()==0) {$loi.="Mật khẩu cũ nhập sai<br>";}
    if(strlen($passwordnew_1)<6) {$loi.="Mật khẩu mới quá ngắn<br";}
    if ($passwordnew_1!=$passwordnew_2) {$loi.="Mật khẩu mới không khớp nhau<br>";}
    if($loi==""){
        $sql = "UPDATE t_user SET password=? WHERE username=?";
        $st=$conn->prepare($sql);
        $st->execute([$passwordnew_1, $username]);
        header('location: login.php');
        exit();
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<form method="POST" style="width:600px" class="border border-primary rounded border-2 p-2 m-auto">
<?php if($loi!=""){ ?>
        <div class="alert alert-info"><?php echo $loi?></div>
    <?php } ?>
<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input value="<?php echo $username ?>" type="text" disabled class="form-control" id="username" name="username">
  </div>
  <div class="mb-3">
    <label for="passwordold" class="form-label">Mật khẩu cũ</label>
    <input value="<?php if (isset($passwordold)==true) echo $passwordold; ?>" type="password" class="form-control" id="passwordold" name="passwordold">
  </div>
  <div class="mb-3">
    <label for="passwordnew_1" class="form-label">Mật khẩu mới</label>
    <input value="<?php if (isset($passwordnew_1)==true) echo $passwordnew_1; ?>" type="password" class="form-control" id="passwordnew_1" name="passwordnew_1">
  </div>
  <div class="mb-3">
    <label for="passwordnew_2" class="form-label">Nhập lại Mật khẩu mới</label>
    <input value="<?php if (isset($passwordnew_2)==true) echo $passwordnew_2; ?>" type="password" class="form-control" id="passwordnew_2" name="passwordnew_2">
  </div>
  <button type="submit" name="btndoimk" value="doimk" class="btn btn-primary">Đổi mật khẩu</button>
</form>