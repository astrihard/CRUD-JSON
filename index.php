<?php
$getfile = file_get_contents('produk.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html>
<title>Technology Products</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

.button {
  border: none;
  border-radius: 8px;
  color: white;
  width:80px;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: #4CAF50;
  color: white;
}

.button1:hover {
  
  background-color: white; 
  color: black; 
}

.button2 {
  background-color: #008CBA;
  color: white;
}

.button2:hover {
  
  background-color: white; 
  color: black; 
}

.button3 {
  background-color: #f44336;
  color: white;
}

.button3:hover {
  
  background-color: white; 
  color: black; 
}

</style>
</head>
<body>
<div class="header">
<h2>Our Products</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for id..">

</div>


<table id="myTable">
  <tr class="header">
	<th>No.</th>
	<th>ID</th>
    <th>Product</th>
    <th>Type</th>
    <!--<th>Detail</th>-->
    <!--<th>Other</th>-->
	<th>Option</th>
  </tr>
  		
			<?php $no=0;foreach ($jsonfile->records as $index => $obj): $no++;  ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $obj->ID_Produk; ?></td>
				<td><?php echo $obj->Produk; ?></td>
				<td><?php echo $obj->Tipe; ?></td>
				
				
				<td>
					<a class="button button2" href="view.php?id=<?php echo $index; ?>">View</a>
					<a class="button button1" href="edit.php?id=<?php echo $index; ?>">Edit</a>
					<a class="button button3" onclick="return confirm('Are you sure to delete?')" href="hapus.php?id=<?php echo $index; ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

// function myDelete() {
  // var result = confirm("Are you sure to delete?");
    // if(result){
        // // Delete logic goes here
    // }
// }
</script>

</body>
</html>