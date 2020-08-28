<?php 
    if ( !empty($_POST)) { 
        // post values
        $ID_Produk  = $_POST['ID_Produk'];
        $Produk  = $_POST['Produk'];
        $Tipe    = $_POST['Tipe'];
        $Detail = $_POST['Detail'];
		//$Keterangan = $_POST['Keterangan'];
      
		$file = file_get_contents('produk.json');
		$data = json_decode($file, true);
		unset($_POST["add"]);
		$data["records"] = array_values($data["records"]);
		array_push($data["records"], $_POST);
		file_put_contents("produk.json", json_encode($data));
		header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<title>Technology Products</title>
<head>
	<style>
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

<!-- /.navbar -->
<div>
        
	<h3>Add Product</h3>
        <form method="POST" action="create.php">
			<!--<div class="form-group"> -->
				<label for="inputID_Produk">ID Product</label>
				<input type="text" required="required" id="inputID_Produk" name="ID_Produk" placeholder="ID Produk">
			<!--<span class="help-block"></span>
			</div> -->
			
			<!--<div class="form-group ">-->
				<label for="inputProduk">Product</label>
				<input type="text" required="required" id="inputProduk" name="Produk" placeholder="Produk">
        		<!--<span class="help-block"></span>
			</div>-->
			
			<!--<div class="form-group">-->
				<label for="inputTipe">Type</label>
				<input type="text" required="required" id="inputTipe" name="Tipe" placeholder="Tipe">
				<!--<span class="help-block"></span>
			</div>-->
			<!--<div class="form-group">-->
				<label for="inputDetail">Detail</label>
				<textarea type="text" required="required" id="inputDetail" name="Detail" placeholder="Detail"></textarea>
				<!--<span class="help-block"></span>
			</div>-->
			<!-- <div class="form-group"> 
				<label for="inputKeterangan">Keterangan</label>
				<input type="text" required="required" class="form-control" id="inputKeterangan" name="Keterangan" placeholder="Keterangan">
				<span class="help-block"></span>
			</div> -->
    
			<!--<div class="form-actions">-->
					<button type="submit">Create</button>
					<a class="button button1" href="index.php">Back</a>
			<!--</div>-->
		</form>
           
</div>
</body>
</html>