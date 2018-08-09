<?php 
include ("connection.php");
    $id = $_POST['yogesh'];
    $subCategoryName = "";
    $subCategoryDescription = "";
    $categoryId = "";
    $categoryName = "";

    $subCategoryStr ="SELECT * FROM sub_category_t WHERE sub_category_id =".$id;
    $query1 = mysqli_query($con, $subCategoryStr);
    while($result = mysqli_fetch_array($query1)) {
        $subCategoryName = $result['NAME'];
        $subCategoryDescription = $result['DESCRIPTION'];
        $categoryId = $result['CATEGORY_ID'];
    }
    echo "<script>$('#Description').text('".$subCategoryDescription."');</script>";
    
    $sql = "SELECT *  FROM category_t where CATEGORY_ID =".$categoryId;
    $category_detail = mysqli_query($con, $sql);
    while ($result = mysqli_fetch_array($category_detail)) {
        $categoryName = $result['CATEGORY_NAME'];
    }
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Update sub category</h4>
            </div>
            <div class="panel-body">
                <form  id="updateSubCategorFormId">
                    <input type="hidden" name="subCategoryId" value="<?php echo $id;?>"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="CategoryName">CategoryName:</label>
                                <select class="form-control category" name="categoryId" id="categoryid">
                                    <option value="<?php echo $categoryId;?>"><?php echo $categoryName;?></option>
                                    <?php 
                                            $categorySql = "SELECT * from category_t";
                                            $query = mysqli_query($con, $categorySql);
                                            while($row = mysqli_fetch_array($query)){
                                                echo "<option value=".$row["CATEGORY_ID"].">".$row["CATEGORY_NAME"]."</option>";
                                            
                                            }      
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="SubcategoryName">Sub Category Name:</label>
                                <input type="text" class="form-control" name="SubCategoryName" id =subcatId value="<?php echo $subCategoryName;?>">  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Description">Description:</label>
                                <textarea class="form-control" rows="10" id="Description" name="Description" value="<?php echo $subCategoryDescription;?>"></textarea>
                            </div>
                            <div >
                                
                                <button type="button" class="btn btn-success btn-lg" id="updatelink" name="updatebtn">Update</button>
                                <button type="button" class="btn btn-danger btn-lg" id="canclelink" name="cancelbtn">Cancel</button>
                                <!-- <a href="subCategoryView.php" class="btn btn-danger btn-lg ">Cancel</a> -->
                            </div>
                        </div>
                    </div> 
                </form>      
            </div>
        </div>
    </div>
</div>
    
