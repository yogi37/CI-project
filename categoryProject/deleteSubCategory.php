<?php include("header.php");
	if($con)
	 	echo "connected <br/>";
  if(isset($_GET['id'])){
    $delId = $_GET['id'];
     $dltquery = "DELETE FROM sub_category_t WHERE SUB_CATEGORY_ID = ".$delId;
     echo $dltquery;
     $dlt1 =mysqli_query($con, $dltquery);
       
        if($dlt1) {
            header("Location:/categoryProject/subCategoryView.php?status=1");
        }else {
            header("Location:/categoryProject/subCategoryView.php?status=0");
        } 
  }
?>
<?php include("footer.php")?>