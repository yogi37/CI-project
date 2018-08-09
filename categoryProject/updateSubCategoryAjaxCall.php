<?php
   if(isset($_POST['subCategoryIdAjaxCall'])) {
     $subid = $_POST['subCategoryIdAjaxCall'];
   		
   		$des = $_POST['desAjaxCall'];
   		
   		$catId = $_POST['categoryIdAjaxCall'];
   		$subName = $_POST['SubCategoryNameAjaxCall'];
   		
   		$updateQuery = "UPDATE sub_category_t SET CATEGORY_ID = ".$catId.", NAME = '".$subName."'  WHERE SUB_CATEGORY_ID = ".$subid." ";

         include("connection.php");
   		$update1 = mysqli_query($con, $updateQuery);
         
	    if($update1) {
	    	echo '<center><h1>Subcategory Table</h1></center>
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
            <tbody>';
           $sql = "SELECT * FROM sub_category_t ORDER BY SUB_CATEGORY_ID ASC";
            $query = mysqli_query($con, $sql);
            while($row = mysqli_fetch_row($query)){ 
               echo '<tr><td>'.$row[0].'</td>
               <td>'.$row[1].'</td>
               <td>'.$row[2].'</td>
               <td>'.$row[3].'</td>
               <td>
                  <button type="submit" class="btn btn-success btn-lg editSubCateogoryButton" value="'.$row[0].'" name="editButton">Edit</button>
                  <button type="delete" class="btn btn-danger btn-lg" value="'.$row[0].'" name="dltbtn">Delete</button>
                   
                  
               </td>
            </tr>';
        }
         echo '</tbody></table>';
	    }else {
	    	echo "not done";
	    } 
   }else if(isset($_POST['cancleButtonClick'])) {
      include('connection.php');
      echo '<center><h1>Subcategory Table</h1></center>
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
            <tbody>';
           $sql = "SELECT * FROM sub_category_t ORDER BY SUB_CATEGORY_ID ASC";
            $query = mysqli_query($con, $sql);
            while($row = mysqli_fetch_row($query)){ 
               echo '<tr><td>'.$row[0].'</td>
               <td>'.$row[1].'</td>
               <td>'.$row[2].'</td>
               <td>'.$row[3].'</td>
               <td>
                  <button type="submit" class="btn btn-success btn-lg editSubCateogoryButton" value="'.$row[0].'" name="editButton">Edit</button>
                  <button type="delete" class="btn btn-danger btn-lg" value="'.$row[0].'" name="dltbtn">Delete</button>
                   
                  
               </td>
            </tr>';
        }
         echo '</tbody></table>';
   }

?>