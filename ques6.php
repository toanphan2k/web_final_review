<?php
    $conn = mysqli_connect("localhost", "root", "123456") or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($conn, "movies");
    $result = mysqli_query($conn, "SELECT * FROM info");
    while ($row = mysqli_fetch_array($result)) {
    echo $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3];
    echo "<br />";
    }
    mysqli_close();
?>

<html>
<head></head>
<body>
<?php
    error_reporting(0);
    $error = 0;
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $conn = mysqli_connect("localhost", "root", "123456") or
            die("Could not connect: " . mysqli_error());
        mysqli_select_db($conn, "movies");
    //kiem tra du lieu
    if($_POST['tieude'] != ""
        && $_POST['theloai'] != ""
        && $_POST['rating'] != "") {
        $result = mysqli_query($conn, "INSERT INTO info VALUES
        ('','".$_POST['tieude']."','".$_POST['namphathanh']."','".$_POST[' rating']."')");
        $error = 0;
        mysqli_close($conn);
        }
    else {
        $error = 1;
    }
}
?>

    <h2>Thêm phim mới</h2>
    <form action="" method="post">
    <?php
        if($error == 1) {
    ?>
    Lỗi dữ liệu <br /><br />
    <?php
    }
    ?>
    <b>Tên phim:</b>
    <input type="text" name="tieude" style="width:250px"
    value="<?=$_POST['tieude'];?>" />
    
<br /><br />
<b>Năm phát hành:</b>
<select name="namphathanh">
<?php
$year_select = $_POST["namphathanh"];
for($i=1990; $i<=2020;$i+=1) {
$selected = ($year_select == $i) ? "selected" : "";
?>
<option <?php echo $selected; ?> value="<?php echo $i; ?>">
<?php echo $i; ?>
</option>
<?php
}
?>
</select>
<br /><br />
<b>Xếp hạng:</b>
<input type="radio" name="rating" value="1" <?php echo ($_POST["rating"]
== 1) ? "checked" : "" ?> /> 1 &nbsp;&nbsp;
<input type="radio" name="rating" value="2" <?php echo ($_POST["rating"]
== 2) ? "checked" : "" ?> /> 2 &nbsp;&nbsp;
<input type="radio" name="rating" value="3" <?php echo ($_POST["rating"]
== 3) ? "checked" : "" ?> /> 3 &nbsp;&nbsp;
<input type="radio" name="rating" value="4" <?php echo ($_POST["rating"]
== 4) ? "checked" : "" ?> /> 4 &nbsp;&nbsp;
<input type="radio" name="rating" value="5" <?php echo ($_POST["rating"]
== 5) ? "checked" : "" ?> /> 5 &nbsp;&nbsp;
<br /><br />
<input type="submit" value="Thêm phim" />
<input type="reset" value="Nhập lại" />
</form>
</body>
</html>