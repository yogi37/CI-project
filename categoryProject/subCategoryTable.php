<?php include("header.php")?>
<?php
  if(isset($_GET['categoryId'])){
  	$cateId = $_GET['categoryId'];
	$sql = "SELECT * FROM sub_category_t WHERE CATEGORY_ID =".$cateId;
	$query = mysqli_query($con,$sql);   ?>
  	<table class="table table-condensed table-striped">
  		<thead>
  			<tr>
  				<th># Sr.</th>
  				<th>Sub Category</th>
  				<th>Category id</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  				if(mysqli_num_rows($query)){ 
	  				while($row = mysqli_fetch_array($query)){ ?>
			  			<tr>
			  				<td><?= $row[0] ?> </td>
			  				<td><?= $row[1] ?> </td>
			  				<td><?= $row[2] ?> </td>
			  				
			  			</tr>
	  		<?php   } 
	  			}else{ ?>
	  				<tr>
	  					<th colspan="3" class="text-center text-danger"> Could't found data in database.</th>
	  				</tr>
	  		<?php	}

	  		?>
  		</tbody>
  	</table> 

<?php 
	}else {
		echo "Please Pass the category Id";
	}
	include("footer.php")
?>