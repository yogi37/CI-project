<?php include("header.php")?>
<div class ="container">
	<center><h1>CategoryTable</h1></center>
	<table id="CategoryTable" class="table table-bordered">
		<thead>
			<tr>
				<th> <center>CATEGORY_ID</center> </th>
				<th> <center>CATEGORY_NAME</center> </th>
				<th> <center>CREATED_DATE</center> </th>
				<th><center>Action</center></th>
			</tr>
   		</thead>
    	<tbody>
			<?php
				include('connection.php');
					$sql = "SELECT * FROM category_t ORDER BY CATEGORY_ID ASC";
					$query = mysqli_query($con, $sql);
					while($row = mysqli_fetch_row($query)){ ?>
					<tr>
						<td><?= $row[0] ?></td>
						<td><?= $row[1] ?></td>
						<td><?= $row[2] ?></td>
						<td>
	     					<a href="subCategoryTable.php?categoryId=<?= $row[0] ?>" class="btn btn-info Viewbtn">View subCategory</a>
		     			<a href="subCategoryForm.php?categoryId=<?= $row[0] ?>" class="btn btn-info Viewbtn">Add subCategory</a>
		  	    		</td>
						</tr>;
			<?php		}
			?>
       	</tbody>
    </table>
</div>
<?php include("footer.php")?> 