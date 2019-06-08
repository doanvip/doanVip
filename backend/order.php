    <?php include 'connect.php';?>
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
    <form method = 'post'>
        <input  type = 'text' name = 'ID' placeholder = 'nhap ID san pham' size = '40px'>
        <input type = 'submit' name = 'search' value = 'search'  id = 'button'>
        <a href = 'index1.php' > <input type = 'button' value = 'BackHome' id  = 'button'>  </a>
    </form>
    <body>
        <table border = '1'>
            <tr>
                <th>ID_order</th>
                <th>ID_user</th>
                <th>Total_money</th>
                <th>quantity </th>
                <th colspan = '1'>Action</th>
            </tr>

            <?php
$sql = "SELECT * FROM order_detail";
$rs = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($rs)) {
	?>
                <tr>
                    <td> <?php echo $row['ID'] ?></td>
                    <td><?php echo $row['ID_order'] ?></td>
                    <td><?php echo $row['ID_product'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td> <a href = 'delete.php?idOrder=<?php echo $row['ID_order'] ?>'> order detail </a></td>
                </tr>
            <?php }?>

        </table>
        <a href = 'index1.php'> <input type = 'button' value = 'Home' id = 'button'> </a>

        </body>
        </html>