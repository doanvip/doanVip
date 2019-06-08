<?php include 'connect.php';
session_start();
if (!$_SESSION['username']) {
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>addUser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1> Add user </h1>
    <div id = 'form' >
        <form method = 'post' enctype = "multipart/form-data" id = 'mainf'>
            <div> FullName : </div>
            <div> <input type = 'text' name = 'name'> </div>
            <div> Username : </div>
            <div> <input type = 'text' name = 'username'> </div>
            <div> email : </div>
            <div> <input type = 'text' name = 'email'> </div>
            <div> password : </div>
            <div> <input type= 'text' name = 'password'> </div>
            <div> Roles : </div>
            <div> <input type = 'text' name = 'roles'> </div> <br>

            <div> <input type = 'submit' name = 'add' value ='add' id = 'button'> </div> <br><br><br>
            <a href = 'listUser.php'> <input type = 'button' value = 'List user' id = 'button'> </a>
        </form>
    </div>
    <?php
if ($_SESSION['username'] == 'admin') {
	if (isset($_POST['add'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$roles = $_POST['roles'];
		if ($name == null || $username == null || $email == null || $password == null || $roles == null) {
			echo 'Vui lòng nhập đầy đủ thông tin';
		} else {
			$sql = "INSERT INTO user( name , username, email ,password , roles)
                VALUE('$name' , '$username'  ,'$email',$password , '$roles' )";
			$query = mysqli_query($connect, $sql);
			header('location:index1.php');
		}

	}
} else {
	echo " ban không có quyền này!";
}
?>
</body>
</html>