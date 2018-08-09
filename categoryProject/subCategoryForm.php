<?php include("header.php");?>
<?php
    if(isset($_GET['categoryId'])){ 
        $id = $_GET['categoryId']; 
?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#categoryId").val("<?= $id ?>").trigger("change");
            });
        </script>
    <?php }

$sql = "SELECT *  FROM category_t ORDER BY CATEGORY_ID ASC";
    $category_detail = mysqli_query($con, $sql); 

    if(isset($_POST['id'])){
      $id = $_POST['id'];
        $sql ="SELECT  NAME ,SUB_CATEGORY_ID FROM sub_category_t  WHERE CATEGORY_ID = ".$id ;    
        $Sub_category_detail = mysqli_query($con, $sql);
        
        echo '<option selected="selected" disabled="disabled" >Choose Sub Category</option>';
        while($r=mysqli_fetch_assoc($Sub_category_detail))  { 
            echo "<option value=".$r['SUB_CATEGORY_ID'].">".$r['NAME']."</option>";
        }
        return true;
    }


    if(isset($_POST['sub_cat_id'])){
        $id = $_POST['sub_cat_id'];
        $sql ="SELECT NAME FROM sub_category_t  WHERE SUB_CATEGORY_ID = ".$id ;    
        $Sub_category_detail = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($Sub_category_detail);
        echo $row['NAME'];
        return true;
    }
?>

    
    	<form method="POST" action="subCategoryForm.php">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="CategoryName">CategoryName:</label>
                    <select class="form-control category" name="categoryId" id="categoryId">
                        <?php  while($row = mysqli_fetch_array($category_detail)){ ?>
                            <option value="<?= $row['CATEGORY_ID'] ?>"> <?= $row['CATEGORY_NAME'] ?></option>
                        <?php }  ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="SubcategoryName">SubcategoryName:</label>
                	<input type="text" class="form-control" name="SubCategoryName">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea class="form-control" rows="10" name="DESCRIPTION" id="description"></textarea>
                </div>
            </div>
        </div>
        <div class="container" role="main">
	    	<button type="submit" class="btn btn-success btn-lg" name="AddButton">Add</button>
        	<button type="reset" class="btn btn-danger btn-lg">Cancel</button>
    	</div>
    </form>      
   
    <script>
        $(document).ready(function(){
            $(".category").on("change",function(){
                var CATEGORY_ID = $(this).val();
                $.ajax({
                    url: "homePageAjaxCall.php",
                    type:"POST",
                    data: {'id':CATEGORY_ID},
                    beforeSend:function(),
                    success:function(data) {
                        $('select[name="sub_category"]').empty();
                        $('#sub_category').html(data);
                    }
                });
            });
        });

    </script>
    <?php
	if(isset($_POST['AddButton']))
	{   
		$NAME=$_POST['SubCategoryName'];
		$DESCRIPTION=$_POST['DESCRIPTION'];
		$CATEGORY_ID=$_POST['categoryId'];
		$con = mysqli_connect("localhost","root","","demo");
		$query ="INSERT INTO sub_category_t (CATEGORY_ID, CREATED_DATE, NAME, DESCRIPTION) VALUES ('".$CATEGORY_ID."',CURRENT_TIMESTAMP,'".$NAME."','".$DESCRIPTION."')";
		$data = mysqli_query($con,$query);
       	if($data) {
			// echo '<script>alert("Data saved");</script>';
			header("Location:subCategoryTable.php");
		// }else{
			// echo '<script>alert("Not saved");</script>';
		}
	}
?>
<?php include("footer.php");?>
	