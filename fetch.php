<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
 $(".bearbeiten").hide();
  $("button").click(function(){
	$(".bearbeiten").toggle();
  });
});
</script>
</head>

<?php
$connect = mysqli_connect("###.###.###.##:####", "########", "################", "####");
$output = '';
$connect->set_charset("utf8");

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM satislar 
	WHERE Urun_adi LIKE '%".$search."%'
	OR Gelen_miktar LIKE '%".$search."%' 
	OR Satilan_miktar LIKE '%".$search."%' 
	OR Kalan_miktar LIKE '%".$search."%' 
	ORDER BY Urun_adi
	";
}
else
{
	$query = "
	SELECT * FROM satislar ORDER BY Urun_adi";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<button type="button" class="btn btn-warning" style="float:right">Bearbeiten anzeigen/ausblenden (Vorsichtig!)</button>
					<table class="table table bordered" style="background-color:white;" >
						<tr>
							<th>Firma</th>
							<th>Produktname</th>
							<th>Menge</th>
							<th>Ort</th>
							<th class="bearbeiten"  style="display:none">Bearbeiten</th>
							<th class="bearbeiten"  style="display:none">Löschen</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr >
				<td>'.$row["Urun_adi"].'</td>
				<td>'.$row["Gelen_miktar"].'</td>
				<td>'.$row["Satilan_miktar"].'</td>
				<td>'.$row["Kalan_miktar"].'</td>
				<td class="bearbeiten"  style="display:none"><a href="duzenle.php?SiraNo='.$row["SiraNo"].'" class="btn btn-primary">Bearbeiten</a></td>
				<td class="bearbeiten"  style="display:none"><a href="sil.php?SiraNo='.$row["SiraNo"].'" class="btn btn-danger">Löschen</a></td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Nicht gefunden.';
}
?>
