<?php
include 'includes/header.php';
?>
<?php
	 
	$qry="SELECT * FROM tbl_settings where id=1";
	$result=mysqli_query($mysqli,$qry);
	$settings_row=mysqli_fetch_assoc($result);
	
	if(isset($_POST['submit']))
	{

		$img_res=mysqli_query($mysqli,"SELECT * FROM tbl_settings WHERE id=1");
		$rows = mysqli_num_rows($img_res);
		if($rows>=1)
		{
								

			$img_res=mysqli_query($mysqli,"SELECT * FROM tbl_settings WHERE id=1");
			$img_row=mysqli_fetch_assoc($img_res);
			

			if($_FILES['app_logo']['name']!="" && $_FILES['app_icon']['name']=="")
			{				
						
				//REMOVE EXISTING IMAGE FROM PATH		
				$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_settings WHERE id=1');
				$cat_res_row=mysqli_fetch_assoc($cat_res);
				
				if($cat_res_row['app_logo']!="")
				{
					unlink('images/logo/'.$cat_res_row['app_logo']);

				}
		 
				
				$app_logo="Logo-".rand(0,99999)."_".$_FILES['app_logo']['name'];
				$tpath1='images/logo/'.$app_logo; 			 
				move_uploaded_file($_FILES["app_logo"]["tmp_name"], $tpath1);
					
					
				
				$data = array(
					'app_name'  =>  $_POST['app_name'],
					'app_logo'  =>  $app_logo, 
					'bg_image_alt_tag'  =>  $_POST['bg_image_alt_tag'], 
					'theme_color'  =>  $_POST['theme_color'],
					'client_theme_color'  =>  $_POST['client_theme_color'],
					'app_description'  => addslashes($_POST['app_description']),
					'app_version'  =>  $_POST['app_version'],
					'app_author'  =>  $_POST['app_author'],
					'app_contact'  =>  $_POST['app_contact'],
					'app_email'  =>  $_POST['app_email'],   
					'app_website'  =>  $_POST['app_website'],
					'app_developed_by'  =>  $_POST['app_developed_by'],
					'mail_from'  =>  $_POST['mail_from'],
					'client_msg'  =>  $_POST['client_msg'],
				);			

			}
		
			elseif($_FILES['app_icon']['name']!="" && $_FILES['app_logo']['name']=="")
			{
						
				//REMOVE EXISTING IMAGE FROM PATH		
				$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_settings WHERE id=1');
				$cat_res_row=mysqli_fetch_assoc($cat_res);
				
				if($cat_res_row['app_icon']!="")
				{
					unlink('images/logo/'.$cat_res_row['app_icon']);

				}
		 
		 
				$app_icon="Favicon-".rand(0,99999)."_".$_FILES['app_icon']['name'];
				$tpath1='images/logo/'.$app_icon; 			 
				move_uploaded_file($_FILES["app_icon"]["tmp_name"], $tpath1);
					

				$data = array(
					'app_name'  =>  $_POST['app_name'],
					'app_icon'  =>  $app_icon,  
					'bg_image_alt_tag'  =>  $_POST['bg_image_alt_tag'],
					'theme_color'  =>  $_POST['theme_color'],
					'client_theme_color'  =>  $_POST['client_theme_color'],
					'app_description'  => addslashes($_POST['app_description']),
					'app_version'  =>  $_POST['app_version'],
					'app_author'  =>  $_POST['app_author'],
					'app_contact'  =>  $_POST['app_contact'],
					'app_email'  =>  $_POST['app_email'],   
					'app_website'  =>  $_POST['app_website'],
					'app_developed_by'  =>  $_POST['app_developed_by'],
					'mail_from'  =>  $_POST['mail_from'],
					'client_msg'  =>  $_POST['client_msg'],					
				);			
			}
		
			elseif($_FILES['loader_bg_image']['name']!="" && $_FILES['app_logo']['name']!="" && $_FILES['app_icon']['name']!="")
			{
						
				//REMOVE EXISTING IMAGE FROM PATH		
				$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_settings WHERE id=1');
				$cat_res_row=mysqli_fetch_assoc($cat_res);
				
				if($cat_res_row['app_logo']!="")
				{
					unlink('images/logo/'.$cat_res_row['app_logo']);

				}
				if($cat_res_row['app_icon']!="")
				{
					unlink('images/logo/'.$cat_res_row['app_icon']);

				}
				if($cat_res_row['loader_bg_image']!="")
				{
					unlink('images/logo/'.$cat_res_row['loader_bg_image']);

				}
		 
				$app_logo="Logo-".rand(0,99999)."_".$_FILES['app_logo']['name'];
				$tpath1='images/logo/'.$app_logo; 			 
				move_uploaded_file($_FILES["app_logo"]["tmp_name"], $tpath1);
				
				$loader_bg_image="Loader_BG-".rand(0,99999)."_".$_FILES['loader_bg_image']['name'];
				$tpath1='images/logo/'.$loader_bg_image; 			 
				move_uploaded_file($_FILES["loader_bg_image"]["tmp_name"], $tpath1);
				
				$app_icon="Favicon-".rand(0,99999)."_".$_FILES['app_icon']['name'];
				$tpath1='images/logo/'.$app_icon; 			 
				move_uploaded_file($_FILES["app_icon"]["tmp_name"], $tpath1);
					

				$data = array(
					'app_name'  =>  $_POST['app_name'],
					'app_logo'  =>  $app_logo,  
					'loader_bg_image'  =>  $loader_bg_image,  
					'bg_image_alt_tag'  =>  $_POST['bg_image_alt_tag'],
					'app_icon'  =>  $app_icon,  
					'theme_color'  =>  $_POST['theme_color'],
					'client_theme_color'  =>  $_POST['client_theme_color'],
					'app_description'  => addslashes($_POST['app_description']),
					'app_version'  =>  $_POST['app_version'],
					'app_author'  =>  $_POST['app_author'],
					'app_contact'  =>  $_POST['app_contact'],
					'app_email'  =>  $_POST['app_email'],   
					'app_website'  =>  $_POST['app_website'],
					'app_developed_by'  =>  $_POST['app_developed_by'],
					'mail_from'  =>  $_POST['mail_from'],
					'client_msg'  =>  $_POST['client_msg'],					

				);			
			}
		

			elseif($_FILES['loader_bg_image']['name']!="")
			{
						
				//REMOVE EXISTING IMAGE FROM PATH		
				$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_settings WHERE id=1');
				$cat_res_row=mysqli_fetch_assoc($cat_res);
				
				if($cat_res_row['loader_bg_image']!="")
				{
					unlink('images/logo/'.$cat_res_row['loader_bg_image']);

				}
				
				$loader_bg_image="Loader_BG-".rand(0,99999)."_".$_FILES['loader_bg_image']['name'];
				$tpath1='images/logo/'.$loader_bg_image; 			 
				move_uploaded_file($_FILES["loader_bg_image"]["tmp_name"], $tpath1);
				

				$data = array(
					'app_name'  =>  $_POST['app_name'],
					'loader_bg_image'  =>  $loader_bg_image, 
					'bg_image_alt_tag'  =>  $_POST['bg_image_alt_tag'], 
					'theme_color'  =>  $_POST['theme_color'],
					'client_theme_color'  =>  $_POST['client_theme_color'],
					'app_description'  => addslashes($_POST['app_description']),
					'app_version'  =>  $_POST['app_version'],
					'app_author'  =>  $_POST['app_author'],
					'app_contact'  =>  $_POST['app_contact'],
					'app_email'  =>  $_POST['app_email'],   
					'app_website'  =>  $_POST['app_website'],
					'app_developed_by'  =>  $_POST['app_developed_by'],  'mail_from'  =>  $_POST['mail_from'],
					'client_msg'  =>  $_POST['client_msg'],	            

				);			
			}
		
			else
			{
				
				$data = array(
					'app_name'  =>  $_POST['app_name'], 
					'bg_image_alt_tag'  =>  $_POST['bg_image_alt_tag'],
					'theme_color'  =>  $_POST['theme_color'],
					'client_theme_color'  =>  $_POST['client_theme_color'],
					'app_description'  => addslashes($_POST['app_description']),
					'app_version'  =>  $_POST['app_version'],
					'app_author'  =>  $_POST['app_author'],
					'app_contact'  =>  $_POST['app_contact'],
					'app_email'  =>  $_POST['app_email'],   
					'app_website'  =>  $_POST['app_website'],
					'app_developed_by'  =>  $_POST['app_developed_by'],  'mail_from'  =>  $_POST['mail_from'],
					'client_msg'  =>  $_POST['client_msg'],	            

				);			
			}
		


			$settings_edit=Update('tbl_settings', $data, "WHERE id=1");
		  
			$_SESSION['msg']="11";
			header( "Location:settings.php");
			exit;
        }      
   
 
	}

