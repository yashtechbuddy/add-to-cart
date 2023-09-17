<?php
include 'includes/header.php';
include 'includes/side-bar.php';
include 'includes/top-bar.php';

?>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center" id='main'>
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="">
                            <!-- count class for count -->
                            <div class="col-12">
                                <div class="quick_activity_wrap ">
                                    <div class="single_quick_activity <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
                                        <h4>USERS</h4>
                                        <h3><span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALUSER FROM tbl_user';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALUSER'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    <div class="single_quick_activity <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?> ">
                                        <h4>DEPARTMENTS</h4>
                                        <h3> <span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALUSER FROM tbl_dept';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALUSER'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    <div class="single_quick_activity <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
                                        <h4>ROLES</h4>
                                        <h3><span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALUSER FROM tbl_role';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALUSER'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    <div class="single_quick_activity <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
                                        <h4>Customer</h4>
                                        <h3><span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as customer FROM tbl_customer';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['customer'], 2, '.', '');
                                                            echo $row['customer'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                <div class="single_quick_activity <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
                                        <h4>PRODUCTS</h4>
                                        <h3><span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as products FROM tbl_product';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['products'], 2, '.', '');
                                                            echo $row['products'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    <div class="single_quick_activity <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
                                        <h4>SUPPLIER</h4>
                                        <h3><span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALSUPPLIER FROM tbl_supplier';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALSUPPLIER'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    <div class="single_quick_activity <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
                                        <h4>INQUIRY</h4>
                                        <h3> <span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALINQUERY FROM tbl_inquiry';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALINQUERY'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    
                                    <div class="single_quick_activity  <?php if($_SESSION['dept_id'] != 1){ echo "d-none"; } ?>">
                                        <h4>SUPPLIER REQUEST</h4>
                                        <h3> <span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALREQUEST FROM tbl_supplier_request';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALREQUEST'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                   
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                     
                                    <div class="single_quick_activity">
                                        <h4>PENDING</h4>
                                        <h3> <span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALREQUEST FROM tbl_supplier_request WHERE status_id=1';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALREQUEST'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    
                                      <div class="single_quick_activity">
                                        <h4>IN PROCESS </h4>
                                        <h3> <span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALREQUEST FROM tbl_supplier_request WHERE status_id=2';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALREQUEST'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                    
                                     <div class="single_quick_activity">
                                        <h4>VERIFIED</h4>
                                        <h3> <span class=""><?php
                                                            $SelectUser = 'SELECT COUNT(*) as TOTALREQUEST FROM tbl_supplier_request WHERE status_id=4';
                                                            $result = mysqli_query($conn, $SelectUser);
                                                            $row = mysqli_fetch_assoc($result);
                                                            // echo number_format((float)$row['TOTALUSER'], 2, '.', '');
                                                            echo $row['TOTALREQUEST'];
                                                            ?></span> </h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12 col-xl-6">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block ">
                        <div class="main-title">
                            <h3 class="mb-0">AP and AR Balance</h3>
                            <span>Avg. $5,309</span>
                        </div>
                        <div class="box_select d-flex">
                            <select class="nice_Select2 mr_5">
                                <option value="1">Monthly</option>
                                <option value="1">Monthly</option>
                            </select>
                            <select class="nice_Select2 ">
                                <option value="1">Last Year</option>
                                <option value="1">this Year</option>
                            </select>
                        </div>
                    </div>
                    <div id="bar_active"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 ">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">% of Income Budget</h3>
                        </div>
                    </div>
                    <div id="radial_2"></div>
                    <div class="radial_footer">
                        <div class="radial_footer_inner d-flex justify-content-between">
                            <div class="left_footer">
                                <h5> <span style="background-color: #EDECFE;"></span> Blance</h5>
                                <p>-$18,570</p>
                            </div>
                            <div class="left_footer">
                                <h5> <span style="background-color: #A4A1FB;"></span> Blance</h5>
                                <p>$31,430</p>
                            </div>
                        </div>
                        <div class="radial_bottom">
                            <p><a href="#">View Full Report</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="white_box min_430">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">% of Expenses Budget</h3>
                        </div>
                    </div>
                    <div id="radial_1"></div>
                    <div class="radial_footer">
                        <div class="radial_footer_inner d-flex justify-content-between">
                            <div class="left_footer">
                                <h5> <span style="background-color: #EDECFE;"></span> Blance</h5>
                                <p>-$18,570</p>
                            </div>
                            <div class="left_footer">
                                <h5> <span style="background-color: #A4A1FB;"></span> Blance</h5>
                                <p>$31,430</p>
                            </div>
                        </div>
                        <div class="radial_bottom">
                            <p><a href="#">View Full Report</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">EBIT (Earnings Before Interest & Tax)</h3>
                        </div>
                    </div>
                    <canvas height="200" id="visit-sale-chart"></canvas>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6">
                <div class="white_box mb_30 min_430">
                    <div class="box_header  box_header_block align-items- ">
                        <div class="main-title">
                            <h3 class="mb-0">Cost of goods / Services</h3>
                        </div>
                        <div class="title_info">
                            <p>1 Jan 2020 to 31 Dec 2020 <br>
                            <div class="legend_style text-end">
                                <li> <span style="background-color: #A4A1FB;"></span> Services</li>
                                <li class="inactive"> <span style="background-color: #A4A1FB;"></span> Avarage</li>
                            </div>
                            </p>
                        </div>
                    </div>
                    <canvas height="200" id="visit-sale-chart2"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="white_box mb_30 min_400">
                    <div class="box_header ">
                        <div class="main-title">
                            <h3 class="mb-0">Disputed vs Overdue Invoices</h3>
                        </div>
                    </div>
                    <canvas height="220px" id="doughutChart"></canvas>
                    <div class="legend_style mt_10px ">
                        <li class="d-block"> <span style="background-color: #DF67C1;"></span> Disputed Invoices</li>
                        <li class="d-block"> <span style="background-color: #6AE0BD;"></span> Avarage</li>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="white_box mb_30 min_400 ">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">Disputed Invoices</h3>
                        </div>
                        <div class="legend_style mt-10">
                            <li> <span></span> Disputed Invoices</li>
                            <li class="inactive"> <span></span> Avarage</li>
                        </div>
                    </div>
                    <div class="title_btn">
                        <ul>
                            <li><a class="active" href="#">All time</a></li>
                            <li><a href="#">This year</a></li>
                            <li><a href="#">This week</a></li>
                            <li><a href="#">Today</a></li>
                        </ul>
                    </div>
                    <canvas height="120px" id="sales-chart"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3">
                <div class="white_box mb_30 min_400">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">Disputed vs Overdue Invoices</h3>
                        </div>
                    </div>
                    <canvas height="220px" id="doughutChart2"></canvas>
                    <div class="legend_style legend_style_grid mt_10px">
                        <li class="d-block"> <span style="background-color: #FF7B36;"></span> 30 Days</li>
                        <li class="d-block"> <span style="background-color: #E8205E;"></span> 60 Days</li>
                        <li class="d-block"> <span style="background-color: #3B76EF"></span> 90 Days</li>
                        <li class="d-block"> <span style="background-color:#00BFBF;"></span> 90+Days</li>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="white_box min_400">
                    <div class="box_header  box_header_block">
                        <div class="main-title">
                            <h3 class="mb-0">EBIT (Earnings Before Interest & Tax)</h3>
                        </div>
                        <div class="title_info">
                            <p>1 Jan 2020 to 31 Dec 2020</p>
                        </div>
                    </div>
                    <div id="area_active"></div>
                </div>
            </div>
            <div class="col-lg-4"> -->
            <!-- <div class="white_box mb_30 min_400">
                    <div class="box_header ">
                        <div class="main-title">
                            <h3 class="mb-0">Inventory Turnover</h3>
                        </div>
                    </div>
                    <div id="stackbar_active"></div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>