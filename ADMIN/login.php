 <?php
session_start();

// Hàm kiểm tra đăng nhập
function isUserLoggedIn()
{
    return isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && $_SESSION['session_id'] == session_id();
}

// Hàm xác thực tài khoản
function authenticateUser($conn, $username, $password)
{
    $sql = "SELECT * FROM t_user WHERE username = ? AND password = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['session_id'] = session_id(); // Lưu session_id
        return true;
    } else {
        return false;
    }
}

// Thông tin kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nckh";

try {
    // Kết nối đến CSDL
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kiểm tra xem tài khoản có đang hoạt động hay không
    if (isUserLoggedIn()) {
        // Tài khoản đang hoạt động
        $user_id = $_SESSION['user_id'];
        $sql_check_idgroup = "SELECT idgroup FROM t_user WHERE id = ?";
        $stmt_check_idgroup = $conn->prepare($sql_check_idgroup);
        $stmt_check_idgroup->execute([$user_id]);
        $idgroup_result = $stmt_check_idgroup->fetchColumn();

        if ($idgroup_result == 0) {
            // Nếu idgroup = 0, chuyển hướng tới trang header.php
            header('Location: ../views/header.php');
            exit();
        } elseif ($idgroup_result == 1) {
            // Nếu idgroup = 1, chuyển hướng tới trang admin.php
            header('Location: ../ADMIN/qly_admin.php');
            exit();
        }
    } else {
        // Tài khoản không đang hoạt động
        // Yêu cầu người dùng đăng nhập hoặc thực hiện xác thực tài khoản
        if (isset($_POST['login_button'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (authenticateUser($conn, $username, $password)) {
                // Đăng nhập thành công, kiểm tra idgroup và chuyển hướng tới trang phù hợp
                $user_id = $_SESSION['user_id'];
                $sql_check_idgroup = "SELECT idgroup FROM t_user WHERE id = ?";
                $stmt_check_idgroup = $conn->prepare($sql_check_idgroup);
                $stmt_check_idgroup->execute([$user_id]);
                $idgroup_result = $stmt_check_idgroup->fetchColumn();

                if ($idgroup_result == 0) {
                    // Nếu idgroup = 0, chuyển hướng tới trang header.php
                    header('Location: ../views/header.php');
                    exit();
                } elseif ($idgroup_result == 1) {
                    // Nếu idgroup = 1, chuyển hướng tới trang admin.php
                    header('Location: ../ADMIN/qly_admin.php');
                    exit();
                }
            } else {
                // Xác thực không thành công, thông báo lỗi hoặc yêu cầu đăng nhập lại
                echo "Mật khẩu hoặc tên đăng nhập không đúng.";
            }
        } else {
            // Hiển thị biểu mẫu đăng nhập
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
                <form method="post" action="">
                    <div class="vid-container">
                        <video id="Video1" class="bgvid back" autoplay="true" muted="muted" preload="auto" loop>
                            <source src="../IMAGE/vid.mp4" type="video/mp4">
                        </video>
                        <div class="inner-container">
                            <div class="box">
                                <h1 style="color:#fff">Login</h1>
                                <!-- <label for="username">Tên đăng nhập:</label> -->
                                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập của bạn" required><br>

                                <!-- <label for="password">Mật khẩu:</label> -->
                                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required><br>

                                <button type="submit" name="login_button" class="btn btn-primary">Login</button>
                                <p>Not a member? <span class="signup"><a href="signup.php">Sign Up</a></span></p>
                                <p><span class="signup"><a href="quenmk.php">Quên mật khẩu</a></span></p>
                            </div>
                        </div>
                    </div>
                </form>
            </body>

            </html>

<?php
        }
    }
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>
