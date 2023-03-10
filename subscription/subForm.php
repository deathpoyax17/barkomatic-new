<?php
// Include configuration file 
include_once 'config.php'; 
session_start();
// Start session

if(isset($_SESSION['alt_owner_id']) && $_SESSION['alt_owner_id'] != NULL){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barkomatic - Online Ticketing</title>
    <link rel="icon" href="../img/core-img/favicon.png">
    <link rel="stylesheet" href="../css/default-assets/main.css?version=barkomatic">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header class="header-area">
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="top-header-content">
                            <a href="#"><i class="icon_mail"></i> <span>barkomatic@barkomatic.xyz</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <nav class="classy-navbar justify-content-between" id="robertoNav">
                        <a class="nav-brand mr-0" href="barkomatic.xyz">
                            <img src="../img/core-img/logo.png" alt="BarkoMatic">
                        </a>
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div class="classy-menu">
                            <div class="classycloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="barkomatic.xyz">Home</a></li>
                                    <li class="cn-dropdown-item has-down">
                                        <a href="#">How to Book</a>
                                        <ul class="dropdown" style="background-color: #09527F;">
                                            <li><a href="passenger.html">- Passenger</a></li>
                                            <li><a href="rollings-cargo.html">- Rollings Cargo</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li class="cn-dropdown-item has-down">
                                        <a href="#">About Us</a>
                                        <ul class="dropdown" style="background-color: #09527F;">
                                            <li><a href="faq.html">- FAQ</a></li>
                                            <li><a href="about.html">- About Us</a></li>
                                            <li><a href="ticket-agent.html">- Ticket Agent</a></li>
                                            <li><a href="blog.html">- Blog</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
<div class="container">
	<!-- Contenedor -->
	<div class="pricing-wrapper clearfix">
		<!-- Titulo -->
		
		<div class="pricing-table">
			<h3 class="pricing-title">Basic</h3>
			<div class="price">P 2,000<sup>/ Month</sup></div>
			<!-- Lista de Caracteristicas / Propiedades -->
			<ul class="table-list">
				<li>2 / Months <span>Membership</span></li>
				<li>Hired Staff <span class="unlimited">1</span></li>
				<li>Revenue up to <span>P 3,000</span></li>
				<!--<li>25 GB <span>De transferencia mensual</span></li>-->
				<!--<li>Base de datos <span class="unlimited">ilimitadas</span></li>-->
				<!--<li>Cuentas de correo <span class="unlimited">ilimitadas</span></li>-->
				<!--<li>CPanel <span>incluido</span></li>-->
			</ul>
			<!-- Contratar / Comprar -->
			<div class="table-buy">
				<p>P 2,000<sup>/ Month</sup></p>
				
				<!--<a href="#" class="pricing-action">Proceed</a>-->
				
							
				<form action="<?php echo PAYPAL_URL; ?>" method="post">
				<!-- Identify your business so that you can collect the payments -->
				<input type="hidden" name="business" value="<?php echo PAYPAL_EMAIL; ?>">
				<!-- Specify a subscriptions button. -->
				<input type="hidden" name="cmd" value="_xclick-subscriptions">
				<!-- Specify details about the subscription that buyers will purchase -->
				<input type="hidden" name="item_name" id="item_name" value="Premium Subscription">
				<input type="hidden" name="item_number" id="item_number" value="PREM001">
				<input type="hidden" name="currency_code" value="PHP">
				<input type="hidden" name="a3" id="item_price" value="9.99">
				<input type="hidden" name="p3" id="interval_count" value="1">
				<input type="hidden" name="t3" id="interval" value="M">
				<input type="hidden" name="src" value="1">
				<input type="hidden" name="srt" value="52">
				<!-- Custom variable user ID -->
				<input type="hidden" name="custom" value="<?php echo $_SESSION['alt_owner_id']; ?>">
				<!-- Specify urls -->
				<input type="hidden" name="cancel_return" value="<?php echo CANCEL_URL; ?>">
				<input type="hidden" name="return" value="<?php echo RETURN_URL; ?>">
				<input type="hidden" name="notify_url" value="<?php echo NOTIFY_URL; ?>">
				<!-- Display the payment button -->
				<input class="pricing-action" type="submit" value="Buy Subscription">
			</form>
			</div>
		</div>
		
		<div class="pricing-table recommended">
			<h3 class="pricing-title">Premium</h3>
			<div class="price">P 3,000<sup>/ Month</sup></div>
			<!-- Lista de Caracteristicas / Propiedades -->
			<ul class="table-list">
				<li>6 / Months <span>Membership</span></li>
				<li>Hired Staff <span class="unlimited">3</span></li>
				<li>Revenue up to <span>P 5,000</span></li>
				<!--<li>Base de datos <span class="unlimited">ilimitadas</span></li>-->
				<!--<li>Cuentas de correo <span class="unlimited">ilimitadas</span></li>-->
				<!--<li>CPanel <span>incluido</span></li>-->
			</ul>
			<!-- Contratar / Comprar -->
			<div class="table-buy">
				<p>P 3,000<sup>/ Month</sup></p>
				<!--<a href="#" class="pricing-action">Proceed</a>-->
				<form action="<?php echo PAYPAL_URL; ?>" method="post">
    <!-- Identify your business so that you can collect the payments -->
    <input type="hidden" name="business" value="<?php echo PAYPAL_EMAIL; ?>">
    <!-- Specify a subscriptions button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- Specify details about the subscription that buyers will purchase -->
	<input type="hidden" name="item_name" id="item_name" value="Premium Subscription">
    <input type="hidden" name="item_number" id="item_number" value="PREM002">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="a3" id="item_price" value="100">
    <input type="hidden" name="p3" id="interval_count" value="1">
    <input type="hidden" name="t3" id="interval" value="M">
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="srt" value="52">
    <!-- Custom variable user ID -->
    <input type="hidden" name="custom" value="<?php echo $_SESSION['alt_owner_id']; ?>">
    <!-- Specify urls -->
    <input type="hidden" name="cancel_return" value="<?php echo CANCEL_URL; ?>">
    <input type="hidden" name="return" value="<?php echo RETURN_URL; ?>">
    <input type="hidden" name="notify_url" value="<?php echo NOTIFY_URL; ?>">
    <!-- Display the payment button -->
	<input class="pricing-action" type="submit" value="Buy Subscription">
</form>
			</div>
		</div>
	
		<div class="pricing-table">
			<h3 class="pricing-title">Ultimate</h3>
			<div class="price">P 5,000<sup>/ Month</sup></div>
			
			<!-- Lista de Caracteristicas / Propiedades -->
			<ul class="table-list">
				<li>12 / Months <span>Membership</span></li>
				<li>Hired Staff <span class="unlimited">Unlimited</span></li>
				<li>Revenue up to <span>P 10,000</span></li>
				<!--<li>100 GB <span>De transferencia mensual</span></li>-->
				<!--<li>Base de datos <span class="unlimited">ilimitadas</span></li>-->
				<!--<li>Cuentas de correo <span class="unlimited">ilimitadas</span></li>-->
				<!--<li>CPanel <span>incluido</span></li>-->
			</ul>
			<!-- Contratar / Comprar -->
			<div class="table-buy">
				<p>P 5,000<sup>/ Month</sup></p>
				<!--<a href="#" class="pricing-action">Proceed</a>-->
						
				<form action="<?php echo PAYPAL_URL; ?>" method="post">
    <!-- Identify your business so that you can collect the payments -->
    <input type="hidden" name="business" value="<?php echo PAYPAL_EMAIL; ?>">
    <!-- Specify a subscriptions button. -->
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!-- Specify details about the subscription that buyers will purchase -->
	<input type="hidden" name="item_name" id="item_name" value="Premium Subscription">
    <input type="hidden" name="item_number" id="item_number" value="PREM003">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="a3" id="item_price" value="800">
    <input type="hidden" name="p3" id="interval_count" value="1">
    <input type="hidden" name="t3" id="interval" value="M">
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="srt" value="52">
    <!-- Custom variable user ID -->
    <input type="hidden" name="custom" value="<?php echo $_SESSION['alt_owner_id']; ?>">
    <!-- Specify urls -->
    <input type="hidden" name="cancel_return" value="<?php echo CANCEL_URL; ?>">
    <input type="hidden" name="return" value="<?php echo RETURN_URL; ?>">
    <input type="hidden" name="notify_url" value="<?php echo NOTIFY_URL; ?>">
    <!-- Display the payment button -->
	<input class="pricing-action" type="submit" value="Buy Subscription">
</form>
			</div>
		</div>
	
	
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="footer-area section-padding-80-0">
            <div class="main-footer-area">
                <div class="container">
                    <div class="row align-items-baseline ">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single-footer-widget mb-80">
                                <a href="#" class="footer-logo"><img src="img/core-img/logo.png" alt=""></a>
                                <p>Email Us</p>
                                <h4>barkomatic2021@gmail.com<h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copywrite-content">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8">
                            <div class="copywrite-text">
                                <p>Copyright &copy;
                                    <script>document.write(new Date().getFullYear());</script> 
                                    All rights reserved | Barkomatic</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>
<?php
}
else{
    echo "BAD GATEWAY";
}
?>