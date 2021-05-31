<html>
<head>
<meta charset="utf-8">
<title>Bearbeiten</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body background="logistics.jpg">

<?php 
$connect = mysqli_connect("###.###.###.##:####", "########", "################", "####");
$output = '';
$connect->set_charset("utf8");
$sorgu = $connect->query("SELECT * FROM satislar WHERE SiraNo =".(int)$_GET['SiraNo']); 
$sonuc = $sorgu->fetch_assoc(); 
?>
	<br />
	<br />
<div class="col-md-6"  style="padding-left: 45px;">
	<form action="" method="post">
    <table class="table" style="width:600">
        
        <tr>
          <td width="200" align="left" valign="middle"><blockquote style="margin:0px"> <strong style="color: #FFFFFF"> Name der Firma</strong></blockquote></td>
            <td style="vertical-align: middle"><input type="text" name="Urun_adi" class="form-control" value="<?php echo $sonuc['Urun_adi']; ?>">
            </td>
        </tr>
 <tr>
   <td width="200" align="left" valign="middle"><blockquote style="margin:0px"> <strong style="color: #FFFFFF"> Produktname</strong></blockquote></td>
            <td style="vertical-align: middle"><input type="text" name="Gelen_miktar" class="form-control" value="<?php echo $sonuc['Gelen_miktar']; ?>">
            </td>
        </tr>
         <tr>
           <td width="200" align="left" valign="middle"><blockquote style="margin:0px"> <strong style="color: #FFFFFF"> Menge</strong></blockquote></td>
            <td style="vertical-align: middle"><input type="text" name="Satilan_miktar" class="form-control" value="<?php echo $sonuc['Satilan_miktar']; ?>">
            </td>
        </tr>
		<tr>
		  <td width="200" align="left" valign="middle"><blockquote style="margin:0px"> <strong style="color: #FFFFFF"> Ort</strong></blockquote></td>
            <td style="vertical-align: middle"><input type="text" name="Kalan_miktar" class="form-control" value="<?php echo $sonuc['Kalan_miktar']; ?>">
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="SiraNo" class="form-control" value="<?php echo $sonuc['SiraNo']; ?>">
			</td>
            <td><input type="submit" class="btn btn-primary" value="Speichern"></td>
        </tr>

    </table>
</form>
</div>
<div>
<?php 

if ($_POST) { 
    
    $Urun_adi = $_POST['Urun_adi'];
    $Gelen_miktar = $_POST['Gelen_miktar'];
	$Satilan_miktar = $_POST['Satilan_miktar'];
	$Kalan_miktar = $_POST['Kalan_miktar'];
	$SiraNo = $_POST['SiraNo'];

    if ($Urun_adi<>"" && $Gelen_miktar<>"" && $Satilan_miktar<>"" && $Kalan_miktar<>"") { 
        if ($connect->query("UPDATE satislar SET Urun_adi = '$Urun_adi', Gelen_miktar = '$Gelen_miktar', Satilan_miktar = '$Satilan_miktar', Kalan_miktar = '$Kalan_miktar' WHERE SiraNo =".(int)$_GET['SiraNo'])) 
        {
            header("location:index.php"); 
        }
        else
        {
            echo "Error updating record: " . mysqli_error($connect);
        }
    }
}
?>
</body>
</html>
