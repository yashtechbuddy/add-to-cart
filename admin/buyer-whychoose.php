<?php
include 'includes/header.php';
// include 'includes/config.php';

	
	//Delete Meta Tag  	
	if(isset($_GET['b_id']))
    { 
        // Sanitize the input to prevent SQL injection
        $b_id= intval($_GET['b_id']);
        
        deleteRecord('tbl_buyer_whychooseb', 'id=' .  $b_id);
    
        echo "<script type='text/javascript'>";
        echo "    window.location.href = 'buyer-whychoose.php';";
        echo "</script>";
    }


?>
<?php
$select = "SELECT * FROM tbl_footer_setting WHERE id = 1";
$footerresult = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($footerresult);
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
                        <h4>Why Choose Us benefite</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here..." class="search-table-data">
                                    </div>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                            <a href="whychoose_static_b.php" class="btn_1">Manage Static Data</a>
                            </div>
                            <div class="add_button ms-2">
                            <a href="add-whychoose-benefite_b.php?add=yes" class="btn_1">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Benefite</th>
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                             
                                   
                                    $cno = 1;
                                    $buyerwhychoose = "SELECT * FROM tbl_buyer_whychooseb";
                                    $whychooseb = mysqli_query($conn,$buyerwhychoose);
                                    while ($row = mysqli_fetch_assoc($whychooseb)) {


                                ?>
                                        <tr>
                                            <th scope="row"> <a href="#" class="question_content"><?php echo $cno ?></a></th>
                                          
                                            <td><?php 
	
                    							$text=$row['benefite'];
                    							$rest = substr($text, 0, 30);
                    							
                    							if(strlen($text)<=30)
                    							{	echo $text;	}
                    							else
                    							{	echo stripslashes($rest)."...";	}
                    						
                    						?></td>
                                           
                                            <td>

                                                <form class="d-inline" onsubmit="return confirm('are you sure');">
                                                    <!-- delete -->
                                                    <input type="hidden" name="b_id" value="<?php echo $row['id'] ?>" />
                                                    <button type="submit" name="" id="" class="fas fa-trash-alt text-danger border border-0 bg-white">
                                                </form>&nbsp&nbsp
                                                <form class="d-inline" action="add-whychoose-benefite_b.php" method="get">
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