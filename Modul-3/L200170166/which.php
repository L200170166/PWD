<html>
<head>
<title> Bilangan Ganjil Genap </title>
</head>
<body>
<b>
<form method="post">
    Masukkan Bilangan nya brooo : <input type="text" name="bilangan"> <br><br>
     <input type="submit" value="Cari Bilangan" >
</form>
<?php
$bilangan = isset($_POST['bilangan'])?abs((int)$_POST['bilangan']):'';
{
if($bilangan == null )
 echo ("Masukkan Angka brooo");
else if ($bilangan % 2 == 0)
 echo (" $bilangan adalah bilangan Genap ");
else
 echo (" $bilangan adalah bilangan Ganjil ");
}
?>
</b>
</body>
</html>