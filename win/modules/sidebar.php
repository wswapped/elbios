<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="#" class="waves-effect"><img src="<?php echo $currentUser->profile_picture;?>" alt="user-img" class="img-circle user-avatar"> <span class="hide-menu"> <?php echo $currentUserNames;?><span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li><a href="javascript:void(0)"><i class="ti-user"></i> <span class="hide-menu">My Profile</span></a></li>
                    <li><a href="javascript:void(0)"><i class="ti-email"></i> <span class="hide-menu">Inbox</span></a></li>
                    <li><a href="javascript:void(0)"><i class="ti-settings"></i> <span class="hide-menu">Account Setting</span></a></li>
                    <li><a href="logout"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a></li>
                </ul>
            </li>
            <li> <a href="home" class="waves-effect"><i  class="mdi mdi-home fa-fw"></i> <span class="hide-menu"> Home </span></a> </li>

            <?php
                if($currentUserType == 'admin'){
            ?>

                <li> <a href="products" class="waves-effect"><i  class="fas fa-capsules"></i> <span class="hide-menu"> Drugs & Materials </span></a> </li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart-outline fa-fw" data-icon="v"></i> <span class="hide-menu"> Inventory <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="products.html"><i class="fa-fw">P</i><span class="hide-menu">Products</span></a> </li>
                        <li> <a href="product-orders.html"><i class="fa-fw">PO</i><span class="hide-menu">Product Orders</span></a> </li>
                        <li> <a href="product-details.html"><i class="fa-fw">PD</i><span class="hide-menu">Product Details</span></a> </li>
                        <li> <a href="product-edit.html"><i class="fa-fw">PE</i><span class="hide-menu">Product Edit</span></a> </li>
                        <li> <a href="product-cart.html"><i class="fa-fw">PC</i><span class="hide-menu">Product Cart</span></a> </li>
                        <li> <a href="product-checkout.html"><i class="fa-fw">PC</i><span class="hide-menu">Product Checkout</span></a> </li>
                    </ul>
                </li>

                <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-basket fa-fw" data-icon="v"></i> <span class="hide-menu"> Orders <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="purchaseorders"><i class="mdi mdi-cart-plus"></i><span class="hide-menu">Purchase Orders</span></a> </li>
                        <li> <a href="product-edit.html"><i class="mdi mdi-cart-off"></i><span class="hide-menu">Sale orders</span></a> </li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Warehouses<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="chat.html"><i class="ti-comments-smiley fa-fw"></i><span class="hide-menu">Chat-message</span></a></li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-desktop fa-fw"></i><span class="hide-menu">Inbox</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li> <a href="inbox.html"><i class="ti-email fa-fw"></i><span class="hide-menu">Mail box</span></a></li>
                                <li> <a href="inbox-detail.html"><i class="ti-layout-media-left-alt fa-fw"></i><span class="hide-menu">Inbox detail</span></a></li>
                                <li> <a href="compose.html"><i class="ti-layout-media-center-alt fa-fw"></i><span class="hide-menu">Compose mail</span></a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-user fa-fw"></i><span class="hide-menu">Contacts</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li> <a href="contact.html"><i class="icon-people fa-fw"></i><span class="hide-menu">Contact1</span></a></li>
                                <li> <a href="contact2.html"><i class="icon-user-follow fa-fw"></i><span class="hide-menu">Contact2</span></a></li>
                                <li> <a href="contact-detail.html"><i class="icon-user-following fa-fw"></i><span class="hide-menu">Contact Detail</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="devider"></li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-outline fa-fw"></i> <span class="hide-menu">People<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="form-basic.html"><i class="fa-fw mdi mdi-basket-unfill"></i><span class="hide-menu">Clients</span></a></li>
                        <li><a href="suppliers"><i class="fa-fw mdi mdi-basket-fill"></i><span class="hide-menu">Suppliers</span></a></li>
                        <li><a href="form-advanced.html"><i class="fa-fw mdi mdi-truck-delivery"></i><span class="hide-menu">Transport</span></a></li>
                        <li><a href="form-material-elements.html"><i class="fa-fw mdi mdi-account"></i><span class="hide-menu">Warehouse users</span></a></li>
                    </ul>
                </li>
                <li><a href="receive" class="waves-effect"><i class="mdi mdi-truck fa-fw"></i> <span class="hide-menu">Receive</span></a></li>
            <?php
                }elseif ($currentUserType == 'supplier') {
                    ?>
                        <li><a href="supplierorders" class="waves-effect"><i class="mdi mdi-truck"></i> <span class="hide-menu">Orders</span></a></li>
                    <?php
                }
            ?>
            <li><a href="logout" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
            <li class="devider"></li>
            <li><a href="documentation" class="waves-effect"><i class="mdi mdi-note-multiple-outline"></i> <span class="hide-menu">Documentation</span></a></li>
            <!-- <li><a href="gallery.html" class="waves-effect"><i class="far fa-circle text-info"></i> <span class="hide-menu">Gallery</span></a></li> -->
            <li><a href="faq" class="waves-effect"><i class="far fa-circle text-success"></i> <span class="hide-menu">FAQs</span></a></li>
        </ul>
    </div>
</div>