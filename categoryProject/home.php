<?php include("header.php"); ?>
<?php
    $sql = "SELECT *  FROM category_t ORDER BY CATEGORY_ID ASC";
    $category_detail = mysqli_query($con, $sql); 
?>
<form action="home.php" method ="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control" id="category">
                    <option selected="selected" disabled="disabled" hidden="hidden" >Category</option>                        
                    <?php  while($row = mysqli_fetch_array($category_detail)){ ?>
                        <option value="<?= $row['CATEGORY_ID'] ?>" title="<?= $row['DESCRIPTION'] ?>"> <?= $row['CATEGORY_NAME'] ?> </option>
                    <?php }  ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control" id="sub_category"  name="sub_category">
                    <option selected="selected" disabled="disabled" >Choose Sub Category</option>
                    <?php  while($row = mysqli_fetch_array($Sub_category_detail)){ ?>
                        <option value="<?= $row['CATEGORY_ID'] ?>" title="<?=$row['DESCRIPTION'] ?>"> <?= $row['NAME'] ?> </option>
                    <?php }  ?>
                </select>   
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="Description">Description:</label>
                <textarea class="form-control" rows="5" id="description"></textarea>
            </div>
        </div>
    </div>
</form>      

<script>
    $(document).ready(function(){
        $("#category").on("change",function(){
            var CATEGORY_ID = $(this).val();
            // alert(CATEGORY_ID);
            $.ajax({
                url:  "homePageAjaxCall.php",
                type:"POST",
                data: {'id':CATEGORY_ID},
                beforeSend:function(){},
                success:function(data) {
                    // alert(data);
                    $('#sub_category').html(data);

                var desc = $("#category OPTION:SELECTED").attr("title");
                $("#description").val(desc);


                }
            });
        });

        /* get sub category discription */
         $("#sub_category").on("change",function(){
            var sub_category_id = $(this).val();
            // alert(sub_category_id);
            $.ajax({
                url: "homePageAjaxCall.php",
                type:"POST",
                data: {'sub_cat_id':sub_category_id},
                beforeSend:function(){},
                success:function(data) {
                    $("#description").val("");
                    $("#description").val(data);
                }
            });
        });

    });
</script>

<?php include("footer.php"); ?> 