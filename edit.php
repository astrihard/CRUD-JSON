<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('produk.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('produk.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

	$post["ID_Produk"] = isset($_POST["ID_Produk"]) ? $_POST["ID_Produk"] : "";
    $post["Produk"] = isset($_POST["Produk"]) ? $_POST["Produk"] : "";
    $post["Tipe"] = isset($_POST["Tipe"]) ? $_POST["Tipe"] : "";
    $post["Detail"] = isset($_POST["Detail"]) ? $_POST["Detail"] : "";
    //$post["Keterangan"] = isset($_POST["Keterangan"]) ? $_POST["Keterangan"] : "";



    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("produk.json", json_encode($all));
    }
    header("Location:index.php");
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
	width: 80%;
	padding: 10px;
	}
	
input[type=text], select, textarea  {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type=submit] {
  
  background-color: DodgerBlue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

button[type=submit]:hover {
  background-color: #0000ff;
}

.button {
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

.button1 {
  background-color: #b4b4b4;
  color: white;
}

.button1:hover {
  
  background-color: #ffffff; 
  color: black; 
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 30px;
  width:60%;
  margin: auto;
}
</style>
</head>
<body>
<div class="header">
<h2>Update Product</h2>

</div>
<!-- /.navbar -->
<div>
        
	
      
        <?php if (isset($_GET["id"])): ?>
		<form method="POST" action="edit.php">
		
			<input type="hidden" value="<?php echo $id ?>" name="id"/>
			
				<label for="inputIDProduk">ID Product</label>
				<input type="text" required="required" id="inputIDProduk" value="<?php echo $jsonfile["ID_Produk"] ?>" name="ID_Produk" >
				
			
				<label for="inputProduk">Product</label>
				<input type="text" required="required" id="inputProduk" value="<?php echo $jsonfile["Produk"] ?>" name="Produk" >
				

			
				<label for="Tipe">Type</label>
				<input type="text" required="required" id="inputTipe" value="<?php echo $jsonfile["Tipe"] ?>" name="Tipe">
				
			
			
				<label for="inputDetail">Detail</label>
				<input type="text" required="required" id="inputDetail" value="<?php echo $jsonfile["Detail"] ?>" name="Detail">
				
			<!-- <div class="form-group">
				<label for="inputKeterangan">Other</label>
				<input type="text" required="required" class="form-control" id="inputKeterangan" value=" " name="Keterangan">
				<span class="help-block"></span>
			</div> -->
			
			
				<button type="submit" class="button button2">Update</button>
				<a class="button button1" href="index.php">Back</a>
			
		
		</form>
		<?php endif; ?>
	</div>	
                
    
<!-- /container -->
</body>
</html>