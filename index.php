<?php
$connect = mysqli_connect("###.###.###.##:####", "########", "################", "####");
$output = '';
$connect->set_charset("utf8");
?>


<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Jquery Search AJAX - PHP MySql</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
	<body background="logistics.jpg">
		<div class="container">
			<br />
			<br />
			<div>
			<form action="" method="post">
    
				<table class="table"  style="width:600">
        		<tr>
					<td width="200" height="10" align="left" valign="middle"><blockquote style="margin:0px">					  <strong style="color: #FFFFFF"> Name der Firma</strong></blockquote></td>
				    <td  style="vertical-align: middle"><input type="text" name="Urun_adi" class="form-control" ></td>
				</tr>
				<tr>
					<td width="200" height="10" align="left" valign="middle"><blockquote style="margin:0px">					  <strong style="color: #FFFFFF"> Produktname</strong>				    </blockquote></td>
				  <td style="vertical-align: middle"><input type="text" name="Gelen_miktar" class="form-control" ></td>
				</tr>
				<tr>
					<td width="200" height="10" align="left" valign="middle"><blockquote style="margin:0px">					  <strong style="color: #FFFFFF"> Menge</strong>				    </blockquote></td>
				  <td style="vertical-align: middle"><input type="text" name="Satilan_miktar" class="form-control" > </td>
				</tr>
				<tr>
					<td width="200" height="10" align="left" valign="middle"><blockquote style="margin:0px">					  <strong style="color: #FFFFFF"> Ort</strong>				    </blockquote></td>
				  <td style="vertical-align: middle"><input type="text" name="Kalan_miktar" class="form-control" ></td>
				</tr>
				<tr>
					<td width="200" height="10"></td>
				  <td><input class="btn btn-warning"  type="submit" value="Speichern"></td>
				</tr>

			</table>

		</form>
		
	<?php 		
	if ($_POST) { 
    $Urun_adi = $_POST['Urun_adi']; 
    $Gelen_miktar = $_POST['Gelen_miktar'];
	$Satilan_miktar = $_POST['Satilan_miktar']; 
    $Kalan_miktar = $_POST['Kalan_miktar'];

    if ($Urun_adi<>"" && $Gelen_miktar<>"" && $Satilan_miktar<>"" && $Kalan_miktar<>"") { 
        if ($connect->query("INSERT INTO satislar (Urun_adi, Gelen_miktar, Satilan_miktar, Kalan_miktar) VALUES ('$Urun_adi','$Gelen_miktar', '$Satilan_miktar', '$Kalan_miktar')")) 
        {
            echo "Daten wurden hinzugefügt.";
        }
        else
        {
            echo "Versuchen Sie es erneut, ohne Leerzeichen zu hinterlassen.";
        }

    }

	}
	?>			
			
		<div/>	
			
			
			<h2 align="center" style="color:white">Kundeninformation</h2>
			<br />
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Suchen</span>
					<input type="text" name="search_text" id="search_text" placeholder="Firma, Produktname, Ort ... " class="form-control" />
				</div>
			</div>
			<br />
			<div id="result" background="logistics.jpg"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>




