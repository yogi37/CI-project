<?php
  include("header.php");
  if(isset($_GET['status'])){ 
    if($_GET['status']) { ?>
      <div class="alert alert-success">
        <strong>Success!</strong> Record deleted successfully.
      </div>
     <?php }else{ ?>
      <div class="alert alert-danger">
        <strong>Error!</strong> Not Deleted Record.
      </div>
    <?php } 
     } ?>

<div class ="container" id="updateSubCategoryAjax">
	<center><h1>Subcategory Table</h1></center>
				<table id="subCategoryTable" class="table table-bordered">
		<thead>
			<tr>
				<th> <center>SUB_CATEGORY_ID</center> </th>
					<th> <center>NAME</center> </th>
					<th> <center>CREATED_ID</center> </th>
					<th><center>CATEGORY_DATE</center></th>
					<th><center>Action</center></th>
			</tr>
   		</thead>
    	<tbody>
		<?php
			include('connection.php');
				$sql = "SELECT * FROM sub_category_t ORDER BY SUB_CATEGORY_ID ASC";
				$query = mysqli_query($con, $sql);
				while($row = mysqli_fetch_row($query)){ ?>
				<tr>
					<td><?= $row[0] ?></td>
					<td><?= $row[1] ?></td>
					<td><?= $row[2] ?></td>
					<td><?= $row[3] ?></td>
					<td>
						<button type="submit" class="btn btn-success btn-xs editSubCateogoryButton" value="<?= $row[0] ?>" name="editButton">Edit</button>
        				<a href="/categoryProject/deleteSubCategory.php?id=<?= $row[0] ?>" class="btn btn-danger btn-xs" name="dltbtn">Delete</a>
						 
     					
     				</td>
				</tr>
		<?php		}
		?>
       	</tbody>
    </table>
</div>
<?php include("footer.php")?> 


<script type="text/javascript">
		
		$(function(){
			updateSubCategory();
      initializeUpdateSubCategoryFormSubmit();
      cancelUpdateForm();
     
		});


		function  updateSubCategory() {

			$(".editSubCateogoryButton").on('click', function(){
          
                var subCategoryId =  $(this).val();
                   
                $.ajax({
                	type:"POST",
                	url:'updateSubCategoryForm.php',
                	data:{"yogesh":subCategoryId},
                	success:function(html){
                		$("#updateSubCategoryAjax").html(html);
                    initializeUpdateSubCategoryFormSubmit();
                    cancelUpdateForm();
                	}
                });
        	});
        }

    function initializeUpdateSubCategoryFormSubmit() {
      $('#updatelink').on('click', function() {
        //Serialize the Form
        var values = {};
        $.each($("#updateSubCategorFormId").serializeArray(), function (i, field) {
            values[field.name] = field.value;
        });

        //Value Retrieval Function
        var getValue = function (valueName) {
            return values[valueName];
        };
        //Retrieve the Values
        var subCategoryId = getValue("subCategoryId");
        var des = getValue("Description");
        var categoryId = getValue("categoryId");
        var SubCategoryName = getValue("SubCategoryName");
        $.ajax({
          url: "updateSubCategoryAjaxCall.php",
          type: "POST",
          data:{'subCategoryIdAjaxCall':subCategoryId,'desAjaxCall':des,'categoryIdAjaxCall':categoryId,'SubCategoryNameAjaxCall':SubCategoryName},
          success:function(res){
            $("#updateSubCategoryAjax").html(res);
            updateSubCategory();
          }
        });
        return false;
      });

    }
    function cancelUpdateForm(){
      $('#canclelink').on('click', function(){
        alert("Are you sure");
        $.ajax({
          url: "updateSubCategoryAjaxCall.php",
          type: "POST",
          data:{"cancleButtonClick" :"true"},
          success:function(res){
            console.log(res);
            $("#updateSubCategoryAjax").html(res);
            updateSubCategory();

          }
        });
      });
    }
</script>

