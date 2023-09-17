<?php
include 'includes/header.php';
// include 'includes/config.php';
    $qry="SELECT * FROM tbl_meta_tag order by id ASC";
    $result=mysqli_query($conn,$qry); 	
     
     $qry_static="SELECT * FROM tbl_meta_tag_static where id=1";
     $result_static=mysqli_query($conn,$qry_static); 	
	 $row_static=mysqli_fetch_assoc($result_static);
	
	//Delete Meta Tag  	
	if(isset($_GET['meta_id']))
    { 
        // Sanitize the input to prevent SQL injection
        $metaId = intval($_GET['meta_id']);
        
        deleteRecord('tbl_meta_tag', 'id=' . $metaId);
    
        echo "<script type='text/javascript'>";
        echo "    window.location.href = 'manage-seo.php';";
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
                        <h4>Manage SEO</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                            <a href="manage-static-data.php" class="btn_1">Manage Static Data</a>
                            </div>
                            <div class="add_button ms-2">
                            <a href="add-seo.php?add=yes" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Page Banner Image</th>
                                    <th scope="col">Meta Title</th>
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                             
                                
                                    $cno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                        <tr>
                                            <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>


                                            <td><?php if($row['page_name']!="index.php" && $row['banner_image']!=""){?>
                            						<img height="50" width="auto" style="object-fit:cover;" src="images/pageBanner/<?php echo $row['banner_image'];?>" />
                            				    <?php }else{ ?><img height="50" width="auto" style="object-fit:cover;" src="images/add-image.png" />
                            					<?php } ?></td>
                                            <td><?php 
	
                    							$text=$row['meta_title'];
                    							$rest = substr($text, 0, 30);
                    							
                    							if(strlen($text)<=30)
                    							{	echo $text;	}
                    							else
                    							{	echo stripslashes($rest)."...";	}
                    						
                    						?></td>
                                           
                                            <td>

                                                <form class="d-inline" onsubmit="return confirm('are you sure');">
                                                    <!-- delete -->
                                                    <input type="hidden" name="meta_id" value="<?php echo $row['id'] ?>" />
                                                    <button type="submit" name="" id="" class="fas fa-trash-alt text-danger border border-0 bg-white">
                                                </form>&nbsp&nbsp
                                                <form class="d-inline" action="add-seo.php" method="get">
                                                    <!-- update -->
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="edit_id" />
                                                    <button type="submit" name="" value="" id="" class="fas fa-edit  border border-0 bg-white">
                                                </form>

                                            </td>
                                        </tr>

                                <?php
                                        $cno++;
                                    }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>