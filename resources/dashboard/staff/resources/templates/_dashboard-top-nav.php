<nav id="navbar-main" style="align-items:unset;" class="navbar flex-nowrap p-0">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-brand">
        <a class="navbar-item">
            <?php if($_GET['page'] == 'dashboard') { ?>
                    <span class="icon"><i class="mdi mdi-desktop-mac" style="margin-left:90px;"></i> &nbsp;Dashboard</span>
            <?php } ?>
            <?php if($_GET['page'] == 'ports') { ?>
                    <span class="icon add-sched-hero-title" style="margin-left:50px;"><i class="mdi mdi-anchor"></i> &nbsp;Port Location</span>
            <?php } ?>
            <?php if($_GET['page'] == 'accomodation-type') { ?>
                    <span class="icon add-sched-hero-title" style="margin-left:90px;"><i class="mdi mdi-pencil-box-multiple"></i> &nbsp;Accomodation Type</span>
            <?php } ?>
            <?php if($_GET['page'] == 'add-schedules') { ?>
                    <span class="icon add-sched-hero-title" style="margin-left:40px;"><i class="mdi mdi-plus-thick"></i> &nbsp;Schedules</span>
            <?php } ?>
            <?php if($_GET['page'] == 'reservation-list') { ?>
                    <span class="icon add-sched-hero-title" style="margin-left:60px;"><i class="mdi mdi-calendar"></i> &nbsp;Reservation</span>
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
                <a class="navbar-link"></a>
            </div>
        </div>
        <button type="button" class="btn btn-danger" href="#" title="Signout" id="ship_stff_signout" class="navbar-item desktop-icon-only">
            Sign Out <i class="mdi mdi-logout"></i>
        </button>
    </div>
</nav>