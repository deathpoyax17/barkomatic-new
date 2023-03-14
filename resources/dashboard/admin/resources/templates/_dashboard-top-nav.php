<nav id="navbar-main" style="align-items:unset;" class="navbar flex-nowrap p-0">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-brand">
        <a class="navbar-item">
            <!-- <?php 
                if($_GET['page'] == 'dashboard') { ?>
                    <span class="icon"><i class="mdi mdi-desktop-mac" style="margin-left:90px;"></i> &nbsp;Dashboard</span>
            <?php } ?>
            <?php 
                if($_GET['page'] == 'assign-employee') { ?>
                    <span class="icon" style="margin-left:50px;"><i class="mdi mdi-account-check"></i> &nbsp;Assign Role</span>
            <?php } ?>
            <?php 
                if($_GET['page'] == 'passengers') { ?>
                    <span class="icon" style="margin-left:50px;"><i class="mdi mdi-account-multiple"></i> &nbsp;Passengers</span>
            <?php } ?>
            <?php 
                if($_GET['page'] == 'my_subscription') { ?>
                    <span class="icon" style="margin-left:80px;"><i class="mdi mdi-folder-edit-outline"></i> &nbsp;My Subscription</span>
            <?php } ?>
            <?php 
                if($_GET['page'] == 'discounts') { ?>
                    <span class="icon" style="margin-left:50px;"><i class="mdi mdi-tag-multiple"></i> &nbsp;Discounts</span>
            <?php } ?>
            <?php 
                if($_GET['page'] == 'promo') { ?>
                    <span class="icon" style="margin-left:40px;"><i class="mdi mdi-sale"></i> &nbsp;Promo</span>
            <?php } ?>
            
        </a>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item has-divider has-user-avatar">
                <a class="navbar-link">
                    <!-- <div class="user-avatar">
                        <img src="./resources/img/owner_logo/<?php //echo $_SESSION['profile_image']; ?>" alt="<?php //echo $_SESSION['shipping_name']; ?>" class="rounded-full">
                    </div>
                    <div class="is-user-name"><span><?php //echo $_SESSION['username']; ?></span></div> -->
                </a>
            </div>
            <button type="button" class="btn btn-danger" href="#" id="ship_ownr_signout" title="Signout" class="navbar-item desktop-icon-only text-decoration-none">
            Sign Out <i class="mdi mdi-logout"></i>
        </button>
        </div>
        <!-- <a title="Notifications" href="#" class="navbar-item has-divider desktop-icon-only text-decoration-none">
            <span class="icon"><i class="mdi mdi-bell-outline"></i></span>
            <span>Notifications</span>
        </a>
        <a title="Messages" href="#" class="navbar-item has-divider desktop-icon-only text-decoration-none">
            <span class="icon"><i class="mdi mdi-email-outline"></i></span>
            <span>Messages</span>
        </a> -->
    </div>
</nav>