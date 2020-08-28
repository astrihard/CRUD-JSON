<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('produk.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

?>
<!DOCTYPE html>
<html lang="en">
<title>Technology Products</title>
<head>
	
	<style>
	.header {
  background-color: #f1f1f1;
  
  text-align: center;
}
	form{
	margin: auto;
	width: 100%;
	padding: 5px;
	}
	
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 30px;
  width:80%;
  margin: auto;
}
Table {
background-color: #ffffff;
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

Table th, Table td {
  text-align: left;
  padding: 12px;
}

Table tr {
  border-bottom: 1px solid #ddd;
}


</style>
</head>
<body>
<div class="header">
<h2>View Product</h2>

</div>
<!-- /.navbar -->
<div>
        <?php if (isset($_GET["id"])): ?>
		<form>
		
			<table>
			<tr>
				<td><label for="inputIDProduk">ID Product</label></td>
				<td><label for="inputIDProduk"><?php echo $jsonfile["ID_Produk"] ?></label></td>
			</tr>
			<tr>
				<td><label for="inputProduk">Product</label></td>
				<td><label for="inputProduk"><?php echo $jsonfile["Produk"] ?></label></td>
			</tr>
			<tr>
				<td><label for="Tipe">Type</label></td>
				<td><label for="Tipe"><?php echo $jsonfile["Tipe"] ?></label></td>
			</tr>
			<tr>
				<td><label for="inputDetail">Detail</label></td>
				<td><label for="inputDetail"><?php echo $jsonfile["Detail"] ?></label></td>
			</tr>
			</table>
			
		
		</form>
		<?php endif; ?>
		
 </div>               
    
<!-- /container -->
</body>
</html>