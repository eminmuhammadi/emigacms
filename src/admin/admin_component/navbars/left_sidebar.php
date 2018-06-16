<!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                <li class="nav-devider"></li>
                        <li> <a class="has-arrow" aria-expanded="false">
                        <i class="fa fa-bar-chart "></i><span class="hide-menu">Dashboard</span></a>
                        <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/dashboard.php">Analytics</a></li>
            
                        </ul>
                        </li>


                <li class="nav-devider"></li>
                <li> <a class="has-arrow" aria-expanded="false">
                <i class="fa fa-pencil-square-o"></i><span class="hide-menu">Post</span></a>
                        <ul aria-expanded="false" class="collapse">

                                <li><a href="/admin/allpost.php">All Posts</a></li>
                                <li><a href="/admin/addpost.php">Add Post</a></li>
                                

                        </ul>
                        </li>

                    <li class="nav-devider"></li>
                        <li> <a class="has-arrow" aria-expanded="false">
                        <i class="fa fa-file-text-o"></i><span class="hide-menu">Category</span></a>
                        <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/allcategory.php">All Category</a></li>
                                <li><a href="/admin/addcategory.php">Add Category</a></li>
            
                        </ul>
                        </li>


                    <li class="nav-devider"></li>
                        <li> <a class="has-arrow" aria-expanded="false">
                        <i class="fa fa-group"></i><span class="hide-menu">Profile</span></a>
                        <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/editprofile/<?php echo $_SESSION['username'];?>">Edit Profile</a></li>
                                <li><a href="/admin/logout.php">Logout</a></li>
            
                        </ul>
                        </li>












                    
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->