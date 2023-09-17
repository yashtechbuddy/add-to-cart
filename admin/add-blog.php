<?php
include 'includes/header.php';
// include 'includes/config.php';
// 	require("includes/function.php");
date_default_timezone_set('Asia/Calcutta');
?>
<?php
	if(isset($_POST['submit']) and isset($_GET['add'])) 
	{
	    
		/*CREATE SINGLE PAGE FILE*/
		$text=strtolower($_POST['title']);
		
		$filename=strtolower($_POST['page_name']);	/* OR      $filename=str_replace(" ","-",$text).".php";  */
		
		
		
		
		//copy("../blog-detail.php","../blog/".$filename);     
		
		$content ="<?php include_once('../blog-detail.php'); ?>"; 
		$fh = fopen("../blogs/".$filename, "w");
		fwrite($fh, $content);
		fclose($fh);
						
		
		
		//CHECK DUPLICATION
		$qry1="SELECT * FROM tbl_blog";
		$result1=mysqli_query($conn,$qry1);	
		
		while($row1=mysqli_fetch_array($result1))
		{
			if($row1['page_name']==$filename)
			{
				echo '<script>';
                echo 'alert("This is page already present");';
                echo 'window.location.href = "manage-blog.php";'; // Change this URL to the desired destination
                echo '</script>';
			}
			
		}
			
		
		/*START META TAG INSERT */
		
			include_once('seo_add_form.php');
		
		/*END META TAG INSERT */
					
			
		$date=date('d-m-Y');
		$image="";
		if($_FILES['image']['name']!="")
		{	
			$image="Blog-".rand(0,99999)."_".$_FILES['image']['name'];$tpath1='images/blog/'.$image; 			 
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);
		}	
			
			
		/*COUNT LAST INSERTED POSITION NO */
		$qry_order="SELECT * FROM tbl_blog order by position_order ASC";
		$result_order=mysqli_query($conn,$qry_order); 				
        $position_order=mysqli_num_rows($result_order)+1; 
        
		 
		
		$data = array( 
				'title'  =>  $_POST['title'],
				'image'  =>  $image, 
			    'alt_tag'  =>  $_POST['alt_tag'],
				'sort_desc'  =>  htmlspecialchars_decode(addslashes($_POST['sort_desc'])), 
				'long_desc'  =>  htmlspecialchars_decode(addslashes($_POST['long_desc'])), 
				'create_date'  =>  $date,
				'credit_name'  =>  $_POST['credit_name'], 
				'credit_link'  =>  $_POST['credit_link'], 
				'page_name'  =>  $filename,
				'meta_tag_id' => $meta_row1['id'],
				'position_order' => $position_order
			    );	
			    

        $qry = Insert('tbl_blog',$data);
        
		echo '<script>';
        echo 'alert("Blog uploaded");';
        echo 'window.location.href = "manage-blog.php";'; // Change this URL to the desired destination
        echo '</script>';

	}
	
	//Fetch selected blog detail
	if(isset($_GET['edit_id']))
	{
			 
			$qry="SELECT * FROM tbl_blog where id='".$_GET['edit_id']."'";
			$result=mysqli_query($conn,$qry);
			$row=mysqli_fetch_assoc($result);
			
			$meta_qry="SELECT * FROM tbl_meta_tag where id='".$row['meta_tag_id']."'";
			$meta_result=mysqli_query($conn,$meta_qry);
			$meta_row=mysqli_fetch_assoc($meta_result);

	}
		//Edit 
	if(isset($_POST['submit']) and isset($_POST['edit_id']))
	{
		
			
		
		/*START META TAG UPDATE */
		
			include_once('seo_edit_form.php');
		
		/*END META TAG UPDATE */
			
		
		 
		 if($_FILES['image']['name']!="")
		 {		


			$img_res=mysqli_query($conn,'SELECT * FROM tbl_blog WHERE id='.$_GET['edit_id'].'');
			$img_res_row=mysqli_fetch_assoc($img_res);
		

			if($img_res_row['image']!="")
			{
				unlink('images/blog/'.$img_res_row['image']);
			}

			$image="Blog-".rand(0,99999)."_".$_FILES['image']['name'];$tpath1='images/blog/'.$image; 			
			move_uploaded_file($_FILES["image"]["tmp_name"], $tpath1);		
				
		

			$data = array(
				'title'  =>  $_POST['title'],
				'image'  =>  $image,
			    'alt_tag'  =>  $_POST['alt_tag'],
				'sort_desc'  =>  htmlspecialchars_decode(addslashes($_POST['sort_desc'])), 
				'long_desc'  =>  htmlspecialchars_decode(addslashes($_POST['long_desc'])),
				'credit_name'  =>  $_POST['credit_name'], 
				'credit_link'  =>  $_POST['credit_link'], 
				);

			$category_edit=Update('tbl_blog', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }
		 else
		 {

			 $data = array(
				'title'  =>  $_POST['title'],
			    'alt_tag'  =>  $_POST['alt_tag'],
				'sort_desc'  =>  htmlspecialchars_decode(addslashes($_POST['sort_desc'])), 
				'long_desc'  =>  htmlspecialchars_decode(addslashes($_POST['long_desc'])),
				'credit_name'  =>  $_POST['credit_name'], 
				'credit_link'  =>  $_POST['credit_link'],
				);	

			 $category_edit=Update('tbl_blog', $data, "WHERE id = '".$_POST['edit_id']."'");

		 }

		     
		echo '<script>';
        echo 'alert("Blog Updated Successfully!");';
        echo 'window.location.href = "manage-blog.php";'; // Change this URL to the desired destination
        echo '</script>';
 
	}

?>
<!--add-blog & remove -->
<!-- include 'includes/side-bar.php';-->
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$result = mysqli_query($conn, $select);
$sidebar = mysqli_fetch_assoc($result);
?>
<?php include 'includes/side-bar.php'; ?>

<?php include 'includes/top-bar.php';
?>

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4 class="page-title"><?php if (isset($_GET['edit_id'])) { ?>Edit<?php } else { ?>Add<?php } ?> Blog</h4>

                    </div>
                    <!-- script -->
                    <script type="text/javascript">
                        function OnTitle(txt) {
                            var str = txt.value;

                            var resOld = str.replace(/[&\/\\#,+()$~%.'":*?!@_^`|\[\];=<>{}]/g, ''); //replace special charactor with     blanck space
                            var res = resOld.toLowerCase();

                            var text = " | Trading";
                            document.getElementById("meta_title").value =  txt.value+text;  //create  meta Title

                            var res1 = res.split(" ").join("-"); //replace space with - sign	
                            document.getElementById("page_name").value = res1 + ".php"; //create webpage name

                            var url="blogs/";
                            document.getElementById("meta_url").value = url+res1+".php";  //create  meta url

                            document.getElementById("meta_canonical").value = url + res1 + ".php"; //create  meta canonical url



                        }
                    
        					function OnWebpageName(txt)
        					{
        						var str = txt.value; 
        							
        						var resOld = str.replace(/[&\/\\#,+()$~%'":*?!@_^`|\[\];=<>{}]/g,''); //replace special charactor with     blanck space
        						var res = resOld.toLowerCase();
        						
        						var res1 = res.split(" ").join("-");
        						
        						var url="blogs/";
        						document.getElementById("meta_url").value = url+res1;  //create  meta url
        					} 

                        function OnDesc(txt) {

                            var str = txt.value;
                            document.getElementById("meta_desc").value = txt.value; //create  meta Description

                        }


                        function setImage(val) {
                            var url1 = "https://www.rndtechnosoft.com/admin/images/blog/";
                            var url2 = "Blog-" + Math.floor((Math.random() * 99999) + 1) + "_";

                            var fileName = val.substr(val.lastIndexOf("\\") + 1, val.length); //get browse image name


                            document.getElementById("browse_image").value = url2 + fileName; // add image name to text box


                            document.getElementById("meta_image").value = url1 + url2 + fileName; // add image name to meta_image with comlete URl

                        }

                        function onWebPage() {
                            if (document.getElementById("web_page").checked) {
                                document.getElementById("page_name").readOnly = true;
                            } else {
                                document.getElementById("page_name").readOnly = false;
                            }
                        }
                    </script>


                    <!-- start blog -->
                    <!--<?php print_r($meta_row); ?>-->
                    <form class="" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row col-12">
                            <div class="mb-3 col-lg-12">
                                <input  type="hidden" name="edit_id" value="<?php  echo $_GET['edit_id'];?>" />
                                <label for="title" class="form-label">Blog Title</label>
                                <input type="text" name="title" id="title" <?php if(isset($_GET['add'])){?>onkeyup="OnTitle(this);"<?php } ?>  value="<?php if(isset($_GET['edit_id'])){echo $row['title'];}?>" class="form-control" required>
                            </div>

                            <div class="mb-3 col-lg-12">
                                <label for="page_name" class="form-label">File</label>
                                 <input type="text" name="page_name" id="page_name"  <?php if(isset($_GET['add'])){?>onkeyup="OnWebpageName(this);"<?php } ?> pattern="[a-z0-9._%+-]+\.php" title="Must contain have lowercase letter, use - as special charactor and ednding with .php extension" value="<?php if(isset($_GET['edit_id'])){echo $row['page_name'];}?>" class="form-control" required <?php if(isset($_GET['edit_id'])){echo "readonly";}?> readonly>   
                            </div>

                            <?php if (isset($_GET['add'])) { ?>
                                <div class="col-lg-12 mb-3">
                                    <input onclick="onWebPage();" type="checkbox" id="web_page" checked /> <label for="web_page"> Readonly Text</label>
                                </div>
                            <?php } ?>

                            <div class="mb-3 col-lg-12">
                                <div class="mb-3 col-lg-12">
                                    <label for="ProductName" class="form-label">Page Type</label>
                                    <input type="text" name="page_type" id="page_type" value="<?php if(isset($_GET['add'])){?>blog<?php } ?><?php echo $meta_row['page_type'];?>" class="form-control" readonly >
                                </div>
                            </div>

                            <div class="mb-3 col-lg-12">
                                <div class="mb-3 col-lg-12">
                                    <label for="ProductName" class="form-label">Blog Description</label>
                                    <textarea  name="sort_desc" class="form-control" id="sort_desc"  onkeyup="OnDesc(this);" rows="5" style="resize: none;" ><?php if(isset($_GET['edit_id'])){echo $row['sort_desc'];}?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 col-lg-12">
                                <label for="ProductImagy" class="form-label">Image </label>
                                <div class="fileupload_block">
                                <input type="file" name="image" id="fileupload"  >
        						    <?php if(isset($_GET['edit_id']) and $row['image']!=""){ ?>
        							<img type="image" style="width:120px; height:auto;margin-bottom:10px;" src="images/blog/<?php echo $row['image'];?>" alt="banner image" style="width: 172px;"/>
                                	<?php } else { ?>
        							<img type="image" style="width:120px; height:auto;margin-bottom:10px;" src="images/add-image.png" />
                                	<?php } ?>
        							
        							<input type="text" name="alt_tag" id="alt_tag"  placeholder="Enter Image Alternate text" title="Enter Image Alternate text here !" value="<?php if(isset($_GET['edit_id'])){echo $row['alt_tag'];}?>" class="form-control" />
        						</div>
                            </div>

                            <div class="mb-3 col-lg-12 col-md-12">
                                <label for="Description" class="form-label">Blog Single Description </label>
                                <textarea name="long_desc" class="form-control" row="10"  id="default" style="border-color: dark;"><?php if(isset($_GET['edit_id'])){echo $row['long_desc'];}?></textarea>
                            </div>
                            
                             <div class="mb-3 col-lg-12">
                                <div class="mb-3 col-lg-12">
                                    <label for="ProductName" class="form-label">Credit Name</label>
                                   <input type="text" name="credit_name" id="credit_name" value="<?php echo $row['credit_name'];?>" class="form-control" >
                                </div>
                            </div>
                            <?php include_once('seo.php'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary" value="blog" name="submit">Submit</button>

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