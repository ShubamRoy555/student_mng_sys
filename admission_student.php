<?php
$host="localhost";

$user="root";

$password="";/*NULL*/

$database="schoolproject";

$data=mysqli_connect($host,$user,$password,$database);

if(isset($_POST['submit'])){
    $s_name=$_POST['name'];
    $s_email=$_POST['email'];
    $s_mobile=$_POST['mobile'];
    $s_address=$_POST['address'];
    $s_course=$_POST['course'];
    $s_password=$_POST['password'];
    $user_type="student";

    $sql="INSERT INTO user (user,email,phone,address,course,password,usertype) VALUES ('$s_name','$s_email','$s_mobile','$s_address','$s_course','$s_password','$user_type')";
     
    $result=mysqli_query($data,$sql);

    if($result){
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea, select {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Student Admission Form</h1>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="mobile" required>

            <label for="phone">Password:</label>
            <input type="tel" id="pass" name="password" required>

            <label for="program">Select Program:</label>
            <select id="program" name="course" required>
                <option value="" disabled selected>Select a program</option>
                <option value="Web Development">Web Development</option>
                <option value="Graphic Design">Graphic Design</option>
                <option value="Marketing">Marketing</option>
            </select>
            <input type="submit" name="submit" value="Submit" id="btn_submit" class="btn btn-success">
        </form>
    </div>
</body>
</html>
