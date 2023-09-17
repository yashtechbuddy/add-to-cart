<section class="main_content dashboard_part">
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area">
                        <div class="search_inner">
                            <!-- <form action="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search here...">
                                </div>
                                <button type="submit"> <img src="assets/img/icon/icon_search.svg" alt> </button>
                            </form> -->
                            <!-- <h5>Dashboard</h5> -->
                        </div>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <!-- <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <a href="#"> <img src="assets/img/icon/bell.svg" alt> </a>
                            </li>
                            <li>
                                <a href="#"> <img src="assets/img/icon/msg.svg" alt> </a>
                            </li>
                        </div> -->
                        <div class="profile_info">
                            <img src="images/user.png" alt="#">
                            <div class="profile_info_iner">

                                <p>Welcome Admin!</p>
                                <h5><?php if ((isset($_SESSION['admin_id'])) && (isset($_SESSION['admin_username']))) {
                                        echo $_SESSION['admin_username'];
                                    }
                                    ?></h5>
                                <div class="profile_info_details">
                                    <!-- <a href="#">My Profile <i class="ti-user"></i></a> -->
                                    <a href="profile-setting.php">Profile Settings <i class="ti-settings"></i></a>
                                    <!--<a href="manage-admin.php">Users<i class="ti-user"></i></a>-->
                                    <a href="logout.php">Log Out <i class="ti-shift-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>