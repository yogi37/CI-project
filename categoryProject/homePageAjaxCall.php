<?php
	include('connection.php');
	if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql ="SELECT  NAME, SUB_CATEGORY_ID FROM sub_category_t  WHERE CATEGORY_ID =".$id;    
        $Sub_category_detail = mysqli_query($con, $sql);
        
        echo '<option selected="selected" disabled="disabled" >Choose Sub Category</option>';
        while($r=mysqli_fetch_array($Sub_category_detail))  { 
            echo "<option value=".$r['SUB_CATEGORY_ID'].">".$r['NAME']."</option>";
        }
        // die();
    }


    if(isset($_POST['sub_cat_id'])){
        $id = $_POST['sub_cat_id'];
        $sql ="SELECT DESCRIPTION FROM sub_category_t  WHERE SUB_CATEGORY_ID = ".$id ;    
        $Sub_category_detail = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($Sub_category_detail);
        echo $row['DESCRIPTION'];
        return true;
    }

?>