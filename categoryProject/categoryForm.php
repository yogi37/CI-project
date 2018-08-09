<?php include("header.php"); ?>
<form method="post">
	<div class ="container">
		<div class ="page header">
			<center><strong><h1>SubCategory Form</h1></strong></center>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" for="CATEGORY_NAME">CATEGORY_NAME:</label>
					<input type="NAME" class="form-control" name="CATEGORY_NAME" id="CATEGORY_NAME">
     			</div>
     		</div>
    		<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" for="CREATED_DATE">CREATED_DATE:</label>
					<input type="DATE" class="form-control" name="CREATED_DATE" id="CREATED_DATE">
 				</div>
 			</div>
 		</div>
		<div class="container" role="main">
			<button type="submit" class="btn btn-success btn-lg" name="AddButton">Add category</button>
			<button type="reset" class="btn btn-danger btn-lg">Cancel</button>
		</div>
	</div>
</form>
<?php
	if(isset($_POST['AddButton']))
	{ 
		$CATEGORY_NAME=$_POST['CATEGORY_NAME'];
		$CREATED_DATE=$_POST['CREATED_DATE'];
		$con = mysqli_connect("localhost","root","","demo");
		$query ="INSERT INTO category_t (CATEGORY_NAME, CREATED_DATE) VALUES ('".$CATEGORY_NAME."','".$CREATED_DATE."')";
		$data = mysqli_query($con,$query);

		if($data) {
			echo '<script>alert("Data saved");</script>';
			header("Location:categoryTable.php");
		}else{
			echo '<script>alert("Not saved");</script>';
		}
	}
?>

<?php include("footer.php"); ?>
