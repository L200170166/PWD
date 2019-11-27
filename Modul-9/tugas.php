<html>
<head>
	<title>Tugas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
mysql_connect('localhost', 'root', '');
mysql_select_db('informatika');

$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];

if($submit){
    $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    if($row['username']!=""){
        if($row['status']=="Administrator"){
            //berhasil login administrator
            $_SESSION['username']=$row['username'];
            $_SESSION['status']=$row['status'];
            ?>
            <script language script="Javascript"> 
                alert('Anda Login sebagai <?php
                echo $row['username']; ?>');
                document.location = 'hasillogin.php';
            </script>
            <?php
        }else if($row['status']=='Member'){
            //berhasil login member
            $_SESSION['username']=$row['username'];
            $_SESSION['status']=$row['status'];
            ?>
            <script language script="Javascript"> 
                alert('Anda Login sebagai <?php
                echo $row['username']; ?>');
                document.location = 'member.php';
            </script>
            <?php
            }
        }else{
            //gagal login
        ?>
        <script language script ="JavaScript">
            alert('Gagal Login');
            document.location = 'tugas.php';
        </script>
        <?php    
    }
}
?>
<div class='form'>
<form method='POST' action='tugas.php'>
<center>
<h1>Login Page</h1>    
        <p align='center'>
        Username : <input type='text' name='username'><br><br>
        Password : <input type='password' name='password'><br><br>
        <input type='submit' name='submit'></p>
</form>
</div>