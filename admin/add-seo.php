<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
	$qry11="SELECT * FROM tbl_meta_tag_static where id=1";
	$result11=mysqli_query($conn,$qry11);
	$static_meta_row=mysqli_fetch_assoc($result11);
  
  
	//Add
	if(isset($_POST['submit']) and isset($_GET['add']))
	{		
        $image="default/default-banner.jpg";
		if($_FILES['banner_image']['name']!="")
		{	
			$image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];			   			
			$tpath1='images/pageBanner/'.$image; 			 
			move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
		}
		
		$meta_image="";
		if($_FILES['meta_image']['name']!="")
		{	
			$meta_image="meta_image-".rand(0,99999)."_".$_FILES['meta_image']['name'];
			$tpath1='images/pageBanner/'.$meta_image; 			 
			move_uploaded_file($_FILES["meta_image"]["tmp_name"],$tpath1);
		}
		
		$data = array( 
			'page_name'  =>  $_POST['page_name'],
			'page_type'  =>  $_POST['page_type'],
			'banner_image'  =>  $image, 
			'alt_tag'  =>  $_POST['alt_tag'],
			'meta_title'  =>  $_POST['meta_title'],
			'meta_desc'  =>  $_POST['meta_desc'],
			'meta_url'  =>  $_POST['meta_url'],
			'meta_image'  =>  $meta_image,
			'meta_keyword'  =>  $_POST['meta_keyword'],
			
			'meta_author'  =>  $_POST['meta_author'],
			'meta_publisher'  =>  $_POST['meta_publisher'],
			'meta_canonical'  =>  $_POST['meta_canonical'],
			'meta_language'  =>  $_POST['meta_language'],
			'meta_revisit'  =>  $_POST['meta_revisit'],
			'meta_owner'  =>  $_POST['meta_owner'],
			'meta_copyright'  =>  $_POST['meta_copyright'],
			'meta_contact_addr'  =>  $_POST['meta_contact_addr'],
			'meta_expires'  =>  $_POST['meta_expires'],
			'meta_google_verification'  =>  $_POST['meta_google_verification'],
			'meta_domain_verification'  =>  $_POST['meta_domain_verification'],
			'meta_safeweb_verification'  =>  $_POST['meta_safeweb_verification'],
			'meta_content_type'  =>  $_POST['meta_content_type'],
			'meta_rating'  =>  $_POST['meta_rating'],
			'meta_robots'  =>  $_POST['meta_robots'],
			'meta_googlebot'  =>  $_POST['meta_googlebot'],
			'meta_distribution'  =>  $_POST['meta_distribution'],
			'meta_classification'  =>  $_POST['meta_classification'],
			'meta_reply'  =>  $_POST['meta_reply']
			
			);		

 		$qry = Insert('tbl_meta_tag',$data);	

 	   
		echo "<script type='text/javascript'>";
		echo "alert('Inserted Successfully');";
		echo "window.location.href='manage-seo.php'";
		echo "</script>";	

		 
		
	}
	
	//Fetch selected service detail
	if(isset($_GET['edit_id']))
	{			 
		$qry="SELECT * FROM tbl_meta_tag where id='".$_GET['edit_id']."'";
		$result=mysqli_query($conn,$qry);
		$row=mysqli_fetch_assoc($result);

	}
	
	//Edit
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{

		if($_FILES['banner_image']['name']!="" and $_FILES['meta_image']['name']!="")
		{	
			
			$img_res=mysqli_query($conn,'SELECT * FROM tbl_meta_tag WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['banner_image']!="")
			{
				unlink('images/pageBanner/'.$img_res_row['banner_image']);
			}
			if($img_res_row['meta_image']!="")
			{
				unlink('images/pageBanner/'.$img_res_row['meta_image']);
			}
			$meta_image="meta_image-".rand(0,99999)."_".$_FILES['meta_image']['name'];
			$tpath1='images/pageBanner/'.$meta_image; 			 
			move_uploaded_file($_FILES["meta_image"]["tmp_name"],$tpath1);
			
			$image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];			   			
			$tpath1='images/pageBanner/'.$image; 			 
			move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
		
			$data = array( 
			'page_name'  =>  $_POST['page_name'],
			'page_type'  =>  $_POST['page_type'],
			'banner_image'  =>  $image, 
			'alt_tag'  =>  $_POST['alt_tag'],
			'meta_title'  =>  $_POST['meta_title'],
			'meta_desc'  =>  $_POST['meta_desc'],
			'meta_url'  =>  $_POST['meta_url'],
			'meta_image'  =>  $meta_image,
			'meta_keyword'  =>  $_POST['meta_keyword'],
			'meta_author'  =>  $_POST['meta_author'],
			'meta_publisher'  =>  $_POST['meta_publisher'],
			'meta_canonical'  =>  $_POST['meta_canonical'],
			'meta_language'  =>  $_POST['meta_language'],
			'meta_revisit'  =>  $_POST['meta_revisit'],
			'meta_owner'  =>  $_POST['meta_owner'],
			'meta_copyright'  =>  $_POST['meta_copyright'],
			'meta_contact_addr'  =>  $_POST['meta_contact_addr'],
			'meta_expires'  =>  $_POST['meta_expires'],
			'meta_google_verification'  =>  $_POST['meta_google_verification'],
			'meta_domain_verification'  =>  $_POST['meta_domain_verification'],
			'meta_safeweb_verification'  =>  $_POST['meta_safeweb_verification'],
			'meta_content_type'  =>  $_POST['meta_content_type'],
			'meta_rating'  =>  $_POST['meta_rating'],
			'meta_robots'  =>  $_POST['meta_robots'],
			'meta_googlebot'  =>  $_POST['meta_googlebot'],
			'meta_distribution'  =>  $_POST['meta_distribution'],
			'meta_classification'  =>  $_POST['meta_classification'],
			'meta_reply'  =>  $_POST['meta_reply']
			
			);		
		}
		elseif($_FILES['banner_image']['name']!="")
		 {		
		     	
			$img_res=mysqli_query($conn,'SELECT * FROM tbl_meta_tag WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['banner_image']!="")
			{
				unlink('images/pageBanner/'.$img_res_row['banner_image']);
			}
				$image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];			   			
			$tpath1='images/pageBanner/'.$image; 			 
			move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
			
			$data = array( 
			'page_name'  =>  $_POST['page_name'],
			'page_type'  =>  $_POST['page_type'],
			'alt_tag'  =>  $_POST['alt_tag'],
			'meta_title'  =>  $_POST['meta_title'],
			'meta_desc'  =>  $_POST['meta_desc'],
			'meta_url'  =>  $_POST['meta_url'],
			'banner_image'  =>  $image, 
			'meta_keyword'  =>  $_POST['meta_keyword'],
			
			'meta_author'  =>  $_POST['meta_author'],
			'meta_publisher'  =>  $_POST['meta_publisher'],
			'meta_canonical'  =>  $_POST['meta_canonical'],
			'meta_language'  =>  $_POST['meta_language'],
			'meta_revisit'  =>  $_POST['meta_revisit'],
			'meta_owner'  =>  $_POST['meta_owner'],
			'meta_copyright'  =>  $_POST['meta_copyright'],
			'meta_contact_addr'  =>  $_POST['meta_contact_addr'],
			'meta_expires'  =>  $_POST['meta_expires'],
			'meta_google_verification'  =>  $_POST['meta_google_verification'],
			'meta_domain_verification'  =>  $_POST['meta_domain_verification'],
			'meta_safeweb_verification'  =>  $_POST['meta_safeweb_verification'],
			'meta_content_type'  =>  $_POST['meta_content_type'],
			'meta_rating'  =>  $_POST['meta_rating'],
			'meta_robots'  =>  $_POST['meta_robots'],
			'meta_googlebot'  =>  $_POST['meta_googlebot'],
			'meta_distribution'  =>  $_POST['meta_distribution'],
			'meta_classification'  =>  $_POST['meta_classification'],
			'meta_reply'  =>  $_POST['meta_reply']
			
			);		
			 $category_edit=Update('tbl_meta_tag', $data, "WHERE id = '".$_POST['edit_id']."'");
		}
		
		 elseif($_FILES['meta_image']['name']!="")
		 {	
			$img_res=mysqli_query($conn,'SELECT * FROM tbl_meta_tag WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
			
			if($img_res_row['meta_image']!="")
			{
				unlink('images/pageBanner/'.$img_res_row['meta_image']);
			}
			$meta_image="meta_image-".rand(0,99999)."_".$_FILES['meta_image']['name'];
			$tpath1='images/pageBanner/'.$meta_image; 			 
			move_uploaded_file($_FILES["meta_image"]["tmp_name"],$tpath1);
			
			$data = array( 
			'page_name'  =>  $_POST['page_name'],
			'page_type'  =>  $_POST['page_type'],
			
			'alt_tag'  =>  $_POST['alt_tag'],
			'meta_title'  =>  $_POST['meta_title'],
			'meta_desc'  =>  $_POST['meta_desc'],
			'meta_url'  =>  $_POST['meta_url'],
			'meta_image'  =>  $meta_image,
			'meta_keyword'  =>  $_POST['meta_keyword'],
			
			'meta_author'  =>  $_POST['meta_author'],
			'meta_publisher'  =>  $_POST['meta_publisher'],
			'meta_canonical'  =>  $_POST['meta_canonical'],
			'meta_language'  =>  $_POST['meta_language'],
			'meta_revisit'  =>  $_POST['meta_revisit'],
			'meta_owner'  =>  $_POST['meta_owner'],
			'meta_copyright'  =>  $_POST['meta_copyright'],
			'meta_contact_addr'  =>  $_POST['meta_contact_addr'],
			'meta_expires'  =>  $_POST['meta_expires'],
			'meta_google_verification'  =>  $_POST['meta_google_verification'],
			'meta_domain_verification'  =>  $_POST['meta_domain_verification'],
			'meta_safeweb_verification'  =>  $_POST['meta_safeweb_verification'],
			'meta_content_type'  =>  $_POST['meta_content_type'],
			'meta_rating'  =>  $_POST['meta_rating'],
			'meta_robots'  =>  $_POST['meta_robots'],
			'meta_googlebot'  =>  $_POST['meta_googlebot'],
			'meta_distribution'  =>  $_POST['meta_distribution'],
			'meta_classification'  =>  $_POST['meta_classification'],
			'meta_reply'  =>  $_POST['meta_reply']
			);
		
		 $category_edit=Update('tbl_meta_tag', $data, "WHERE id = '".$_POST['edit_id']."'");
		 }
		 else{
		     $data = array( 
			'page_name'  =>  $_POST['page_name'],
			'page_type'  =>  $_POST['page_type'],
			
			'alt_tag'  =>  $_POST['alt_tag'],
			'meta_title'  =>  $_POST['meta_title'],
			'meta_desc'  =>  $_POST['meta_desc'],
			'meta_url'  =>  $_POST['meta_url'],
			
			'meta_keyword'  =>  $_POST['meta_keyword'],
			
			'meta_author'  =>  $_POST['meta_author'],
			'meta_publisher'  =>  $_POST['meta_publisher'],
			'meta_canonical'  =>  $_POST['meta_canonical'],
			'meta_language'  =>  $_POST['meta_language'],
			'meta_revisit'  =>  $_POST['meta_revisit'],
			'meta_owner'  =>  $_POST['meta_owner'],
			'meta_copyright'  =>  $_POST['meta_copyright'],
			'meta_contact_addr'  =>  $_POST['meta_contact_addr'],
			'meta_expires'  =>  $_POST['meta_expires'],
			'meta_google_verification'  =>  $_POST['meta_google_verification'],
			'meta_domain_verification'  =>  $_POST['meta_domain_verification'],
			'meta_safeweb_verification'  =>  $_POST['meta_safeweb_verification'],
			'meta_content_type'  =>  $_POST['meta_content_type'],
			'meta_rating'  =>  $_POST['meta_rating'],
			'meta_robots'  =>  $_POST['meta_robots'],
			'meta_googlebot'  =>  $_POST['meta_googlebot'],
			'meta_distribution'  =>  $_POST['meta_distribution'],
			'meta_classification'  =>  $_POST['meta_classification'],
			'meta_reply'  =>  $_POST['meta_reply']
			);
				 $category_edit=Update('tbl_meta_tag', $data, "WHERE id = '".$_POST['edit_id']."'");
		 }
		     
		 echo "<script type='text/javascript'>";
		echo "alert('Updated Successfully');";
		echo "window.location.href='manage-seo.php'";
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
                        <h4 class="page-title"><?php if(isset($_GET['edit_id'])){?>Edit<?php }else{?>Add<?php }?> SEO Page</h4>
                    </div>
                    <!-- start form New Category -->
                    <form action="" name="editprofile" method="post" enctype="multipart/form-data">
								 
								 <script type="text/javascript">
							 function OnTitle(txt) {
								var str = txt.value;

								var resOld = str.replace(/[&\/\\#,+()$~%.'":*?!@_^`|\[\];=<>{}]/g, ''); //replace special charactor with blank space
								var res = resOld.toLowerCase();

								var res1 = res.split(" ").join("-"); //replace space with - sign	
								document.getElementById("page_name").value = res1 + ".php"; //create webpage name

								var url = "https://rndtd.com/demos/trading/working/";
								document.getElementById("meta_url").value = url + res1 + ".php"; //create  meta url

								document.getElementById("meta_canonical").value = url + res1 + ".php"; //create  meta canonical url

							}

							function onWebPage() {
								if (document.getElementById("web_page").checked) {
									document.getElementById("page_name").readOnly = true;
								} else {
									document.getElementById("page_name").readOnly = false;
								}
							}
						</script>		
	
				<input  type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>" />	
								<div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Title :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_title" <?php if(isset($_GET['add'])){?>onkeyup="OnTitle(this);"<?php } ?>  value="<?php echo $row['meta_title'];?>" class="form-control" required>
                    </div>
                  </div>
				  
                  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Page Name :- <br>[ex- page-name.php]</label>
					<div class="col-sm-9">
                      <input type="text" name="page_name"  id="page_name" value="<?php echo $row['page_name'];?>" class="form-control" required  <?php if(isset($_GET['edit_id'])){echo "readonly";}?> readonly >
                    </div>
					
					<?php if(isset($_GET['add'])){?>
						<div class="col-md-2">
						<input onclick="onWebPage();" type="checkbox" id="web_page" checked /> <label for="web_page"> Readonly Text</label>   
						</div>
					<?php } ?>
					
                  </div>    
				  
                  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Page Type :-</label>
					<div class="col-sm-9">
                       <select name="page_type" id="page_type" class="form-control" required>
							<option value="">--Select Page Type--</option>
																		 
							<option value="none" <?php if(isset($_GET['edit_id']) && $row['page_type']=="none"){?>selected<?php }else { echo "selected"; }?> >None</option>	          							 
							<option value="courses" <?php if(isset($_GET['edit_id']) && $row['page_type']=="products"){?>selected<?php }?> >Courses</option>
							<option value="services" <?php if(isset($_GET['edit_id']) && $row['page_type']=="services"){?>selected<?php }?> >Services</option>
							<!--<option value="blog" <?php if(isset($_GET['edit_id']) && $row['page_type']=="blog"){?>selected<?php }?> >Blog</option>-->
							<option value="news" <?php if(isset($_GET['edit_id']) && $row['page_type']=="news"){?>selected<?php }?> >News</option>
							<option value="teams" <?php if(isset($_GET['edit_id']) && $row['page_type']=="teams"){?>selected<?php }?> >Teams</option>	
							<option value="pages" <?php if(isset($_GET['edit_id']) && $row['page_type']=="pages"){?>selected<?php }?> >Pages</option>
							<!--<option value="pages" <?php if(isset($_GET['edit_id']) && $row['page_type']=="client"){?>selected<?php }?> >Clinet</option>							-->
							<!--<option value="pages" <?php if(isset($_GET['edit_id']) && $row['page_type']=="portfolio"){?>selected<?php }?> >Portfolio</option>	-->
					  </select>
                    </div>
                  </div>    
				  
				
					 
                  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Banner Image :- <p class="control-label-help">(Image Size : 1350x400)</p></label>
                    <div class="col-sm-9">
                      <div class="fileupload_block">
                        <input type="file" name="banner_image" id="fileupload" >
						
                            <?php if(isset($_GET['edit_id']) and $row['banner_image']!="") {?>
							<img type="image" src="images/pageBanner/<?php echo $row['banner_image'];?>" alt="banner image" style="width:150px; height:auto;margin-bottom:10px;"/>
                        	<?php } else {?>
							<img type="image" src="images/pageBanner/default/default-banner.jpg" style="width:150px; height:auto;margin-bottom:10px;" />
                        	<?php }?>
							
							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['alt_tag']; } ?><?php if(isset($_GET['edit_id'])){echo $row['alt_tag'];}?>" class="form-control" />
						
                      </div>
                    </div>
                  </div>
				   
				   
                  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Description :-</label>
                    <div class="col-sm-9">
                      <textarea name="meta_desc" class="form-control"><?php if(isset($_GET['add'])){ echo $static_meta_row['meta_desc']; } ?><?php echo $row['meta_desc'];?></textarea>
                    </div>
                  </div>    		
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta URL :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_url" id="meta_url" value="<?php echo $row['meta_url'];?>" class="form-control" >
                    </div>
                  </div>
				     <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Image :- </label>
                    <div class="col-sm-9">
                      <div class="fileupload_block">
                        <input type="file" name="meta_image" id="fileupload" >
						
                            <?php if(isset($_GET['edit_id']) and $row['meta_image']!="") {?>
							<img type="image" src="images/pageBanner/<?php echo $row['meta_image'];?>" alt="meta image" style="width:150px; height:auto;margin-bottom:10px;"/>
                        	<?php } else {?>
							<img type="image" style="height: 102px;width:auto;margin-bottom:10px;" src="assets/images/add-image.png" alt="meta image" />
						  <?php } ?>
                      </div>
                    </div>
                  </div>
				
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Keyword :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_keyword" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_keyword']; } ?><?php echo $row['meta_keyword'];?>" class="form-control">
                    </div>
                  </div>
				 
				 
				 
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Author :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_author" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_author']; } ?><?php echo $row['meta_author'];?>" class="form-control">
                    </div>
                  </div>
				 
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Publisher :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_publisher" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_publisher']; } ?><?php echo $row['meta_publisher'];?>" class="form-control">
                    </div>
                  </div>
				 
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Canonical :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_canonical" id="meta_canonical" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_canonical']; } ?><?php echo $row['meta_canonical'];?>" class="form-control">
                    </div>
                  </div>
				 
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Language :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_language" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_language']; } ?><?php echo $row['meta_language'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Revisit After :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_revisit" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_revisit']; } ?><?php echo $row['meta_revisit'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Owner :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_owner" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_owner']; } ?><?php echo $row['meta_owner'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Copyright :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_copyright" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_copyright']; } ?><?php echo $row['meta_copyright'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Contact Address :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_contact_addr" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_contact_addr']; } ?><?php echo $row['meta_contact_addr'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Expires :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_expires" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_expires']; } ?><?php echo $row['meta_expires'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <!--<div class="form-group row mb-3">-->
      <!--              <label class="col-sm-3 col-form-label">Meta Google Site Verification :-</label>-->
      <!--              <div class="col-sm-9">-->
      <!--                <input type="text" name="meta_google_verification" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_google_verification']; } ?><?php echo $row['meta_google_verification'];?>" class="form-control">-->
      <!--              </div>-->
      <!--            </div>				  -->
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta P:Domain Verification :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_domain_verification" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_domain_verification']; } ?><?php echo $row['meta_domain_verification'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Norton Safeweb Site Verification :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_safeweb_verification" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_safeweb_verification']; } ?><?php echo $row['meta_safeweb_verification'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Content Type :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_content_type" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_content_type']; } ?><?php echo $row['meta_content_type'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Rating :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_rating" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_rating']; } ?><?php echo $row['meta_rating'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Robots :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_robots" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_robots']; } ?><?php echo $row['meta_robots'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Googlebot :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_googlebot" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_googlebot']; } ?><?php echo $row['meta_googlebot'];?>" class="form-control">
                    </div>
                  </div>
				  
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Distribution :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_distribution" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_distribution']; } ?><?php echo $row['meta_distribution'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Classification :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_classification" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_classification']; } ?><?php echo $row['meta_classification'];?>" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group row mb-3">
                    <label class="col-sm-3 col-form-label">Meta Reply To :-</label>
                    <div class="col-sm-9">
                      <input type="text" name="meta_reply" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_reply']; } ?><?php echo $row['meta_reply'];?>" class="form-control">
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