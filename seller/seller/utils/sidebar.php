<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="../assets/images/users/profile.png" alt="user" />
                <!-- this is blinking heartbit-->
                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5><?php echo $_SESSION['names']; ?></h5>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <a href="logoff" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="logoff" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                    <!-- text-->
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-small-cap">NAVIGATION MENUS</li>
                <li style="background: #FFF;"> <a class="menu"  style="background:none;" 
                    href="stock">
                    <i class="fa fa-indent menu" aria-hidden="true"></i>
                    <span class="hide-menu">STOCK</span>
                    </a>
                </li>
                <li style="background: #FFF;"> <a class="menu"  style="background:none;color: #2B6ECE;"
                    href="dashboard?action=cooperatives">
                    <i class="fa fa-users menu" aria-hidden="true"></i>
                    <span class="hide-menu">AMAKOPERATIVE</span>
                    </a>
                </li>
                <li style="background: #FFF;"> <a class="menu"  style="background:none;color: #2B6ECE;"
                    href="dashboard?action=cooperatives">
                    <i class="fa fa-file menu" aria-hidden="true"></i>
                    <span class="hide-menu">AMAKURU</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>