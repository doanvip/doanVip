    <?php
session_start();
include 'connect.php';
if (!$_SESSION['username']) {
	header('location:login.php');

}

?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>add user</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <form method = 'post'>
        <input  type = 'text' name = 'ID' placeholder = 'nhap ID san pham' size = '40px'>
        <input type = 'submit' name = 'search' value = 'search'  id = 'button'>
        <a href = 'index1.php' > <input type = 'button' value = 'BackHome' id  = 'button'>  </a>
    </form>
    <body>
        <table border = '1'>
            <tr>
                <th>ID</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Password </th>
                <th>email</th>
                <th>roles</th>
                <th colspan = '2'>Action</th>
            </tr>

            <?php
$sql = "SELECT * FROM users";
$results = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($results)) {
	?>
                <tr>
                    <td> <?php echo $row['ID_user'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['roles'] ?></td>
                    <td> <a href = 'delete.php?iddel=<?php echo $row['ID_user'] ?>'> Delete </a></td>
                    <td> <a href = "update.php?idUpdate=<?php echo ($row['ID_user']) ?>"> Update </a> </td>
                </tr>
            <?php }?>

        </table>
        <a href = 'index1.php'> <input type = 'button' value = 'Home' id = 'button'> </a>




        </body>
        </html>