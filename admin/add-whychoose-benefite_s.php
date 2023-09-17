<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
	//Add
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
         $data = array( 
			'benefite'  =>  $_POST['benefite']
			);

 		$qry = Insert('tbl_supplier_whychooseb',$data);	

 	   
		echo "<script type='text/javascript'>";
		echo "alert('Inserted Successfully');";
		echo "window.location.href='supplier-whychoose.php'";
		echo "</script>";	

		 
		
	}
	
	//Fetch selected service detail
	if(isset($_GET['edit_id']))
	{			 
		$qry="SELECT * FROM tbl_supplier_whychooseb where id='".$_GET['edit_id']."'";
		$result=mysqli_query($conn,$qry);
		$row=mysqli_fetch_assoc($result);

	}
	
	//Edit
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{

	
		 
		   $data = array( 
			'benefite'  =>  $_POST['benefite']
			);
				 $category_edit=Update('tbl_supplier_whychooseb', $data, "WHERE id = '".$_POST['edit_id']."'");
		 
		     
		echo "<script type='text/javascript'>";
		echo "alert('Updated Successfully');";
		echo "window.location.href='supplier_whychoose.php'";
		echo "</script>";
	}
?>


<?php 
include 'includes/side-bar.php';
include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Why choose benefite</h4>
                    </div>
                    <!-- start form New Category -->
                    <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
						<input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>" />				
	
			
						<div class="form-group row mb-3">
                          <label class="col-sm-3 col-form-label">Name :-</label>
                            <div class="col-sm-9">
                             <input type="text" name="benefite" value="<?php echo $row['benefite'];?>" class="form-control" required>
                            </div>
                        </div>
				         <div class="form-group row mb-3">
                            <div class="col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                             </div>
                        </div>
                    </form>
                                  
                    <!-- end of form  -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>