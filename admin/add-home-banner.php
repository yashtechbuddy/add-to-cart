<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
	//Add
	if(isset($_POST['submit']) and isset($_GET['add'])){
	       if (isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] === 0) {
          

            $image_name = "banner_image_" . $_FILES['banner_image']['name'];
            $image_tmp = $_FILES['banner_image']['tmp_name'];
            move_uploaded_file($image_tmp, "images/banner/" . $image_name);
            
             $data = array( 
			'small_title'  =>  $_POST['small_title'],
			'title'  =>  $_POST['title'],
			'short_desc'  =>  $_POST['short_desc'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'banner_desc'  =>  $_POST['banner_desc'],
			'banner_image'  =>  $image_name,
			'btn_name'  =>  $_POST['btn_name'],
			'btn_link'  =>  $_POST['btn_link']
			);
			
            $qry = Insert(' tbl_banner ',$data);
            
            echo "<script type='text/javascript'>";
            echo "alert('Inserted Successfully');";
            echo "window.location.href='manage-banner.php'";
            echo "</script>";
            
        }else{
            
             $data = array( 
			'small_title'  =>  $_POST['small_title'],
			'title'  =>  $_POST['title'],
			'short_desc'  =>  $_POST['short_desc'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'banner_desc'  =>  $_POST['banner_desc'],
			'btn_name'  =>  $_POST['btn_name'],
			'btn_link'  =>  $_POST['btn_link']
			);

 		$qry = Insert(' tbl_banner ',$data);	

 	   
		echo "<script type='text/javascript'>";
		echo "alert('Inserted Successfully');";
		echo "window.location.href='manage-banner.php'";
		echo "</script>";	
        }
        


		 
		
	}
	
	//Fetch selected service detail
	if(isset($_GET['edit_id']))
	{			 
		$qry="SELECT * FROM  tbl_banner where id='".$_GET['edit_id']."'";
		$result=mysqli_query($conn,$qry);
		$row=mysqli_fetch_assoc($result);

	}
	
	//Edit
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{

	
		  if (isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] === 0) {
            $select_image_query = "SELECT banner_image FROM tbl_banner WHERE id = 1";
            $result = mysqli_query($conn, $select_image_query);
            $row = mysqli_fetch_assoc($result);
            $existing_image = $row['banner_image'];
            if ($existing_image) {
                unlink("images/banner/" . $existing_image);
            }

            $image_name = "banner_image_" . $_FILES['banner_image']['name'];
            $image_tmp = $_FILES['banner_image']['tmp_name'];
            move_uploaded_file($image_tmp, "images/banner/" . $image_name);
            
             $data = array( 
			'small_title'  =>  $_POST['small_title'],
			'title'  =>  $_POST['title'],
			'short_desc'  =>  $_POST['short_desc'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'banner_desc'  =>  $_POST['banner_desc'],
			'banner_image'  =>  $image_name,
			'btn_name'  =>  $_POST['btn_name'],
			'btn_link'  =>  $_POST['btn_link']
			);
			 
	
	}else{
	    
	     $data = array( 
			'small_title'  =>  $_POST['small_title'],
			'title'  =>  $_POST['title'],
			'short_desc'  =>  $_POST['short_desc'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'banner_desc'  =>  $_POST['banner_desc'],
			'btn_name'  =>  $_POST['btn_name'],
			'btn_link'  =>  $_POST['btn_link']
			);
	    
	}

	
	$updated = Update('tbl_banner', $data, "WHERE id='".$_POST['edit_id']."'");
            
            echo "<script type='text/javascript'>";
            echo "alert('Updated Successfully');";
            echo "window.location.href='manage-banner.php'";
            echo "</script>";
	}
?>

<?php
include 'includes/side-bar.php'
?>



<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> Home Banner</h4>
                    </div>
                   
                    <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
						<input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>" />				
	
			
						<div class="form-group row mb-3">
                          <label class="col-sm-3 col-form-label">Small Title :-</label>
                            <div class="col-sm-9">
                             <input type="text" name="small_title" value="<?php echo $row['small_title'];?>" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                          <label class="col-sm-3 col-form-label">Title :-</label>
                            <div class="col-sm-9">
                             <input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control" required>
                            </div>
                        </div>
                        
                         <div class="form-group row mb-3">
                          <label class="col-sm-3 col-form-label">Short_desc :-</label>
                            <div class="col-sm-9">
                             <input type="text" name="short_desc" value="<?php echo $row['short_desc'];?>" class="form-control" required>
                            </div>
                        </div>
                        
                         <div class="form-group row mb-3">
                             <label for="image_b2" class="col-sm-3 col-form-label">Image :-</label>
                                <div class="col-sm-9">
                                     <div class="fileupload_block">
                                         <input type="file" name="banner_image" id="fileupload">
                                                <img style="object-fit:cover;" height="70" width="100" src="images/banner/<?php echo $row['banner_image']; ?>" alt="banner Image" />
                                                <input type="text" name="alt_tag" id="alt_tag" placeholder="Enter image Alternate text" title="Enter Alternate text here !" value="<?php echo $rows['alt_tag']; ?>" class="form-control" />
                                     </div>
                                </div>
                        </div>
                        
                         <div class="form-group row mb-3">
                          <label class="col-sm-3 col-form-label">Button Name :-</label>
                            <div class="col-sm-9">
                             <input type="text" name="btn_name" value="<?php echo $row['btn_name'];?>" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                          <label class="col-sm-3 col-form-label">Button Link :-</label>
                            <div class="col-sm-9">
                             <input type="text" name="btn_link" value="<?php echo $row['btn_link'];?>" class="form-control" required>
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