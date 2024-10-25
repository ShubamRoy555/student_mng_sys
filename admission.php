<?php
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
	<title>Admission</title>

	<?php
     include 'admin_css.php';
    ?>
</head>
<body>
<?php
include 'admin_sidebar.php';
?>
	<div class="content">
        <center>
		
		<h1>Apply for Admission</h1>
        <br><br>
        <table border="5px solid black">
            <tr>
                <th style="padding: 20px; font: size 15px;">Name</th>
                <th style="padding: 20px; font: size 15px;">Email</th>
                <th style="padding: 20px; font: size 15px;">Phone</th>
                <th style="padding: 20px; font: size 15px;">Address</th>
                <th style="padding: 20px; font: size 15px;">Course</th>
                <th style="padding: 20px; font: size 15px;">Password</th>
            </tr>
            <?php
            while($info=$result->fetch_assoc()){
            ?>
            <tr>
                <td style="padding: 20px;"><?php echo "{$info['user']}"; ?></td>
                <td style="padding: 20px;"><?php echo "{$info['email']}";?></td>
                <td style="padding: 20px;"><?php echo "{$info['phone']}";?></td>
                <td style="padding: 20px;"><?php echo "{$info['address']}";?></td>
                <td style="padding: 20px;"><?php echo "{$info['course']}";?></td>
                <td style="padding: 20px;"><?php echo "{$info['password']}";?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </center>
	</div>

</body>
</html>