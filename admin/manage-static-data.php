<?php
include 'includes/header.php';
// include 'includes/config.php';


?>
<?php
$qry="SELECT * FROM tbl_meta_tag_static where id=1";
	$result=mysqli_query($conn,$qry);
	$meta_row=mysqli_fetch_assoc($result);
  
  
	if(isset($_POST['submit']))
	{
		
		if($_FILES['banner_image']['name']!="")
		{	
			
			$img_res=mysqli_query($conn,'SELECT * FROM tbl_meta_tag_static WHERE id=1');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['banner_image']!="")
			{
				unlink('images/pageBanner/'.$img_res_row['banner_image']);
			}
			
			$image="Banner-".rand(0,99999)."_".$_FILES['banner_image']['name'];			   			
			$tpath1='images/pageBanner/'.$image; 			 
			move_uploaded_file($_FILES["banner_image"]["tmp_name"], $tpath1);
		
		
			$metadata = array( 		
			'banner_image'  =>  $image, 
			'alt_tag'  =>  $_POST['banner_alt_tag'],
			'meta_title'  =>  $_POST['meta_title'],			
			'meta_desc'  =>  $_POST['meta_desc'],
			'meta_url'  =>  $_POST['meta_url'],
			'meta_image'  =>  $_POST['meta_image'],
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
		else
		{
			
			$metadata = array( 
			'alt_tag'  =>  $_POST['banner_alt_tag'],
			'meta_title'  =>  $_POST['meta_title'],			
			'meta_desc'  =>  $_POST['meta_desc'],
			'meta_url'  =>  $_POST['meta_url'],
			'meta_image'  =>  $_POST['meta_image'],
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
		
		$meta_edit=Update('tbl_meta_tag_static', $metadata, "WHERE id=1");
	  
	    echo "<script type='text/javascript'>";
		echo "alert('Updated Successfully');";
		echo "window.location.href='manage-static-data.php'";
		echo "</script>";
	}
?>

<?php 
include 'includes/side-bar.php';
?>

<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Manage Static Data</h4>
                    </div>
                    <!-- start form New Category -->
                    <form action="" name="editprofile" method="post" enctype="multipart/form-data">
							<input type="hidden" name="meta_edit_id" value="<?php echo $meta_row['id'];?>" />

					 
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Banner Image :- <p class="control-label-help">(Image Size : 1350x400)</p></label>
					<div class="col-sm-9">
					  <div class="fileupload_block">
						<input type="file" name="banner_image" id="fileupload" >
						
							<?php if($meta_row['banner_image']!="") {?>
							<img type="image" src="images/pageBanner/<?php echo $meta_row['banner_image'];?>" alt="banner image" style="width: 170px; height:auto;margin-bottom:10px;"/>
							<?php } else {?><img type="image" src="images/pageBanner/default/default-banner.jpg"  style="width: 170px; height:auto;margin-bottom:10px;" />
							<?php }?>
							
							<input type="text" name="banner_alt_tag" id="banner_alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['add'])){ echo "RnD Technosoft | Mobile Application, Website Development, Software Company"; } ?><?php echo $meta_row['alt_tag'];?>" class="form-control" />
						
					  </div>
					</div>
				  </div>
				   
				   
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Title :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_title" id="meta_title" value="<?php echo $meta_row['meta_title'];?>" class="form-control" required>
					</div>
				  </div>
												   
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Description :-</label>
					<div class="col-sm-9">
					  <textarea name="meta_desc" id="meta_desc" class="form-control"><?php if(isset($_GET['add'])){ echo " RnD Technosoft #1 Software company, we provide a complete IT solution start from Web development, standard software & solutions to every business and companies in Vapi, Gujarat. As an IT consultant we strive to work in partnership with our client and create growth strategy through SEO,SMO,SMM,PPC to meet their business objectives. RnD Technosoft offers a wide of range Android/IOS App Development, Website Development, SEO & Digital Marketing Company in Vapi, Gujarat, India. RnD Technosoft Best Software Company In Vapi India | RnD Technosoft Best IT Company In Vapi India For PHP, Android, iPhone Application, SEO, Graphics Designs, logo design, Ecommerce Software Development Company In Vapi India.RnD Technosoft is Google Adwords certified Digital Marketing Company in Vapi, Gujarat; generating sales and leads ensuring visible ROI through PPC, Social media marketing, SEO services. Professional Web Design Development Company Vapi, Daman, Silvassa & Bhilad. RnD Technosoft Provide Digital marketing,Social media marketing,Search engine optimisation (SEO),Search engine marketing (SEM),Content marketing, Influencer marketing,Social media optimisation, digital marketing agency now extends to non-Internet channels that provide digital media."; } ?><?php echo $meta_row['meta_desc'];?></textarea>
					</div>
				  </div>    		
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta URL :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_url" id="meta_url" value="<?php echo $meta_row['meta_url'];?>" class="form-control" >
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Image :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_image" id="meta_image" value="<?php if(isset($_GET['add'])){ echo "https://www.rndtechnosoft.com/admin/images/favicon.png";} ?><?php echo $meta_row['meta_image'];?>" class="form-control" >
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Keyword :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_keyword" value="<?php if(isset($_GET['add'])){ echo "Android App Development, iOS App Development,Website Development, SEO,Digital Marketing, Software Development, Social Media Marketing, Online Advertisements, Vapi, Valsad, South Gujarat, Mumbai, India."; } ?><?php echo $meta_row['meta_keyword'];?>" class="form-control">
					</div>
				  </div>
				 
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Author :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_author" value="<?php if(isset($_GET['add'])){ echo "https://plus.google.com/u/0/104702639923819063296"; }?><?php echo $meta_row['meta_author'];?>" class="form-control">
					</div>
				  </div>
				 
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Publisher :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_publisher" value="<?php if(isset($_GET['add'])){ echo "https://plus.google.com/u/0/104702639923819063296"; }?><?php echo $meta_row['meta_publisher'];?>" class="form-control">
					</div>
				  </div>
				 
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Canonical :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_canonical"  id="meta_canonical" value="<?php echo $meta_row['meta_canonical'];?>" class="form-control">
					</div>
				  </div>
				 
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Language :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_language" value="<?php if(isset($_GET['add'])){ echo "en-us"; }?><?php echo $meta_row['meta_language'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Revisit After :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_revisit" value="<?php if(isset($_GET['add'])){ echo "15 days"; }?><?php echo $meta_row['meta_revisit'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Owner :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_owner" value="<?php if(isset($_GET['add'])){ echo "https://www.rndtechnosoft.com/"; }?><?php echo $meta_row['meta_owner'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Copyright :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_copyright" value="<?php if(isset($_GET['add'])){ echo "Copyright © 2018 RnD Technosoft, All rights reserved"; }?><?php echo $meta_row['meta_copyright'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Contact Address :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_contact_addr" value="<?php if(isset($_GET['add'])){ echo "mailto:hello@rndtechnosoft.com"; }?><?php echo $meta_row['meta_contact_addr'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Expires :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_expires" value="<?php if(isset($_GET['add'])){ echo "30"; }?><?php echo $meta_row['meta_expires'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Google Site Verification :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_google_verification" value="<?php if(isset($_GET['add'])){ echo "bEvdCfLJlm7YR-k4P0mhjufrNr9s0ZaRpyJBMty5Vh0"; }?><?php echo $meta_row['meta_google_verification'];?>" class="form-control">
					</div>
				  </div>				  
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta P:Domain Verification :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_domain_verification" value="<?php if(isset($_GET['add'])){ echo "0b71dcfb0745b4aa46d64272390a63aa"; }?><?php echo $meta_row['meta_domain_verification'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Norton Safeweb Site Verification :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_safeweb_verification" value="<?php if(isset($_GET['add'])){ echo "NON"; }?><?php echo $meta_row['meta_safeweb_verification'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Content Type :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_content_type" value="<?php if(isset($_GET['add'])){ echo "text/html; charset=utf-8"; }?><?php echo $meta_row['meta_content_type'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Rating :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_rating" value="<?php if(isset($_GET['add'])){ echo "general"; }?><?php echo $meta_row['meta_rating'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Robots :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_robots" value="<?php if(isset($_GET['add'])){ echo "index, follow"; }?><?php echo $meta_row['meta_robots'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Googlebot :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_googlebot" value="<?php if(isset($_GET['add'])){ echo "index, follow"; }?><?php echo $meta_row['meta_googlebot'];?>" class="form-control">
					</div>
				  </div>
				  
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Distribution :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_distribution" value="<?php if(isset($_GET['add'])){ echo "global"; }?><?php echo $meta_row['meta_distribution'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Classification :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_classification" value="<?php if(isset($_GET['add'])){ echo "Web Development & Mobile App Development"; }?><?php echo $meta_row['meta_classification'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row mb-3">
					<label class="col-sm-3 col-form-label">Meta Reply To :-</label>
					<div class="col-sm-9">
					  <input type="text" name="meta_reply" value="<?php if(isset($_GET['add'])){ echo "mailto:hello@rndtechnosoft.com"; }?><?php echo $meta_row['meta_reply'];?>" class="form-control">
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