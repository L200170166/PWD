<html>
    <head>
        <title>Penjumlahan</title>
    </head>
<body>
<form method="post">
Nilai A adalah = <input type="text" name="a" value="<?php echo $_POST["a"] ?>" required><br>
Nilai B adalah = <input type="text" name="b" value="<?php echo $_POST["b"] ?>" required><br>
<?php
$a=$_POST["a"];
$b=$_POST["b"];
$penjumlahan = $a+$b;
echo "Nilai A adalah = $a</br>";
echo "Nilai B adalah = $b</br>";
echo "Jadi Nilai A ditambah Nilai B adalah = $penjumlahan";
?>
<br><input type="submit" value="Jumlahkan">
</form>
</body>
</html>