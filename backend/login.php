<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body id='login'>
    <h1> DANG NHAP </h1>
    <div id = 'form' >
        <form method = 'post' >
            <div> Username : </div>
            <div> <input type ='text' name = 'username' placeholder = 'Ten dang nhap'> </div>
            <div> Password </div>
            <div><input type ='text' name = 'password' placeholder = 'Mat khau dang nhap'> </div> <br>
            <div> <input type = 'submit' name = 'login' value = 'Login' id = 'button'> </div> <br>
            <a href = 'http://localhost:88/doanthuattoan' > <input type = 'button' value = 'Trang chủ' id = 'button'> </a>
        </form>
    </div>
    <?php
include 'connect.php';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$pass' ";
	$query = mysqli_query($connect, $sql);
	while ($result = mysqli_fetch_array($query)) {
		$roles = $result['roles'];
		// var_dump($roles);
		$row = mysqli_num_rows($query);
		if ($username == $result['username'] && $pass == $result['password'] && $roles == '1') {
			$_SESSION['username'] = $username;
			header('location:index1.php');
		}
		if ($row == 0) {
			echo "sai ten dang nhap hoac mat khau";
		} elseif ($username == $result['username'] && $pass == $result['password'] && $roles == '0') {
			var_dump($roles);
			$_SESSION['kh'] = $username;
			header('location: http://localhost:88/doanthuattoan');
		} elseif ($username == $result['username'] && $pass == $result['password'] && $roles == '2') {
			$_SESSION['username'] = $username;
			header('location:index1.php');
		}

	}
}

?>
</body>
</html>