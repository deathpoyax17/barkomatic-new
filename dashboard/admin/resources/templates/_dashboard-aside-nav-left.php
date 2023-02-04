<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div class="navbar-brand m-auto">
            <?php if(isset($_SESSION['ship_logo']) && $_SESSION['ship_logo'] != '') { ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['ship_logo']); ?>" alt="LOGO" class="text-center">
            <?php } else if(isset($_SESSION['ship_name']) && $_SESSION['ship_name'] != '') { ?>
                <a href="index.php?page=dashboard" class="text-decoration-none font-weight-bold"><?php echo $_SESSION['ship_name']; ?></a>
            <?php } else { ?>
                <a href="index.php?page=dashboard" class="text-decoration-none font-weight-bold">ADMIN</a>
            <?php } ?>
        </div>
    </div>
    <div class="menu is-menu-main ">
        <p class="menu-label mb-0">General</p>
        <ul class="menu-list mb-1">
            <?php if($_GET['page'] == 'dashboard') { ?>
                    <li class="active">
            <?php } else { ?>
                    <li class="">
            <?php } ?>
            <a href="index.php?page=dashboard" class="text-decoration-none">
                <span class="icon "><i class="mdi mdi-desktop-mac "></i></span>
                <span class="menu-item-label ">Dashboard</span>
            </a>
            </li>
                <?php if($_GET['page'] == 'assign-staff') { ?>
                    <li class="active --set-active-tables-html ">
                <?php } else { ?>
                    <li class="--set-active-tables-html ">
                <?php } ?>
                    <a href="index.php?page=assign-staff" class="text-decoration-none">
                        <span class="icon"><i class="mdi mdi-account-check"></i></span>
                        <span>Shipping Owner Accounts</span>
                    </a>
            </li>
            </li>
                <?php if($_GET['page'] == 'tickets') { ?>
                    <li class="active --set-active-tables-html ">
                <?php } else { ?>
                    <li class="--set-active-tables-html ">
                <?php } ?>
                    <a href="index.php?page=tickets" class="text-decoration-none">
                        <span class="icon"><i class="mdi mdi-account-check"></i></span>
                        <span>Subscriptions</span>
                    </a>
            </li>
        </ul>
      
    </div>
</aside>