?>
<!--add-employees -->
<!-- include 'includes/side-bar.php';-->
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
?>

<?php 
include 'includes/side-bar.php';
?>
<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30 p-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Contact Us</h4>
                    </div>
                    
                    <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
								
									<div class="form-group row">
                                        <label for="inputusername" class="col-sm-3 col-form-label">Website Name :-  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="app_name" id="app_name" value="<?php echo $settings_row['app_name'];?>" >
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">Website Logo  :- </label>
                                        <div class="col-sm-9">
											<div class="fileupload_block" >
                                             <input type="file" name="app_logo" id="fileupload" >
											<img type="image" height="70" width="auto" style="object-fit:cover;" src="images/logo/<?php echo $settings_row['app_logo'];?>" alt="About Us image" />
										</div>
										</div>
                                    </div>
									
									 <!--div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Website Main Color :-</label>
                                        <div class="col-sm-9">
                                          <input style="height: 50px;" type="color" name="client_theme_color" id="client_theme_color" value="<?php echo $settings_row['client_theme_color'];?>" class="form-control">
                                        </div>
                                     </div>
                                    
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Website icon Color :-</label>
                                        <div class="col-sm-9">
                                          <input style="height: 50px;" type="color" name="theme_color" id="theme_color" value="<?php echo $settings_row['theme_color'];?>" class="form-control">
                                        </div>
                                     </div-->
                                     
                                    <div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">Website Favicon Icon  :- </label>
                                        <div class="col-sm-9">
										<div class="fileupload_block">
                                             <input type="file" name="app_icon" id="fileupload" >
											<img type="image" height="50" width="auto" style="object-fit:cover;" src="images/logo/<?php echo $settings_row['app_icon'];?>" alt="About Us image" />
											</div>
										</div>
                                    </div>
                                    
                                   <!--div class="form-group row">
                                        <label for="inputimage" class="col-sm-3 col-form-label">Loader background Image  :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                             <input type="file" name="loader_bg_image" id="fileupload" >
											<img type="image" height="70" width="auto" style="object-fit:cover;" src="images/logo/<?php echo $settings_row['loader_bg_image'];?>" alt="Loader image" />
										</div>
										</div>
                                    </div-->
									 <!--div class="form-group row">
                                        <label for="app_description" class="col-sm-3 col-form-label">Website Description :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="form-control" id="tinymce-example" name="app_description"><?php echo stripslashes($settings_row['app_description']);?></textarea>
											</div>
                                        </div>
                                    </div-->
									<div class="form-group row">
                                        <label for="app_version" class="col-sm-3 col-form-label">Website Version :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="app_version" id="app_version" value="<?php echo $settings_row['app_version'];?>" >
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="app_author" class="col-sm-3 col-form-label">Author :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="app_author" id="app_author" value="<?php echo $settings_row['app_author'];?>" >
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="app_contact" class="col-sm-3 col-form-label">Contact :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="app_contact" id="app_contact" value="<?php echo $settings_row['app_contact'];?>" >
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="app_website" class="col-sm-3 col-form-label">Website :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="app_website" id="app_website" value="<?php echo $settings_row['app_website'];?>" >
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label for="app_developed_by" class="col-sm-3 col-form-label">Developed By:-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="app_developed_by" id="app_developed_by" value="<?php echo $settings_row['app_developed_by'];?>" >
                                        </div>
                                    </div>
									
									
									<div class="form-group row">
                                        <label for="mail_from" class="col-sm-3 col-form-label">Email From  :-</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="mail_from" id="mail_from" value="<?php echo $settings_row['mail_from'];?>" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="client_msg" class="col-sm-3 col-form-label">Mail To Client :-</label>
                                        <div class="col-sm-9">
										<div class="fileupload_block" >
                                            <textarea class="tinymce-editor" id="tinymce-example" name="client_msg"><?php echo stripslashes($settings_row['client_msg']);?></textarea>
											</div>
                                        </div>
                                    </div>
									
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>