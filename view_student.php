<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}/*Check if a user fill-up the username or not.if not send it to login page */
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");/*If usertype is admin send to login*/
}
$host="localhost";

$user="root";

$password="";/*NULL*/

$database="schoolproject";


$data=mysqli_connect($host,$user,$password,$database);

$sql="SELECT * FROM user";

$result=mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<?php
    include 'admin_css.php';
	?>
    <style type="text/css">
        .table_th{
            padding: 20px;
            font-size: 20px
        }
        .table_td{
            padding: 20px;
            background-color: skyblue;
        }
    </style>
</head>
<body>

	<?php
    include 'admin_sidebar.php';
	?>

	<div class="content">
		<center>
		<h1>Student Data</h1>
        <?php
        if($_SESSION['massage']){
            echo $_SESSION['massage'];
        }
        unset($_SESSION['massage']);/*After deleting 1 data when we refersh the massage will be deletd*/
        ?>
        <br><br>
        <table border="5px solid black">
            <tr>
            <th class="table_th">Username</th>
            <th class="table_th">Email</th>
            <th class="table_th">Phone</th>
            <th class="table_th">Password</th>
            <th class="table_th">Address</th>
            <th class="table_th">Delete</th>
            <th class="table_th">Update</th>
            
            </tr>
            <?php
              while($info=$result->fetch_assoc()){  
            ?>
            <tr>
            <td class="table_td"><?php echo "{$info['user']}"; ?></td>
            <td class="table_td"><?php echo "{$info['email']}"; ?></td>
            <td class="table_td"><?php echo "{$info['phone']}"; ?></td>
            <td class="table_td"><?php echo "{$info['password']}"; ?></td>
            <td class="table_td"><?php echo "{$info['address']}"; ?></td>
            <td class="table_td"><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are you sure?');\" href='delete.php?student_id={$info['id']}'> DELETE </a>";/*This is used when some one click on the delete button then theres is is stored in student_id variable*/ ?>
            <td class="table_td"><?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'> Update </a>"; ?></td></td>
            </tr>
            <?php
              }
            ?>
        </table>
        </center>
	</div>

</body>
</html>