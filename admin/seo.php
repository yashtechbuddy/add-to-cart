		
	<?php
	
		$permission_qry="SELECT * FROM tbl_superadmin_setting where visibility_status=0 and page_name='manage_seo.php' order by id ASC";
		$permission_result=mysqli_query($conn,$permission_qry);
		$permission_count=mysqli_num_rows($permission_result);
		
		$qry11="SELECT * FROM tbl_meta_tag_static where id=1";
		$result11=mysqli_query($conn,$qry11);
		$static_meta_row=mysqli_fetch_assoc($result11);
		
		if($permission_count > 0) 
		{	
	
	
	?>
				  
			<div class="page_title" style="padding: 34px 20px 1px 5px;"><h4>Meta Tag</h4></div>
			<hr><br> 
			 
			  <input type="hidden" name="meta_edit_id" value="<?php echo $meta_row['id'];?>" />

				 
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Banner Image :- <p class="control-label-help">(Image Size : 1350x400)</p></label>
				<div class="col-sm-9">
				  <div class="fileupload_block">
					<input type="file" name="banner_image" id="fileupload" >
					
						<?php if(isset($_GET['edit_id']) and $meta_row['banner_image']!="") {?>
						<img type="image" src="images/pageBanner/<?php echo $meta_row['banner_image'];?>" alt="banner image" style="width: 170px; height:auto;margin-bottom:10px;"/>
						<?php } else {?>
						<img type="image" src="images/pageBanner/default/default-banner.jpg"  style="width: 170px; height:auto;margin-bottom:10px;" />
						<?php }?>
						<br>
						<input type="text" name="banner_alt_tag" id="banner_alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['add'])){ echo "Trading"; } ?><?php echo $meta_row['alt_tag'];?>" class="form-control" />
					
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
				    <textarea name="meta_desc" class="form-control"><?php echo $meta_row['meta_desc'];?></textarea>
				  <!--<textarea name="meta_desc" id="meta_desc" class="form-control"><?php if(isset($_GET['add'])){ echo "Trading"; } ?><?php echo $meta_row['meta_desc'];?></textarea>-->
				</div>
			  </div>    		
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta URL :-</label>
				<div class="col-sm-9">
				      <input type="text" name="meta_url" id="meta_url" value="<?php echo $meta_row['meta_url'];?>" class="form-control" readonly>
				  
				</div>
			  </div>
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Image :-</label>
				<div class="col-sm-9">
				   
				  <input type="text" name="meta_image" id="meta_image" value="<?php echo $meta_row['meta_image'];?>" class="form-control" readonly >
				</div>
			  </div>
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Keyword :-</label>
				<div class="col-sm-9">
				      <input type="text" name="meta_keyword" value="<?php if(isset($_GET['add'])){ echo $static_meta_row['meta_keyword']; } ?><?php echo $row['meta_keyword'];?>" class="form-control">
				  <!--<input type="text" name="meta_keyword" value="<?php if(isset($_GET['add'])){ echo "SANDRA SHROFF ROFEL COLLEGE OF NURSING"; } ?><?php echo $meta_row['meta_keyword'];?>" class="form-control">-->
				</div>
			  </div>
			 
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Author :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_author" value="<?php echo $meta_row['meta_author'];?>" class="form-control">
				</div>
			  </div>
			 
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Publisher :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_publisher" value="<?php echo $meta_row['meta_publisher'];?>" class="form-control">
				</div>
			  </div>
			 
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Canonical :-</label>
				<div class="col-sm-9">
				    <input type="text" name="meta_canonical" id="meta_canonical" value="<?php echo $static_meta_row['meta_canonical'];?>" class="form-control">
				  <!--<input type="text" name="meta_canonical"  id="meta_canonical" value="<?php echo $meta_row['meta_canonical'];?>" class="form-control">-->
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
				  <input type="text" name="meta_owner" value="<?php echo $static_meta_row['meta_owner'];?>" class="form-control">
				</div>
			  </div>
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Copyright :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_copyright" value="<?php echo $static_meta_row['meta_copyright'];?>" class="form-control">
				</div>
			  </div>
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Contact Address :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_contact_addr" value="<?php echo $static_meta_row['meta_contact_addr'];?>" class="form-control">
				</div>
			  </div>
			  
			 <!-- <div class="form-group row mb-3">-->
				<!--<label class="col-sm-3 col-form-label">Meta Expires :-</label>-->
				<!--<div class="col-sm-9">-->
				<!--  <input type="text" name="meta_expires" value="<?php if(isset($_GET['add'])){ echo "30"; }?><?php echo $meta_row['meta_expires'];?>" class="form-control">-->
				<!--</div>-->
			 <!-- </div>-->
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Google Site Verification :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_google_verification" value="<?php echo $static_meta_row['meta_google_verification'];?>" class="form-control">
				</div>
			  </div>				  
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta P:Domain Verification :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_domain_verification" value="<?php echo $static_meta_row['meta_domain_verification'];?>" class="form-control">
				</div>
			  </div>
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Norton Safeweb Site Verification :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_safeweb_verification" value="<?php echo $static_meta_row['meta_safeweb_verification'];?>" class="form-control">
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
				  <input type="text" name="meta_classification" value="<?php echo $static_meta_row['meta_classification'];?>" class="form-control">
				</div>
			  </div>
			  
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Meta Reply To :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_reply" value="<?php echo $static_meta_row['meta_reply'];?>" class="form-control">
				</div>
			  </div>
			  
	<?php
		}
		else		
		{		
	?>	
	  
			   <div class="page_title" style="    padding: 34px 20px 1px 5px;">Page Heading</div>
			   <hr><br> 
			 
			  <input type="hidden" name="meta_edit_id" value="<?php echo $meta_row['id'];?>" />

				 
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Page Banner Image :- <p class="control-label-help">(Image Size : 1350x400)</p></label>
				<div class="col-sm-9">
				  <div class="fileupload_block">
					<input type="file" name="banner_image" id="fileupload" >
					
						<?php if(isset($_GET['edit_id']) and $meta_row['banner_image']!="") {?>
						  <div class="fileupload_img"><img type="image" src="images/pageBanner/<?php echo $meta_row['banner_image'];?>" alt="banner image" style="width: 170px; height:auto;"/></div>
						<?php } else {?>
						  <div class="fileupload_img"><img type="image" src="images/pageBanner/default/default-banner.jpg"  style="width: 170px; height:auto;" /></div>
						<?php }?>
						
						<input type="text" name="banner_alt_tag" id="banner_alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['add'])){ echo "SANDRA SHROFF ROFEL COLLEGE OF NURSING"; } ?><?php echo $meta_row['alt_tag'];?>" class="form-control" />
					
				  </div>
				</div>
			  </div>
			   
			   
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Page Title :-</label>
				<div class="col-sm-9">
				  <input type="text" name="meta_title" id="meta_title" value="<?php echo $static_meta_row['meta_title'];?>" class="form-control" required>
				</div>
			  </div>
											   
			  <div class="form-group row mb-3">
				<label class="col-sm-3 col-form-label">Page Description :-</label>
				<div class="col-sm-9">
				  <textarea name="meta_desc" id="meta_desc" class="form-control"><?php echo $static_meta_row['meta_desc'];?></textarea>
				</div>
			  </div>    		
			  

	
	
	<?php	
		}	
	?>			  