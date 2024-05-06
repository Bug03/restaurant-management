<?php
require_once '../functions.php';

session_start();
if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
};

if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
}

if (isset($_GET['Message']) && !empty($_GET['Message'])) {
    $message = $_GET['Message'];
    echo "<script>alert('$message');</script>";
//    echo "<script>window.location.href='/';</script>";
}

$collection = new Database("RestaurantManagement");
$order = $collection->findAll("Order");
$totalPricePaid = 0;
$totalPriceOrder = 0;
foreach($order as $item) {
    if ($item['paymentStatus'] == 'Paid'){
        $totalPricePaid += (int)$item['total'];
    }
    $totalPriceOrder += (int)$item['total'];
}



?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Site Title -->
		<title>Sherah - HTML eCommerce Dashboard Template</title>

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 

		<!-- Fav Icon -->
		<link rel="icon" href="img/favicon.png">
		
		<!-- sherah Stylesheet -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome-all.min.css">
		<link rel="stylesheet" href="css/charts.min.css">
		<link rel="stylesheet" href="css/datatables.min.css">
		<link rel="stylesheet" href="css/jvector-map.css">
		<link rel="stylesheet" href="css/slickslider.min.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="style.css">
		
	</head>
	<body id="sherah-dark-light">
	
		<div class="sherah-body-area">
			<!-- sherah Admin Menu -->
			<div class="sherah-smenu">
				<!-- Admin Menu -->
				<div class="admin-menu">

					<!-- Logo -->
					<div class="logo sherah-sidebar-padding">
						<a href="index.html">
							<img class="sherah-logo__main" src="img/logo.png" alt="#">
						</a>
						<div class="sherah__sicon close-icon d-xl-none">
							<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.19855 7.41927C4.22908 5.52503 2.34913 3.72698 0.487273 1.90989C0.274898 1.70227 0.0977597 1.40419 0.026333 1.11848C-0.0746168 0.717537 0.122521 0.36707 0.483464 0.154695C0.856788 -0.0643475 1.24249 -0.0519669 1.60248 0.199455C1.73105 0.289929 1.84438 0.404212 1.95771 0.514685C4.00528 2.48321 6.05189 4.45173 8.09755 6.4212C8.82896 7.12499 8.83372 7.6145 8.11565 8.30687C6.05856 10.2878 4.00052 12.2677 1.94152 14.2467C1.82724 14.3562 1.71391 14.4696 1.58439 14.5591C1.17773 14.841 0.615842 14.781 0.27966 14.4324C-0.056522 14.0829 -0.0946163 13.5191 0.202519 13.1248C0.296802 12.9991 0.415847 12.8915 0.530129 12.781C2.29104 11.0868 4.05194 9.39351 5.81571 7.70212C5.91761 7.60593 6.04332 7.53355 6.19855 7.41927Z"></path>
							</svg>		
						</div>
					</div>
					<!-- Main Menu -->
					<div class="admin-menu__one sherah-sidebar-padding">
						<!-- Nav Menu -->
						<div class="menu-bar">
							<ul class="menu-bar__one sherah-dashboard-menu" id="sherahMenu">
								<li><a  href="#!" data-bs-toggle="collapse" data-bs-target="#menu-item_home"><span class="menu-bar__text">
									<span class="sherah-menu-icon sherah-svg-icon__v1">
										<svg  class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="18.075" height="18.075" viewBox="0 0 18.075 18.075">
											<g id="Icon" transform="translate(0 0)">
											  <path id="Path_29" data-name="Path 29" d="M6.966,6.025H1.318A1.319,1.319,0,0,1,0,4.707V1.318A1.319,1.319,0,0,1,1.318,0H6.966A1.319,1.319,0,0,1,8.284,1.318V4.707A1.319,1.319,0,0,1,6.966,6.025ZM1.318,1.13a.188.188,0,0,0-.188.188V4.707a.188.188,0,0,0,.188.188H6.966a.188.188,0,0,0,.188-.188V1.318a.188.188,0,0,0-.188-.188Zm0,0"/>
											  <path id="Path_30" data-name="Path 30" d="M6.966,223.876H1.318A1.319,1.319,0,0,1,0,222.558V214.65a1.319,1.319,0,0,1,1.318-1.318H6.966a1.319,1.319,0,0,1,1.318,1.318v7.908A1.319,1.319,0,0,1,6.966,223.876Zm-5.648-9.414a.188.188,0,0,0-.188.188v7.908a.188.188,0,0,0,.188.188H6.966a.188.188,0,0,0,.188-.188V214.65a.188.188,0,0,0-.188-.188Zm0,0" transform="translate(0 -205.801)"/>
											  <path id="Path_31" data-name="Path 31" d="M284.3,347.357H278.65a1.319,1.319,0,0,1-1.318-1.318V342.65a1.319,1.319,0,0,1,1.318-1.318H284.3a1.319,1.319,0,0,1,1.318,1.318v3.389A1.319,1.319,0,0,1,284.3,347.357Zm-5.648-4.9a.188.188,0,0,0-.188.188v3.389a.188.188,0,0,0,.188.188H284.3a.188.188,0,0,0,.188-.188V342.65a.188.188,0,0,0-.188-.188Zm0,0" transform="translate(-267.542 -329.282)"/>
											  <path id="Path_32" data-name="Path 32" d="M284.3,10.544H278.65a1.319,1.319,0,0,1-1.318-1.318V1.318A1.319,1.319,0,0,1,278.65,0H284.3a1.319,1.319,0,0,1,1.318,1.318V9.226A1.319,1.319,0,0,1,284.3,10.544ZM278.65,1.13a.188.188,0,0,0-.188.188V9.226a.188.188,0,0,0,.188.188H284.3a.188.188,0,0,0,.188-.188V1.318a.188.188,0,0,0-.188-.188Zm0,0" transform="translate(-267.542)"/>
											</g>
										</svg>
									</span>
									<span class="menu-bar__name">Dashboard</span></span></a></span>
								</li>
								<li><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__customers"><span class="menu-bar__text">
									<span class="sherah-menu-icon sherah-svg-icon__v1">
										<svg class="sherah-svg-icon"  xmlns="http://www.w3.org/2000/svg" width="21.732" height="18" viewBox="0 0 21.732 18">
											<g id="Icon" transform="translate(-525.662 -352.927)">
											  <path id="Path_208" data-name="Path 208" d="M536.507,455.982q-4.327,0-8.654,0a1.953,1.953,0,0,1-2.188-2.2c0-.99-.005-1.979,0-2.969a3.176,3.176,0,0,1,3.309-3.315c.875,0,1.749.052,2.624.062a.451.451,0,0,0,.33-.168,3.237,3.237,0,0,1,2.94-1.527q1.654.024,3.309,0a3.262,3.262,0,0,1,2.947,1.52.621.621,0,0,0,.449.153,30.091,30.091,0,0,1,3.212.044,3.044,3.044,0,0,1,2.594,3.014c.021,1.117.014,2.234.005,3.351a1.909,1.909,0,0,1-2.054,2.032Q540.919,455.989,536.507,455.982Zm3.812-1.288c0-.187,0-.326,0-.465-.008-1.781.026-3.564-.042-5.342a1.8,1.8,0,0,0-1.929-1.74c-1.131-.012-2.263,0-3.394,0a1.961,1.961,0,0,0-2.22,2.212q0,2.439,0,4.878v.46Zm-8.89.011c.013-.11.026-.165.026-.22,0-1.781-.006-3.562.009-5.343,0-.337-.178-.37-.422-.37-.749,0-1.5-.024-2.248.006a1.849,1.849,0,0,0-1.837,1.763c-.044,1.172-.022,2.346-.013,3.519a.581.581,0,0,0,.6.639C528.826,454.716,530.111,454.705,531.429,454.705Zm10.165-.005c1.354,0,2.664.018,3.974-.011.377-.008.544-.315.544-.688,0-1.117.017-2.234-.007-3.35a1.867,1.867,0,0,0-1.823-1.87c-.762-.035-1.526,0-2.29-.01-.3,0-.41.114-.406.431.017,1.4.007,2.8.007,4.2Z" transform="translate(0 -85.056)"/>
											  <path id="Path_209" data-name="Path 209" d="M609.243,356.712a3.775,3.775,0,1,1,3.788,3.764A3.775,3.775,0,0,1,609.243,356.712Zm1.279-.076a2.5,2.5,0,1,0,2.611-2.434A2.5,2.5,0,0,0,610.523,356.636Z" transform="translate(-76.492)"/>
											  <path id="Path_210" data-name="Path 210" d="M548.151,397.022a2.819,2.819,0,1,1-2.842-2.82A2.827,2.827,0,0,1,548.151,397.022Zm-1.278.023a1.542,1.542,0,1,0-1.531,1.542A1.548,1.548,0,0,0,546.873,397.045Z" transform="translate(-15.421 -37.775)"/>
											  <path id="Path_211" data-name="Path 211" d="M698.51,397.045a2.819,2.819,0,1,1,2.839,2.819A2.831,2.831,0,0,1,698.51,397.045Zm4.361.032a1.542,1.542,0,1,0-1.56,1.512A1.55,1.55,0,0,0,702.871,397.076Z" transform="translate(-158.187 -37.776)"/>
											</g>
										</svg>
									</span>
									<span class="menu-bar__name">Users</span></span> <span class="sherah__toggle"></span></a></span>
									<!-- Dropdown Menu -->
									<div class="collapse sherah__dropdown" id="menu-item__customers"  data-bs-parent="#sherahMenu">
										<ul class="menu-bar__one-dropdown">
											<li><a href="user-list.php"><span class="menu-bar__text"><span class="menu-bar__name">Users</span></span></a></li>
											<li><a href="upload-user.php"><span class="menu-bar__text"><span class="menu-bar__name">New User</span></span></a></li>
										  </ul>
									</div>
								</li>
                                <li><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__admin"><span class="menu-bar__text">
									<span class="sherah-menu-icon sherah-svg-icon__v1">
										<svg class="sherah-svg-icon"  xmlns="http://www.w3.org/2000/svg" width="21.732" height="18" viewBox="0 0 21.732 18">
											<g id="Icon" transform="translate(-525.662 -352.927)">
											  <path id="Path_208" data-name="Path 208" d="M536.507,455.982q-4.327,0-8.654,0a1.953,1.953,0,0,1-2.188-2.2c0-.99-.005-1.979,0-2.969a3.176,3.176,0,0,1,3.309-3.315c.875,0,1.749.052,2.624.062a.451.451,0,0,0,.33-.168,3.237,3.237,0,0,1,2.94-1.527q1.654.024,3.309,0a3.262,3.262,0,0,1,2.947,1.52.621.621,0,0,0,.449.153,30.091,30.091,0,0,1,3.212.044,3.044,3.044,0,0,1,2.594,3.014c.021,1.117.014,2.234.005,3.351a1.909,1.909,0,0,1-2.054,2.032Q540.919,455.989,536.507,455.982Zm3.812-1.288c0-.187,0-.326,0-.465-.008-1.781.026-3.564-.042-5.342a1.8,1.8,0,0,0-1.929-1.74c-1.131-.012-2.263,0-3.394,0a1.961,1.961,0,0,0-2.22,2.212q0,2.439,0,4.878v.46Zm-8.89.011c.013-.11.026-.165.026-.22,0-1.781-.006-3.562.009-5.343,0-.337-.178-.37-.422-.37-.749,0-1.5-.024-2.248.006a1.849,1.849,0,0,0-1.837,1.763c-.044,1.172-.022,2.346-.013,3.519a.581.581,0,0,0,.6.639C528.826,454.716,530.111,454.705,531.429,454.705Zm10.165-.005c1.354,0,2.664.018,3.974-.011.377-.008.544-.315.544-.688,0-1.117.017-2.234-.007-3.35a1.867,1.867,0,0,0-1.823-1.87c-.762-.035-1.526,0-2.29-.01-.3,0-.41.114-.406.431.017,1.4.007,2.8.007,4.2Z" transform="translate(0 -85.056)"/>
											  <path id="Path_209" data-name="Path 209" d="M609.243,356.712a3.775,3.775,0,1,1,3.788,3.764A3.775,3.775,0,0,1,609.243,356.712Zm1.279-.076a2.5,2.5,0,1,0,2.611-2.434A2.5,2.5,0,0,0,610.523,356.636Z" transform="translate(-76.492)"/>
											  <path id="Path_210" data-name="Path 210" d="M548.151,397.022a2.819,2.819,0,1,1-2.842-2.82A2.827,2.827,0,0,1,548.151,397.022Zm-1.278.023a1.542,1.542,0,1,0-1.531,1.542A1.548,1.548,0,0,0,546.873,397.045Z" transform="translate(-15.421 -37.775)"/>
											  <path id="Path_211" data-name="Path 211" d="M698.51,397.045a2.819,2.819,0,1,1,2.839,2.819A2.831,2.831,0,0,1,698.51,397.045Zm4.361.032a1.542,1.542,0,1,0-1.56,1.512A1.55,1.55,0,0,0,702.871,397.076Z" transform="translate(-158.187 -37.776)"/>
											</g>
										</svg>
									</span>
									<span class="menu-bar__name">Admin</span></span> <span class="sherah__toggle"></span></a></span>
                                    <!-- Dropdown Menu -->
                                    <div class="collapse sherah__dropdown" id="menu-item__admin"  data-bs-parent="#sherahMenu">
                                        <ul class="menu-bar__one-dropdown">
                                            <li><a href="admin-list.php"><span class="menu-bar__text"><span class="menu-bar__name">Admin</span></span></a></li>
                                            <li><a href="upload-admin.php"><span class="menu-bar__text"><span class="menu-bar__name">New Admin</span></span></a></li>
                                        </ul>
                                    </div>
                                </li>
								<li><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item_products"><span class="menu-bar__text">
									<span class="sherah-menu-icon sherah-svg-icon__v1">
										<svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="21.136" height="17.873" viewBox="0 0 21.136 17.873">
											<path id="Path_218" data-name="Path 218" d="M558.766,384.526c.177-.092.32-.164.46-.24l6.468-3.491a1.9,1.9,0,0,1,.368-.179.506.506,0,0,1,.632.248.487.487,0,0,1-.127.656,1.743,1.743,0,0,1-.315.191c-2.517,1.359-5.038,2.712-7.549,4.083a.98.98,0,0,1-1.036.012q-3.781-1.986-7.582-3.934a.811.811,0,0,1-.505-.831c.02-1.3,0-2.6.014-3.9a.486.486,0,0,0-.3-.508c-.45-.232-.889-.486-1.326-.742a.539.539,0,0,1-.221-.877c.62-.926,1.244-1.849,1.883-2.762a1.17,1.17,0,0,1,.442-.344c2.561-1.246,5.127-2.482,7.688-3.728a.879.879,0,0,1,.822-.01c2.568,1.2,5.143,2.387,7.709,3.591a1.24,1.24,0,0,1,.478.42c.61.916,1.2,1.844,1.794,2.771.3.463.23.71-.265.989q-3.631,2.046-7.265,4.086c-.454.255-.643.212-.981-.2-.412-.5-.823-1.011-1.292-1.587Zm-7.409-12.033c.133.076.214.126.3.17,2.065,1.073,4.133,2.141,6.191,3.225a.625.625,0,0,0,.674-.018c2.031-1.106,4.069-2.2,6.1-3.3.118-.064.232-.133.367-.21a1.6,1.6,0,0,0-.164-.106c-2.124-.986-4.246-1.977-6.378-2.945a.814.814,0,0,0-.6.038c-2.04.971-4.071,1.96-6.1,2.945C551.626,372.349,551.511,372.412,551.357,372.492Zm-.688,4.945c0,1.092.01,2.129-.007,3.165a.5.5,0,0,0,.321.528c2.093,1.074,4.179,2.162,6.267,3.245.1.054.216.1.344.152v-6.293l-1.263,1.551c-.386.473-.552.507-1.076.212q-2.074-1.166-4.147-2.334C550.982,377.593,550.85,377.53,550.668,377.438Zm10.08,1.529,6.694-3.769-1.4-2.171-7.033,3.792Zm-3.4-2.142-7.037-3.652-1.38,2.033,6.683,3.76Z" transform="translate(-547.61 -368.076)"/>
										</svg>										  
									</span>
									<span class="menu-bar__name">Products</span></span> <span class="sherah__toggle"></span></a></span>
									<!-- Dropdown Menu -->
									<div class="collapse sherah__dropdown" id="menu-item_products" data-bs-parent="#sherahMenu">
										<ul class="menu-bar__one-dropdown">
											<li><a href="products.php"><span class="menu-bar__text"><span class="menu-bar__name">Products</span></span></a></li>
											<li><a href="upload-product.php"><span class="menu-bar__text"><span class="menu-bar__name">Upload Product</span></span></a></li>
										</ul>
									</div>
								</li>

								<li><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__orders"><span class="menu-bar__text">
									<span class="sherah-menu-icon sherah-svg-icon__v1">
										<svg  class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="17.092" height="17.873" viewBox="0 0 17.092 17.873">
											<g id="Icon" transform="translate(-409.241 -375.497)">
											  <path id="Path_219" data-name="Path 219" d="M413.466,380.6a15.992,15.992,0,0,1,.123-1.943,4.18,4.18,0,0,1,4.549-3.151,4.054,4.054,0,0,1,3.919,3.741c.009.436,0,.872,0,1.354h2.872c.193,0,.386,0,.579,0,.589.012.879.286.813.811-.4,3.247-.8,6.495-1.227,9.739a2.674,2.674,0,0,1-2.769,2.2q-4.543.022-9.086,0a2.681,2.681,0,0,1-2.771-2.2c-.344-2.558-.649-5.12-.97-7.68-.078-.62-.147-1.242-.234-1.861-.108-.759.125-1.011.967-1.012Zm-2.723,1.3c.062.5.119.978.177,1.452.306,2.481.606,4.963.924,7.443.114.888.642,1.293,1.628,1.294q4.32,0,8.639,0a2.279,2.279,0,0,0,.57-.059,1.428,1.428,0,0,0,1.074-1.446c.213-1.836.452-3.669.679-5.5.13-1.052.257-2.1.387-3.174h-2.742v1.215c.038.015.076.032.115.046.437.159.649.424.563.746a.73.73,0,0,1-.826.524c-.43-.008-.861.008-1.291-.006a.668.668,0,0,1-.711-.588c-.021-.423.28-.612.676-.709v-1.218h-5.655v1.221c.434.1.724.3.683.722a.613.613,0,0,1-.636.565c-.518.026-1.039.024-1.558,0-.349-.016-.627-.224-.614-.526a1.458,1.458,0,0,1,.364-.659c.051-.071.2-.084.292-.118V381.9Zm4.154-1.321h5.727c0-.514.036-1-.007-1.491a2.723,2.723,0,0,0-2.627-2.306,2.77,2.77,0,0,0-2.967,1.982A12.7,12.7,0,0,0,414.9,380.578Z" transform="translate(0 0)"/>
											  <path id="Path_220" data-name="Path 220" d="M475.527,506.525c.71-.887,1.409-1.754,2.1-2.627a.66.66,0,0,1,.828-.285.609.609,0,0,1,.258.961c-.841,1.079-1.7,2.145-2.563,3.206a.6.6,0,0,1-.858.123c-.635-.412-1.267-.829-1.89-1.259a.635.635,0,1,1,.71-1.053C474.584,505.888,475.043,506.2,475.527,506.525Z" transform="translate(-57.815 -117.848)"/>
											</g>
										</svg>											  
									</span>
									<span class="menu-bar__name">Orders</span></span><span class="sherah__toggle"></span></a></span>
									<!-- Dropdown Menu -->
									<div class="collapse sherah__dropdown" id="menu-item__orders" data-bs-parent="#sherahMenu">
										<ul class="menu-bar__one-dropdown">
											<li><a href="order-list.php"><span class="menu-bar__text"><span class="menu-bar__name">Order List</span></span></a></li>

										</ul>
									</div>
								</li>
								<li><a class="collapsed" href="login.php"><span class="menu-bar__text">
									<span class="sherah-menu-icon sherah-svg-icon__v1">	
										<svg class="sherah-svg-icon" xmlns="http://www.w3.org/2000/svg" width="19.103" height="23.047" viewBox="0 0 19.103 23.047">
											<g id="Icon" transform="translate(-209.904 -251.466)">
											  <path id="Path_240" data-name="Path 240" d="M212.282,260.761c0-.958-.016-1.929,0-2.9a6.662,6.662,0,0,1,5.78-6.272c4.429-.777,8.475,2.182,8.562,6.273.021.97,0,1.94,0,2.925.264.049.49.077.708.134a2.1,2.1,0,0,1,1.656,1.995c.024,1.769.01,3.539.012,5.308,0,1.323.007,2.646,0,3.969-.009,1.47-.933,2.311-2.567,2.314q-6.98.011-13.96,0c-1.657,0-2.566-.847-2.568-2.362q-.007-4.448,0-8.9c0-1.438.616-2.115,2.185-2.421A1.584,1.584,0,0,0,212.282,260.761Zm7.156,12.3q3.436,0,6.871,0c.925,0,1.1-.163,1.1-1.014q0-4.4,0-8.8c0-.8-.2-.983-1.09-.984q-6.871,0-13.742,0c-.867,0-1.072.185-1.073.95q0,4.445,0,8.891c0,.776.2.95,1.063.951Q216,273.064,219.437,273.061Zm-5.62-12.274h11.215c0-1.014.034-2-.007-2.98a5.223,5.223,0,0,0-4.93-4.866c-2.992-.229-5.547,1.367-6.063,3.958A26.567,26.567,0,0,0,213.817,260.787Z" transform="translate(0)"/>
											  <path id="Path_241" data-name="Path 241" d="M279.688,386.981a2.131,2.131,0,0,1,2.059,1.549,2.1,2.1,0,0,1-1.038,2.476.523.523,0,0,0-.32.557c.013.4.017.8-.008,1.193a.715.715,0,0,1-1.429.007c-.01-.143-.011-.286-.008-.429.015-.641.059-1.2-.691-1.617a1.921,1.921,0,0,1-.6-2.359A2.113,2.113,0,0,1,279.688,386.981Zm.689,2.152a.709.709,0,1,0-1.417.041.658.658,0,0,0,.7.678A.666.666,0,0,0,280.376,389.133Z" transform="translate(-60.212 -122.554)"/>
											  <path id="Path_242" data-name="Path 242" d="M294.225,402.762a.666.666,0,0,1-.713.719.658.658,0,0,1-.7-.678.709.709,0,1,1,1.417-.041Z" transform="translate(-74.06 -136.182)"/>
											</g>
										</svg>			  
									</span>
									<span class="menu-bar__name">Login</span></span></a></span>
								</li>

							</ul>
						</div>
						<!-- End Nav Menu -->
					</div>
					
				</div>
				<!-- End Admin Menu -->
			</div>
			<!-- End sherah Admin Menu -->
			
			<!-- Start Header -->
			<header class="sherah-header">
				<div class="container g-0">
					<div class="row g-0">
						<div class="col-12">
							<!-- Dashboard Header -->
							<div class="sherah-header__inner">
								<div class="sherah-header__middle">
									<div class="sherah__sicon close-icon d-xl-none">
										<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M6.19855 7.41927C4.22908 5.52503 2.34913 3.72698 0.487273 1.90989C0.274898 1.70227 0.0977597 1.40419 0.026333 1.11848C-0.0746168 0.717537 0.122521 0.36707 0.483464 0.154695C0.856788 -0.0643475 1.24249 -0.0519669 1.60248 0.199455C1.73105 0.289929 1.84438 0.404212 1.95771 0.514685C4.00528 2.48321 6.05189 4.45173 8.09755 6.4212C8.82896 7.12499 8.83372 7.6145 8.11565 8.30687C6.05856 10.2878 4.00052 12.2677 1.94152 14.2467C1.82724 14.3562 1.71391 14.4696 1.58439 14.5591C1.17773 14.841 0.615842 14.781 0.27966 14.4324C-0.056522 14.0829 -0.0946163 13.5191 0.202519 13.1248C0.296802 12.9991 0.415847 12.8915 0.530129 12.781C2.29104 11.0868 4.05194 9.39351 5.81571 7.70212C5.91761 7.60593 6.04332 7.53355 6.19855 7.41927Z"></path>
										</svg>		
									</div>
									<div class="sherah-header__left">
										<!-- Search Form -->
										<div class="sherah-header__form">
											<form class="sherah-header__form-inner" action="#">
												<button class="search-btn" type="submit">
													<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M15.6888 18.2542C10.5721 22.0645 4.46185 20.044 1.80873 16.2993C-0.984169 12.3585 -0.508523 7.01726 2.99926 3.64497C6.41228 0.362739 11.833 0.112279 15.5865 3.01273C19.3683 5.93475 20.8252 11.8651 17.3212 16.5826C17.431 16.6998 17.5417 16.8246 17.6599 16.9437C19.6263 18.9117 21.5973 20.8751 23.56 22.8468C24.3105 23.601 24.0666 24.7033 23.104 24.9575C22.573 25.0972 22.1724 24.8646 21.8075 24.4988C19.9218 22.6048 18.0276 20.7194 16.1429 18.8245C15.9674 18.65 15.8314 18.4361 15.6888 18.2542ZM2.39508 10.6363C2.38758 14.6352 5.61109 17.8742 9.62079 17.8977C13.6502 17.9212 16.9018 14.6914 16.9093 10.6597C16.9169 6.64673 13.7046 3.41609 9.69115 3.39921C5.66457 3.38232 2.40259 6.61672 2.39508 10.6363Z"/>
													</svg>
												</button>
												<input name="s" value="" type="text" placeholder="Search">
											</form>
										</div>
										<!-- End Search Form -->
									</div>
									<div class="sherah-header__right">
										<div class="sherah-header__group">
											<div class="sherah-header__group-two">
												<div class="sherah-header__right">
													<!-- Dark Light Button -->
													<div class="sherah-dark-light">
														<button id="sherah-dark-light-button">
															<svg class="sherah-offset__fill" xmlns="http://www.w3.org/2000/svg" width="26.536" height="26" viewBox="0 0 26.536 26">
																<g id="Dark_Mode" data-name="Dark Mode" transform="translate(-1351 -10)">
																<path id="Path_202" data-name="Path 202" d="M594.155,374.829a13.6,13.6,0,0,1-13.389-10.869,13.342,13.342,0,0,1,8.489-15.023,1.7,1.7,0,0,1,1.043-.046c.469.157.544.607.329,1.261a11.416,11.416,0,0,0-.031,7.256,11.91,11.91,0,0,0,14.791,7.568,1.176,1.176,0,0,1,.419-.123,2.437,2.437,0,0,1,1,.225c.336.219.294.618.154.99a13.232,13.232,0,0,1-4.448,5.959A13.7,13.7,0,0,1,594.155,374.829Zm-5.676-23.567a11.308,11.308,0,0,0-6.129,11.066,11.858,11.858,0,0,0,22.164,4.683,13.647,13.647,0,0,1-12.229-3.694A13.113,13.113,0,0,1,588.48,351.262Z" transform="translate(770.469 -338.829)"/>
																</g>
															</svg>																													
														</button>
													</div>
													<!-- End Dark Light Button -->
													<!-- Header Zoom -->
													<div class="sherah-header__zoom">
														<button id="sherah-header__full">
														<svg class="sherah-offset__fill" xmlns="http://www.w3.org/2000/svg" width="33.674" height="26" viewBox="0 0 33.674 26">
															<g id="Full_Screen_Icon" data-name="Full Screen Icon" transform="translate(-732.046 -400.487)">
															  <path id="Path_198" data-name="Path 198" d="M734.468,402.9c0,1.589,0,3.064,0,4.539,0,.947-.452,1.483-1.213,1.477s-1.189-.535-1.192-1.5q-.008-2.7,0-5.406c0-1.093.411-1.513,1.481-1.517q2.741-.011,5.481,0c.937,0,1.476.467,1.459,1.23-.016.734-.537,1.168-1.441,1.173C737.547,402.907,736.05,402.9,734.468,402.9Z" transform="translate(-0.01 -0.003)"/>
															  <path id="Path_199" data-name="Path 199" d="M906.056,402.9c-1.6,0-3.078.005-4.554,0-.94,0-1.477-.464-1.463-1.226.014-.736.534-1.173,1.436-1.177q2.778-.011,5.556,0c.982,0,1.422.442,1.428,1.42q.015,2.816,0,5.632c-.005.844-.456,1.351-1.169,1.369-.743.018-1.225-.506-1.232-1.381C906.048,406.013,906.056,404.493,906.056,402.9Z" transform="translate(-142.747 0)"/>
															  <path id="Path_200" data-name="Path 200" d="M734.458,526.491c1.593,0,3.068,0,4.543,0,.945,0,1.481.455,1.473,1.216s-.539,1.186-1.5,1.188q-2.741.008-5.481,0c-.988,0-1.432-.439-1.438-1.41q-.016-2.815,0-5.631c0-.874.491-1.4,1.234-1.38.712.019,1.16.526,1.166,1.371C734.466,523.367,734.458,524.888,734.458,526.491Z" transform="translate(0 -102.415)"/>
															  <path id="Path_201" data-name="Path 201" d="M906.057,526.44c0-1.5,0-2.974,0-4.445,0-.968.419-1.5,1.171-1.52.781-.02,1.232.531,1.234,1.531q.007,2.7,0,5.406c0,1.067-.429,1.481-1.516,1.485q-2.7.009-5.406,0c-.962,0-1.492-.431-1.5-1.19s.528-1.21,1.474-1.215c1.427-.007,2.853,0,4.28-.007A2.365,2.365,0,0,0,906.057,526.44Z" transform="translate(-142.748 -102.415)"/>
															</g>
														</svg>														  
														</button>
													</div>
													<!-- End Header Zoom -->
													<!-- Header Message -->
													<div class="sherah-header__dropmenu sherah-header__dropmenu--messages">
															
														<svg class="sherah-offset__fill" xmlns="http://www.w3.org/2000/svg" width="28.08" height="26.196" viewBox="0 0 28.08 26.196">
															<g id="Icon" transform="translate(0 0)">
															  <path id="Path_194" data-name="Path 194" d="M617.194,423.523c-.93,0-1.784.005-2.638,0a2.807,2.807,0,0,1-2.973-2.966q-.011-7.335,0-14.669a2.791,2.791,0,0,1,2.933-2.945q11.106-.01,22.212,0a2.782,2.782,0,0,1,2.921,2.9q.016,7.393,0,14.786a2.784,2.784,0,0,1-2.924,2.895c-3.546.01-7.092-.007-10.638.019a1.832,1.832,0,0,0-1.043.355c-2.043,1.593-4.059,3.22-6.08,4.841-.364.292-.726.538-1.217.308-.513-.24-.56-.689-.557-1.18C617.2,426.442,617.194,425.023,617.194,423.523Zm1.874,2.7c.266-.2.451-.327.627-.468,1.476-1.179,2.963-2.346,4.419-3.55a2.307,2.307,0,0,1,1.591-.564c3.643.024,7.287.014,10.931.01.8,0,1.142-.335,1.142-1.133q0-7.276,0-14.552c0-.809-.332-1.149-1.126-1.149q-11.048,0-22.1,0c-.76,0-1.1.346-1.1,1.113q-.005,7.306,0,14.611c0,.764.343,1.1,1.106,1.109,1.091.007,2.182,0,3.273,0,.918,0,1.229.311,1.232,1.221C619.07,423.954,619.068,425.037,619.068,426.219Z" transform="translate(-611.577 -402.937)" />
															  <path id="Path_195" data-name="Path 195" d="M668.075,468.825h-7.008a5.076,5.076,0,0,1-.525-.008.93.93,0,0,1-.01-1.856,4.967,4.967,0,0,1,.525-.009h14.075c.136,0,.273-.005.409,0a.934.934,0,1,1,.01,1.867c-.155.01-.311,0-.467,0Z" transform="translate(-654.045 -459.465)" />
															  <path id="Path_196" data-name="Path 196" d="M664.4,498.961c1.167,0,2.334,0,3.5,0,.691,0,1.1.357,1.11.925s-.41.942-1.091.944q-3.588.009-7.177,0c-.675,0-1.092-.385-1.08-.955a.939.939,0,0,1,1.061-.913C661.952,498.954,663.178,498.961,664.4,498.961Z" transform="translate(-654.043 -487.732)"/>
															</g>
														</svg>																											
														<span class="sherah-header__message--animate sherah-color3__bg--light"><span class="sherah-color3__bg"></span></span>
														<div class="sherah-dropdown-card sherah-dropdown-card__alarm sherah-border">
															<svg class="sherah-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="43.488" height="22.207" viewBox="0 0 43.488 22.207">
																<path id="Path_1271" data-name="Path 1271" d="M-15383,7197.438l20.555-20.992,20.555,20.992Z" transform="translate(15384.189 -7175.73)" stroke-width="1"/>
															</svg>
															<h3 class="sherah-dropdown-card__title sherah-border-btm">Recent Message</h3>
															<ul class="sherah-dropdown-card_list sherah-chatbox__list sherah-chatbox__list__header">
																<!-- Single List -->
																<li>
																	<div class="sherah-chatbox__inner">
																		<div class="sherah-chatbox__author">
																			<div class="sherah-chatbox__author-img">
																				<img src="img/chat-author1.png" alt="#">
																				<span class="sherah-chatbox__author-online"></span>
																			</div>
																			<div class="sherah-chatbox__author-content">
																				<h4 class="sherah-chatbox__author-title">Jamen Oliver</h4>
																				<p class="sherah-chatbox__author-desc">Hey! You forgot your keys....</p>
																			</div>
																		</div>
																	</div>
																</li>
																<!-- End Single List -->
																<!-- Single List -->
																<li>
																	<div class="sherah-chatbox__inner">
																		<div class="sherah-chatbox__author">
																			<div class="sherah-chatbox__author-img">
																				<img src="img/chat-author2.png" alt="#">
																				<span class="sherah-chatbox__author-online author-not-online"></span>
																			</div>
																			<div class="sherah-chatbox__author-content">
																				<h4 class="sherah-chatbox__author-title">Orian Heho</h4>
																				<p class="sherah-chatbox__author-desc">How are you?</p>
																			</div>
																		</div>
																		<div class="sherah-chatbox__right">
																			<span class="sherah-chatbox__unread sherah-color1__bg">5</span>
																			
																		</div>
																	</div>
																</li>
																<!-- End Single List -->
																<!-- Single List -->
																<li>
																	<div class="sherah-chatbox__inner">
																		<div class="sherah-chatbox__author">
																			<div class="sherah-chatbox__author-img">
																				<img src="img/chat-author3.png" alt="#">
																				<span class="sherah-chatbox__author-online author-not-online"></span>
																			</div>
																			<div class="sherah-chatbox__author-content">
																				<h4 class="sherah-chatbox__author-title">Brotherhood</h4>
																			</div>
																		</div>
																	</div>
																</li>
																<!-- End Single List -->
																<!-- Single List -->
																<li>
																	<div class="sherah-chatbox__inner">
																		<div class="sherah-chatbox__author">
																			<div class="sherah-chatbox__author-img">
																				<img src="img/chat-author4.png" alt="#">
																				<span class="sherah-chatbox__author-online"></span>
																			</div>
																			<div class="sherah-chatbox__author-content">
																				<h4 class="sherah-chatbox__author-title">Rose Rovert</h4>
																				<p class="sherah-chatbox__author-desc">Of course I work the finaly done ....</p>
																			</div>
																		</div>
																	</div>
																</li>
																<!-- End Single List -->
																<!-- Single List -->
																<li>
																	<div class="sherah-chatbox__inner">
																		<div class="sherah-chatbox__author">
																			<div class="sherah-chatbox__author-img">
																				<img src="img/chat-author5.png" alt="#">
																				<span class="sherah-chatbox__author-online author-is-busy"></span>
																			</div>
																			<div class="sherah-chatbox__author-content">
																				<h4 class="sherah-chatbox__author-title">Mahstai</h4>
																				<p class="sherah-chatbox__author-desc">Any plan for today?</p>
																			</div>
																		</div>
																		<div class="sherah-chatbox__right">
																			<span class="sherah-chatbox__unread sherah-color1__bg">7</span>
																		</div>
																	</div>
																</li>
																<!-- End Single List -->
															</ul>
															<!-- sherah Balance Button -->
															<div class="sherah-dropdown-card__button"><a href="chat-messages.html" class="sherah-dropdown-card__sell-all">See all Notification</a></div>
														</div>
														<!-- End sherah Balance Hover -->
													</div>
													<!-- End Header Message -->

													<!-- Header Alarm -->
													<div class="sherah-header__dropmenu">
														<svg class="sherah-offset__fill" id="Icon" xmlns="http://www.w3.org/2000/svg" width="22.875" height="25.355" viewBox="0 0 22.875 25.355">
															<g id="Group_7" data-name="Group 7" transform="translate(0 0)">
																<path id="Path_28" data-name="Path 28" d="M37.565,16.035V11.217a8.43,8.43,0,0,0-5.437-7.864,2.865,2.865,0,0,0,.057-.56,2.79,2.79,0,1,0-5.58,0,2.994,2.994,0,0,0,.053.544,8.17,8.17,0,0,0-5.433,7.7v4.993a.324.324,0,0,1-.323.323,2.932,2.932,0,0,0-2.933,2.585,2.862,2.862,0,0,0,2.847,3.141h4.926a3.674,3.674,0,0,0,7.3,0h4.926a2.869,2.869,0,0,0,2.116-.937,2.9,2.9,0,0,0,.731-2.2,2.935,2.935,0,0,0-2.933-2.585A.321.321,0,0,1,37.565,16.035ZM29.4,1.636a1.158,1.158,0,0,1,1.156,1.157,1,1,0,0,1-.016.155,7.23,7.23,0,0,0-.841-.078,8.407,8.407,0,0,0-1.438.082A1,1,0,0,1,28.24,2.8,1.159,1.159,0,0,1,29.4,1.636Zm0,22.083a2.05,2.05,0,0,1-2-1.636h4A2.05,2.05,0,0,1,29.4,23.719ZM39.2,19.1a1.222,1.222,0,0,1-1.221,1.349H20.818A1.228,1.228,0,0,1,19.6,19.1a1.284,1.284,0,0,1,1.307-1.1,1.961,1.961,0,0,0,1.957-1.959V11.042A6.542,6.542,0,0,1,29.4,4.5c.082,0,.159,0,.241,0a6.687,6.687,0,0,1,6.295,6.715v4.817a1.961,1.961,0,0,0,1.957,1.959A1.287,1.287,0,0,1,39.2,19.1Z" transform="translate(-17.958 0)"/>
															</g>
														</svg>
														<span class="sherah-header__count sherah-color1__bg">4</span>
														<!-- sherah Alarm Hover -->
														<div class="sherah-dropdown-card sherah-dropdown-card__alarm sherah-border">
															<svg class="sherah-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="43.488" height="22.207" viewBox="0 0 43.488 22.207">
																<path id="Path_1271" data-name="Path 1271" d="M-15383,7197.438l20.555-20.992,20.555,20.992Z" transform="translate(15384.189 -7175.73)" stroke-width="1"/>
															</svg>
															<h3 class="sherah-dropdown-card__title sherah-border-btm">Recent Notification</h3>
															<!-- sherah Balance List -->
															<ul class="sherah-dropdown-card_list">
																<li>
																	<div class="sherah-paymentm__name">
																		<div class="sherah-paymentm__icon sherah-paymentm__icon--notify ntfmax__bgc--5">
																			<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
																				<g id="Icon" transform="translate(14.293 11.5)">
																				  <circle id="Ellipse_34" data-name="Ellipse 34" cx="24" cy="24" r="24" transform="translate(-14.293 -11.5)" fill="#6176fe"></circle>
																				  <g id="Group_55" data-name="Group 55" transform="translate(-0.611 1.038)">
																					<g id="Group_54" data-name="Group 54" transform="translate(0 0)">
																					  <path id="Path_188" data-name="Path 188" d="M31.225,11.945a.694.694,0,0,1,0-.6l.852-1.777a2.041,2.041,0,0,0-.856-2.685l-1.714-.927a.682.682,0,0,1-.348-.488l-.335-1.948a1.989,1.989,0,0,0-2.24-1.659l-1.921.277a.662.662,0,0,1-.563-.186L22.7.572a1.956,1.956,0,0,0-2.769,0L18.541,1.948a.662.662,0,0,1-.563.186l-1.921-.277a1.988,1.988,0,0,0-2.24,1.659l-.335,1.948a.682.682,0,0,1-.348.488L11.42,6.88a2.041,2.041,0,0,0-.856,2.685l.852,1.777a.694.694,0,0,1,0,.6l-.852,1.777a2.041,2.041,0,0,0,.856,2.685l1.714.927a.682.682,0,0,1,.348.488l.335,1.948a1.979,1.979,0,0,0,2.24,1.659l1.921-.277a.661.661,0,0,1,.563.186l1.395,1.375a1.956,1.956,0,0,0,2.769,0L24.1,21.338a.662.662,0,0,1,.563-.186l1.921.277a1.988,1.988,0,0,0,2.24-1.659l.335-1.948a.682.682,0,0,1,.348-.488l1.714-.927a2.041,2.041,0,0,0,.856-2.685ZM30.6,15.22l-1.714.927a2.015,2.015,0,0,0-1.028,1.443l-.335,1.948a.673.673,0,0,1-.758.561l-1.921-.277a1.955,1.955,0,0,0-1.664.551l-1.395,1.375a.662.662,0,0,1-.937,0l-1.395-1.375a1.957,1.957,0,0,0-1.38-.571,1.985,1.985,0,0,0-.284.02l-1.921.277a.673.673,0,0,1-.758-.561l-.335-1.948a2.015,2.015,0,0,0-1.028-1.442l-1.714-.927a.69.69,0,0,1-.29-.908l.852-1.777a2.052,2.052,0,0,0,0-1.783l-.852-1.777a.69.69,0,0,1,.29-.908l1.714-.927A2.015,2.015,0,0,0,14.779,5.7l.335-1.948a.673.673,0,0,1,.758-.561l1.921.277a1.955,1.955,0,0,0,1.664-.551l1.395-1.375a.662.662,0,0,1,.937,0l1.395,1.375a1.955,1.955,0,0,0,1.664.551l1.921-.277a.673.673,0,0,1,.758.561L27.861,5.7a2.015,2.015,0,0,0,1.028,1.442l1.714.927a.69.69,0,0,1,.29.908l-.852,1.777a2.052,2.052,0,0,0,0,1.783l.852,1.777A.691.691,0,0,1,30.6,15.22Z" transform="translate(-10.359 0.002)" fill="#fff" stroke="#fff" stroke-width="0.2"></path>
																					</g>
																				  </g>
																				  <g id="Group_57" data-name="Group 57" transform="translate(5.343 7.675)">
																					<g id="Group_56" data-name="Group 56">
																					  <path id="Path_189" data-name="Path 189" d="M153.613,143.984a.659.659,0,0,0-.932,0l-8.7,8.7a.659.659,0,1,0,.932.932l8.7-8.7A.659.659,0,0,0,153.613,143.984Z" transform="translate(-143.792 -143.792)" fill="#fff" stroke="#fff" stroke-width="0.2"></path>
																					</g>
																				  </g>
																				  <g id="Group_59" data-name="Group 59" transform="translate(5.299 6.666)">
																					<g id="Group_58" data-name="Group 58" transform="translate(0)">
																					  <path id="Path_190" data-name="Path 190" d="M145.218,123.116a2.416,2.416,0,1,0,2.416,2.416A2.419,2.419,0,0,0,145.218,123.116Zm0,3.514a1.1,1.1,0,1,1,1.1-1.1A1.1,1.1,0,0,1,145.218,126.63Z" transform="translate(-142.802 -123.116)" fill="#fff" stroke="#fff" stroke-width="0.2"></path>
																					</g>
																				  </g>
																				  <g id="Group_61" data-name="Group 61" transform="translate(10.569 13.867)">
																					<g id="Group_60" data-name="Group 60">
																					  <path id="Path_191" data-name="Path 191" d="M263.338,280.61a2.416,2.416,0,1,0,2.416,2.416A2.419,2.419,0,0,0,263.338,280.61Zm0,3.514a1.1,1.1,0,1,1,1.1-1.1A1.1,1.1,0,0,1,263.338,284.124Z" transform="translate(-260.922 -280.61)" fill="#fff" stroke="#fff" stroke-width="0.2"></path>
																					</g>
																				  </g>
																				</g>
																			  </svg>
																		</div>
																		<div class="sherah-paymentm__content">
																			<h4 class="sherah-notifications__title">You have an offer! <span>successfully done</span></h4>
																			<p class="sherah-paymentm__text sherah-paymentm__text--notify">20 minutes ago</p>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="sherah-paymentm__name">
																		<div class="sherah-paymentm__icon sherah-paymentm__icon--notify ntfmax__bgc--2">
																			<svg xmlns="http://www.w3.org/2000/svg" width="17.272" height="17.272" viewBox="0 0 17.272 17.272">
																				<g id="jigsaw" transform="translate(0 0)">
																				  <path id="Path_192" data-name="Path 192" d="M298.117,0h-5.612A.506.506,0,0,0,292,.506V2.832a.506.506,0,0,0,.843.377.691.691,0,1,1,0,1.03.506.506,0,0,0-.843.377v2.3a.506.506,0,0,0,.506.506h1.514a1.7,1.7,0,0,0,1.612,1.993h.067a1.7,1.7,0,0,0,1.7-1.7,1.711,1.711,0,0,0-.025-.292h1.54a.506.506,0,0,0,.506-.506V1.3a1.305,1.305,0,0,0-1.3-1.3Zm.292,6.41h-1.82a.506.506,0,0,0-.377.844.691.691,0,1,1-1.03,0,.506.506,0,0,0-.377-.844h-1.794V5.4a1.707,1.707,0,0,0,.292.025h0A1.7,1.7,0,0,0,295,3.659a1.7,1.7,0,0,0-1.993-1.612V1.012h5.106a.292.292,0,0,1,.292.292Z" transform="translate(-282.149)" fill="#fff"></path>
																				  <path id="Path_193" data-name="Path 193" d="M13.325,108.41H11a.506.506,0,0,0-.377.844.691.691,0,1,1-1.03,0,.506.506,0,0,0-.377-.844H7.422V107.4a1.7,1.7,0,0,0,1.993-1.612,1.7,1.7,0,0,0-1.993-1.743v-1.54A.506.506,0,0,0,6.916,102H1.3A1.305,1.305,0,0,0,0,103.3v11.223a1.305,1.305,0,0,0,1.3,1.3H12.527a1.305,1.305,0,0,0,1.3-1.3v-5.612a.506.506,0,0,0-.506-.506ZM1.012,103.3a.292.292,0,0,1,.292-.292H6.41v1.82a.506.506,0,0,0,.844.377.691.691,0,1,1,0,1.03.506.506,0,0,0-.844.377v1.794H5.4a1.708,1.708,0,0,0,.025-.292,1.7,1.7,0,0,0-1.768-1.7,1.7,1.7,0,0,0-1.612,1.993H1.012Zm0,11.223v-5.106h1.82a.506.506,0,0,0,.377-.844.691.691,0,1,1,1.03,0,.506.506,0,0,0,.377.844H6.41v1.008a1.7,1.7,0,0,0-1.993,1.612,1.7,1.7,0,0,0,1.993,1.743v1.034H1.3a.292.292,0,0,1-.292-.292Zm11.807,0a.292.292,0,0,1-.292.292H7.422V113a.506.506,0,0,0-.844-.377.691.691,0,1,1,0-1.03.506.506,0,0,0,.844-.377v-1.794H8.429a1.7,1.7,0,0,0,1.612,1.993,1.7,1.7,0,0,0,1.743-1.993h1.034Z" transform="translate(0 -98.559)" fill="#fff"></path>
																				</g>
																			</svg>
																		</div>
																		<div class="sherah-paymentm__content">
																			<h4 class="sherah-notifications__title">You upload your fast product <span>successfully done</span></h4>
																			<p class="sherah-paymentm__text sherah-paymentm__text--notify">3 hours ago </p>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="sherah-paymentm__name">
																		<div class="sherah-paymentm__icon sherah-paymentm__icon--notify ntfmax__bgc--3">
																			<svg xmlns="http://www.w3.org/2000/svg" width="17.723" height="15.196" viewBox="0 0 17.723 15.196">
																				<path id="Path_194" data-name="Path 194" d="M19.36,10.483A1.9,1.9,0,0,0,17.79,9.7h-.2V8.432a1.9,1.9,0,0,0-1.937-1.9h-4.1a.7.7,0,0,1-.424-.146L8.591,4.411A1.982,1.982,0,0,0,7.382,4H3.937A1.9,1.9,0,0,0,2,5.9V17.3a1.811,1.811,0,0,0,.291.988,1.95,1.95,0,0,0,1.646.912H15.967a1.9,1.9,0,0,0,1.861-1.336l1.811-5.7A1.9,1.9,0,0,0,19.36,10.483ZM3.266,5.9a.633.633,0,0,1,.671-.633H7.382a.709.709,0,0,1,.431.146l2.532,1.975a1.963,1.963,0,0,0,1.2.412h4.1a.633.633,0,0,1,.671.633V9.7H6.191a1.9,1.9,0,0,0-1.842,1.336L3.266,14.472Zm15.195,5.882-1.811,5.7a.633.633,0,0,1-.633.45H3.988a.7.7,0,0,1-.4-.127l2.026-6.388a.633.633,0,0,1,.633-.45H17.79a.684.684,0,0,1,.551.272.633.633,0,0,1,.12.544Z" transform="translate(-2 -3.999)" fill="#fff"></path>
																			</svg>
																		</div>
																		<div class="sherah-paymentm__content">
																			<h4 class="sherah-notifications__title">Your Account has been created <span>successfully done</span></h4>
																			<p class="sherah-paymentm__text sherah-paymentm__text--notify">5 hours ago</p>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="sherah-paymentm__name">
																		<div class="sherah-paymentm__icon sherah-paymentm__icon--notify ntfmax__bgc--4">
																			<svg xmlns="http://www.w3.org/2000/svg" width="15.964" height="21.016" viewBox="0 0 15.964 21.016">
																				<g id="Group_1033" data-name="Group 1033" transform="translate(-1018.595 85.089)">
																				  <path id="Path_1039" data-name="Path 1039" d="M1023.331-77.979a1.928,1.928,0,0,1,.928-3l-1.234-2.163c-.095-.166-.2-.328-.285-.5a.611.611,0,0,1,.406-.954,11.6,11.6,0,0,1,4.418-.438,20.431,20.431,0,0,1,2.3.391c.685.149.832.537.488,1.142-.473.829-.949,1.656-1.449,2.528a2.013,2.013,0,0,1,1.25,1.268,1.879,1.879,0,0,1-.324,1.706c.392.285.79.529,1.136.833a9.768,9.768,0,0,1,3.591,7.928,4.577,4.577,0,0,1-3.519,4.586,15.392,15.392,0,0,1-5.843.515,14.574,14.574,0,0,1-2.822-.455,4.688,4.688,0,0,1-3.768-5.139,9.783,9.783,0,0,1,4.536-8.1C1023.2-77.883,1023.267-77.932,1023.331-77.979Zm3.234,12.665c.164,0,.328,0,.492,0a11.2,11.2,0,0,0,4.02-.65,3.324,3.324,0,0,0,2.234-3.1,8.444,8.444,0,0,0-3.082-7.1,5.247,5.247,0,0,0-7.3,0,8.583,8.583,0,0,0-3.1,6.491,3.589,3.589,0,0,0,2.92,3.941A13.666,13.666,0,0,0,1026.565-65.314Zm2.4-18.255a9.991,9.991,0,0,0-4.753.014c.415.725.822,1.449,1.248,2.163a.4.4,0,0,0,.3.128c.545.011,1.09.013,1.635-.006a.477.477,0,0,0,.346-.174C1028.151-82.133,1028.544-82.835,1028.965-83.569Zm-2.365,3.418c-.643.122-1.274.219-1.893.367a.6.6,0,0,0-.508.787c.1.35.364.467.818.349a6.153,6.153,0,0,1,3.15,0c.426.111.689,0,.8-.33a.6.6,0,0,0-.479-.8C1027.865-79.925,1027.235-80.026,1026.6-80.151Z" transform="translate(0 0)" fill="#fff"></path>
																				  <path id="Path_1040" data-name="Path 1040" d="M1096.76,34.223a1.755,1.755,0,0,1-.952,1.551.447.447,0,0,0-.275.479,1.943,1.943,0,0,1-.022.489.557.557,0,0,1-.612.487.566.566,0,0,1-.574-.488,2.765,2.765,0,0,0-.75-1.247,3.03,3.03,0,0,1-.351-.343.613.613,0,1,1,.882-.852c.091.082.17.18.266.255.264.207.582.339.86.112a.853.853,0,0,0,.261-.622c-.02-.382-.347-.466-.684-.505a1.822,1.822,0,0,1-1.7-2.162,1.668,1.668,0,0,1,.89-1.258.488.488,0,0,0,.307-.545,1.588,1.588,0,0,1,.022-.448.553.553,0,0,1,.575-.484.568.568,0,0,1,.612.491,2.189,2.189,0,0,0,.753,1.243c.4.329.47.676.212.985-.24.287-.579.272-.978-.012a1.245,1.245,0,0,0-.51-.232.542.542,0,0,0-.66.463.578.578,0,0,0,.452.712,3.246,3.246,0,0,0,.365.05A1.843,1.843,0,0,1,1096.76,34.223Z" transform="translate(-68.335 -104.403)" fill="#fff"></path>
																				</g>
																			</svg>
																		</div>
																		<div class="sherah-paymentm__content">
																			<h4 class="sherah-notifications__title">Thank you !you made your fast sell <span>$120</span></h4>
																			<p class="sherah-paymentm__text sherah-paymentm__text--notify">6 hours ago</p>
																		</div>
																	</div>
																</li>
															</ul>
															<!-- sherah Balance Button -->
															<div class="sherah-dropdown-card__button"><a href="notifications.html" class="sherah-dropdown-card__sell-all">See all Notification</a></div>
														</div>
														<!-- End sherah Balance Hover -->
													</div>
													<!-- End Header Alarm -->
												
													<!-- Header Author -->
													<div class="sherah-header__author sherah-flex__center--top">
														<div class="sherah-header__author-img">
															<img src="img/profile-pic.png" alt="#">
														</div>
														<div class="sherah-header__author--info sherah-dflex sherah-dflex__base">
															<h4 class="sherah-header__author--title  sherah-dflex sherah-dflex__column"><?=$_SESSION['Firstname']?></h4>
															<svg class="sherah-default__fill sherah-default__arrow" xmlns="http://www.w3.org/2000/svg" width="10.621" height="5.836" viewBox="0 0 10.621 5.836">
																<g id="Arrow_Icon" data-name="Arrow Icon" transform="translate(1599.621 7.836) rotate(180)">
																  <path id="Path_193" data-name="Path 193" d="M607.131,421.81c-.063.06-.118.11-.171.163q-2.071,2.065-4.144,4.127a.91.91,0,0,1-.36.224.5.5,0,0,1-.553-.234.519.519,0,0,1,.042-.618,2.213,2.213,0,0,1,.171-.181l4.523-4.51c.368-.367.617-.367.987,0l4.538,4.525a1.725,1.725,0,0,1,.168.183.521.521,0,0,1-.052.7.533.533,0,0,1-.7.039,1.815,1.815,0,0,1-.166-.156l-4.112-4.1C607.249,421.919,607.193,421.869,607.131,421.81Z" transform="translate(987.179 -418.507)"/>
																</g>
															</svg>
														</div>
														<!-- sherah Profile Hover -->
														<div class="sherah-dropdown-card sherah-dropdown-card__profile sherah-border">
															<svg class="sherah-dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="43.488" height="22.207" viewBox="0 0 43.488 22.207">
																<path id="Path_1271" data-name="Path 1271" d="M-15383,7197.438l20.555-20.992,20.555,20.992Z" transform="translate(15384.189 -7175.73)" stroke-width="1"></path>
															</svg>
															<h3 class="sherah-dropdown-card__title sherah-border-btm">My Profile</h3>
															<!-- sherah Balance List -->
															<ul class="sherah-dropdown-card_list">
																<li>
																	<div class="sherah-dropdown-card-info">
																		<div class="sherah-dropdown-card__img sherah-color1__bg">
																			<svg xmlns="http://www.w3.org/2000/svg" width="18.192" height="21.5" viewBox="0 0 18.192 21.5">
																				<g id="user_account_people_man" data-name="user, account, people, man" transform="translate(-5 -3)">
																				  <path id="Path_1272" data-name="Path 1272" d="M20.494,16.131a.827.827,0,1,0-1.163,1.176,7.391,7.391,0,0,1,2.207,5.29c0,1.011-2.9,2.481-7.442,2.481S6.654,23.607,6.654,22.6a7.391,7.391,0,0,1,2.179-5.261.827.827,0,1,0-1.169-1.169A9.036,9.036,0,0,0,5,22.6c0,2.686,4.686,4.135,9.1,4.135s9.1-1.449,9.1-4.135a9.03,9.03,0,0,0-2.7-6.466Z" transform="translate(0 -2.231)" fill="#fff"/>
																				  <path id="Path_1273" data-name="Path 1273" d="M14.788,14.577A5.788,5.788,0,1,0,9,8.788,5.788,5.788,0,0,0,14.788,14.577Zm0-9.923a4.135,4.135,0,1,1-4.135,4.135,4.135,4.135,0,0,1,4.135-4.135Z" transform="translate(-0.692)" fill="#fff"/>
																				</g>
																			</svg>
																			  
																		</div>
																		<h4 class="sherah-dropdown-card-name"><a href="profile-info.html">My Profile</a></h4>
																	</div>
																</li>
																<li>
																	<div class="sherah-dropdown-card-info">
																		<div class="sherah-dropdown-card__img sherah-color1__bg">
																			<svg xmlns="http://www.w3.org/2000/svg" width="22.029" height="22.368" viewBox="0 0 22.029 22.368">
																				<g id="Message" transform="translate(-78.827 -199.134)">
																				  <g id="Icon" transform="translate(-257.234 -162.564)">
																					<path id="Path_230" data-name="Path 230" d="M336.063,371.173q0-3.247,0-6.494a2.764,2.764,0,0,1,2.976-2.979q5.978,0,11.955,0a2.76,2.76,0,0,1,2.962,2.95q.006,3.935,0,7.87a2.759,2.759,0,0,1-2.968,2.944c-3.154,0-6.307,0-9.461.012a1.181,1.181,0,0,0-.685.246c-1.16.936-2.3,1.9-3.444,2.851-.272.227-.543.44-.925.263-.4-.185-.414-.538-.413-.911Q336.067,374.549,336.063,371.173Zm1.378,5.571c.986-.82,1.884-1.554,2.766-2.307a1.4,1.4,0,0,1,.976-.355q4.881.015,9.763.005a1.423,1.423,0,0,0,1.633-1.629q0-3.849,0-7.7c0-1.175-.5-1.681-1.668-1.681H339.126c-1.177,0-1.685.5-1.685,1.664q0,5.742,0,11.484Z" transform="translate(0 0)" fill="#fff"/>
																					<path id="Path_231" data-name="Path 231" d="M415,440.162v-8.715c0-.932,0-1.864,0-2.8a1.38,1.38,0,0,0-1.328-1.5c-.48-.059-.753-.333-.729-.732.025-.417.352-.664.852-.642a2.731,2.731,0,0,1,2.578,2.721c.019,2.251.007,4.5.007,6.752,0,2.036,0,4.071,0,6.107,0,.364-.043.692-.419.864s-.63-.024-.9-.237c-.917-.736-1.828-1.478-2.761-2.193a1.225,1.225,0,0,0-.687-.245c-2.924-.016-5.85-.044-8.773,0A2.889,2.889,0,0,1,399.878,436a.63.63,0,0,1,.678-.59.64.64,0,0,1,.672.6,4.747,4.747,0,0,1,.014.644,1.385,1.385,0,0,0,1.5,1.5c3.025,0,6.05.01,9.075-.007a1.732,1.732,0,0,1,1.211.43C413.65,439.1,414.3,439.6,415,440.162Z" transform="translate(-58.296 -58.218)" fill="#fff"/>
																					<path id="Path_232" data-name="Path 232" d="M388.91,411.084c-1.3,0-2.6,0-3.906,0-.546,0-.855-.252-.859-.682s.306-.693.847-.694q3.971,0,7.941,0c.534,0,.848.271.838.7-.009.416-.313.671-.826.672C391.6,411.086,390.255,411.084,388.91,411.084Z" transform="translate(-43.947 -43.807)" fill="#fff"/>
																					<path id="Path_233" data-name="Path 233" d="M387.582,443.079c-.872,0-1.744,0-2.616,0-.511,0-.814-.259-.822-.675-.008-.432.3-.7.84-.7q2.595,0,5.19,0c.538,0,.849.264.844.7s-.315.677-.861.679C389.3,443.082,388.44,443.079,387.582,443.079Z" transform="translate(-43.946 -73.004)" fill="#fff"/>
																				  </g>
																				</g>
																			</svg>
																		</div>
																		<h4 class="sherah-dropdown-card-name "><a href="chat-messages.html">Message</a></h4>
																	</div>
																</li>
																<li>
																	<div class="sherah-dropdown-card-info">
																		<div class="sherah-dropdown-card__img sherah-color1__bg">
																			<svg xmlns="http://www.w3.org/2000/svg" width="22.103" height="22.368" viewBox="0 0 22.103 22.368">
																				<g id="Settings" transform="translate(-78.799 -199)">
																				  <g id="Icon" transform="translate(79.586 197.962)">
																					<g id="setting" transform="translate(-0.787 1.038)">
																					  <path id="Path_39" data-name="Path 39" d="M20.942,9.2h-.094A.71.71,0,0,1,20.359,8l.067-.068a2.209,2.209,0,0,0,0-3.092L19.313,3.715a2.144,2.144,0,0,0-3.055,0l-.067.068a.7.7,0,0,1-.759.145A.713.713,0,0,1,15,3.282v-.1A2.175,2.175,0,0,0,12.838,1H11.264A2.175,2.175,0,0,0,9.1,3.186v.1a.713.713,0,0,1-.435.64.7.7,0,0,1-.754-.142l-.063-.068a2.144,2.144,0,0,0-3.055,0L3.68,4.838a2.209,2.209,0,0,0,0,3.092L3.747,8a.7.7,0,0,1,.136.772.681.681,0,0,1-.629.432H3.16A2.175,2.175,0,0,0,1,11.388V12.98a2.175,2.175,0,0,0,2.16,2.186h.094a.71.71,0,0,1,.489,1.2l-.067.068a2.209,2.209,0,0,0,0,3.092l1.112,1.125a2.144,2.144,0,0,0,3.055,0l.067-.068a.7.7,0,0,1,1.189.5v.1a2.2,2.2,0,0,0,.633,1.549,2.149,2.149,0,0,0,1.53.641h1.574A2.175,2.175,0,0,0,15,21.182v-.1a.713.713,0,0,1,.435-.64.7.7,0,0,1,.754.142l.067.068a2.144,2.144,0,0,0,3.055,0l1.113-1.125a2.209,2.209,0,0,0,0-3.092l-.067-.068a.7.7,0,0,1-.136-.772.681.681,0,0,1,.629-.432h.094A2.175,2.175,0,0,0,23.1,12.98V11.388A2.175,2.175,0,0,0,20.942,9.2Zm.687,3.779a.692.692,0,0,1-.687.695h-.094a2.178,2.178,0,0,0-1.993,1.36,2.223,2.223,0,0,0,.459,2.388l.066.068a.7.7,0,0,1,0,.983L18.267,19.6a.681.681,0,0,1-.971,0l-.066-.068a2.16,2.16,0,0,0-2.36-.463,2.2,2.2,0,0,0-1.345,2.016v.1a.692.692,0,0,1-.687.695H11.264a.692.692,0,0,1-.687-.695v-.1a2.2,2.2,0,0,0-1.342-2.022,2.155,2.155,0,0,0-2.362.47l-.067.068a.682.682,0,0,1-.971,0L4.723,18.476a.7.7,0,0,1,0-.983l.067-.068a2.223,2.223,0,0,0,.459-2.389,2.178,2.178,0,0,0-1.995-1.36H3.16a.692.692,0,0,1-.687-.695V11.388a.692.692,0,0,1,.687-.695h.094a2.178,2.178,0,0,0,1.993-1.36,2.223,2.223,0,0,0-.459-2.388l-.066-.068a.7.7,0,0,1,0-.983L5.835,4.767a.681.681,0,0,1,.971,0l.066.068a2.16,2.16,0,0,0,2.36.464,2.2,2.2,0,0,0,1.345-2.017v-.1a.692.692,0,0,1,.687-.695h1.574a.692.692,0,0,1,.687.695v.1A2.2,2.2,0,0,0,14.869,5.3a2.159,2.159,0,0,0,2.36-.464l.067-.068a.681.681,0,0,1,.971,0L19.38,5.893a.7.7,0,0,1,0,.983l-.067.068a2.223,2.223,0,0,0-.459,2.389,2.178,2.178,0,0,0,1.994,1.36h.094a.692.692,0,0,1,.687.695Z" transform="translate(-1 -1)" fill="#fff"/>
																					  <path id="Path_40" data-name="Path 40" d="M13.965,9a4.965,4.965,0,1,0,4.965,4.965A4.965,4.965,0,0,0,13.965,9Zm0,8.511a3.546,3.546,0,1,1,3.546-3.546,3.546,3.546,0,0,1-3.546,3.546Z" transform="translate(-2.913 -2.781)" fill="#fff"/>
																					</g>
																				  </g>
																				</g>
																			</svg>
																		</div>
																		<h4 class="sherah-dropdown-card-name"><a href="profile-info.html">Settings</a></h4>
																	</div>
																</li>
																<li>
																	<div class="sherah-dropdown-card-info">
																		<div class="sherah-dropdown-card__img sherah-color1__bg">
																			<svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 17.5 17.5">
																				<path id="path52" d="M9.27,291.179a.877.877,0,0,0-.867.889V299.1a.876.876,0,1,0,1.752,0v-7.033a.877.877,0,0,0-.885-.889Zm5.105,1.763c-.028,0-.057,0-.085,0A.88.88,0,0,0,13.8,294.5a7,7,0,1,1-9.076.026.882.882,0,0,0,.1-1.239.873.873,0,0,0-1.234-.1,8.815,8.815,0,0,0,5.691,15.495,8.815,8.815,0,0,0,5.652-15.521.873.873,0,0,0-.561-.216Z" transform="translate(-0.529 -291.179)" fill="#fff"/>
																			</svg>
																		</div>
																		<h4 class="sherah-dropdown-card-name"><a href="./logout.php">Logout</a></h4>
																	</div>
																</li>
															</ul>
														</div>
														<!-- End sherah Balance Hover -->
													</div>
													<!-- End Header Author -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header -->
				
			<!-- sherah Dashboard -->
			<section class="sherah-adashboard sherah-show">
				<div class="container">
					<div class="row">	
						<div class="col-12 sherah-main__column">
							<div class="sherah-body">
								<!-- Dashboard Inner -->
								<div class="sherah-dsinner">
									<div class="row mg-top-10">
										<div class="col-lg-3 col-md-6 col-12">
											<!-- Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
													<svg class="sherah-color3__fill" xmlns="http://www.w3.org/2000/svg" width="30.359" height="30.366" viewBox="0 0 30.359 30.366">
														<g id="Group_69" data-name="Group 69" transform="translate(-242.991 -23.995)">
														  <path id="Path_244" data-name="Path 244" d="M249.517,188.942c.854.139,1.633.271,2.413.391.448.069.945.14.856.737s-.609.506-1.042.441c-.721-.107-1.44-.232-2.227-.36,0,.35,0,.662,0,.974a.622.622,0,0,1-.693.7q-2.579,0-5.158,0c-.464,0-.674-.266-.674-.718q0-5.217,0-10.434c0-.494.264-.711.745-.709,1.166,0,2.332-.013,3.5.008a2.439,2.439,0,0,1,2.017,1.223c.265-.168.508-.33.758-.479a4.631,4.631,0,0,1,5.791.613,1.642,1.642,0,0,0,1.167.425c1.581-.027,3.162-.011,4.743-.01,2.125,0,3.145,1.373,2.527,3.394a.879.879,0,0,0,.027.213c.215-.144.406-.249.572-.386,1.524-1.258,3.038-2.527,4.565-3.781a2.38,2.38,0,1,1,3.021,3.675c-2.271,1.779-4.522,3.583-6.826,5.317a8.274,8.274,0,0,1-6.68,1.494c-.408-.072-.817-.143-1.227-.2s-.834-.176-.778-.693c.062-.571.521-.554.957-.488.547.082,1.092.172,1.638.255a7.061,7.061,0,0,0,5.569-1.452c2.177-1.674,4.331-3.378,6.491-5.074a1.2,1.2,0,1,0-1.5-1.842c-1.6,1.319-3.188,2.656-4.8,3.96a1.569,1.569,0,0,1-.9.338c-2.391.027-4.782.021-7.173.006a1.128,1.128,0,0,1-.691-.225.59.59,0,0,1-.085-.577,1.007,1.007,0,0,1,.663-.361c1.462-.032,2.924-.016,4.387-.016.2,0,.4.007.593,0a1.191,1.191,0,0,0,1.208-1.2,1.178,1.178,0,0,0-1.239-1.165c-1.877-.012-3.755.014-5.632-.022a2.192,2.192,0,0,1-.992-.381c-.387-.231-.71-.567-1.094-.8-1.629-1.006-3.114-.64-4.628.712a.708.708,0,0,0-.162.356,1.561,1.561,0,0,0-.007.354C249.517,185.066,249.517,186.98,249.517,188.942Zm-1.189,1.668c0-2.792.005-5.514,0-8.236a1.1,1.1,0,0,0-.946-1.183c-1.053-.058-2.111-.016-3.154-.016v9.435Z" transform="translate(0 -137.466)" />
														  <path id="Path_245" data-name="Path 245" d="M336.414,31.727A7.71,7.71,0,1,1,328.756,24,7.725,7.725,0,0,1,336.414,31.727Zm-8.331,4.064a2.433,2.433,0,0,1-1.723-1.929c-.08-.415-.053-.847.453-.942s.656.256.724.71a1.161,1.161,0,0,0,1.579.955,1.183,1.183,0,0,0,.762-1.268,1.212,1.212,0,0,0-1.2-1.019,2.371,2.371,0,0,1-2.274-1.821c-.3-1.19.281-2.2,1.677-2.886V25.243a6.486,6.486,0,0,0,0,12.919Zm1.24,2.387a6.524,6.524,0,0,0,5.892-6.927c-.2-3.155-3.04-6.041-5.886-5.971v2.34a2.421,2.421,0,0,1,1.741,2.139.593.593,0,0,1-.507.741c-.4.056-.619-.185-.672-.578a1.991,1.991,0,0,0-.062-.348,1.187,1.187,0,0,0-1.286-.822,1.185,1.185,0,0,0-.071,2.335,3.567,3.567,0,0,0,.413.031,2.368,2.368,0,0,1,.836,4.5c-.136.067-.276.126-.4.181Z" transform="translate(-68.751 0)"/>
														  <path id="Path_246" data-name="Path 246" d="M338.739,264.607c-.144-.236-.43-.5-.392-.7a.836.836,0,0,1,.6-.519c.156-.017.494.352.5.552,0,.225-.281.452-.44.679Z" transform="translate(-84.043 -210.998)" />
														</g>
													</svg>
												</div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Tổng doanh thu</span>
                                                        <?= sprintf(' <h4 class="sherah-product-card__price"><b class="count-animate">%s VND</b></h4>', number_format($totalPricePaid, 0, '', ','))?>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color3">
															<svg xmlns="http://www.w3.org/2000/svg" width="8.407" height="15.353" viewBox="0 0 8.407 15.353">
																<g id="Arrow_Icon" data-name="Arrow Icon" transform="translate(-584.97 -306)">
																<path id="Path_247" data-name="Path 247" d="M267.12,84.017c-.794.794-1.506,1.529-2.249,2.231a.7.7,0,0,1-1.2-.195.615.615,0,0,1,.177-.742q.744-.738,1.483-1.481.949-.949,1.9-1.9a.718.718,0,0,1,1.185-.016q1.659,1.653,3.311,3.312a.7.7,0,0,1,.077,1.067.718.718,0,0,1-1.069-.08c-.712-.708-1.422-1.418-2.206-2.2,0,.193,0,.312,0,.431q0,5.747.005,11.495c0,.076,0,.153,0,.229a.719.719,0,0,1-.689.8.71.71,0,0,1-.718-.8q-.008-3.406-.006-6.812,0-2.44,0-4.88C267.119,84.356,267.12,84.237,267.12,84.017Z" transform="translate(321.362 224.389)" fill="#09ad95"/>
																</g>
															</svg>
														  +16.24 %
														</p>
<!--														<a href="#" class="sherah-see-all">View net earnings</a>-->
													</div>
													
												</div>
											</div>
											<!-- End Progress Card -->
										</div>
										<div class="col-lg-3 col-md-6 col-12">
											<!-- Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
													<svg class="sherah-color2__fill" xmlns="http://www.w3.org/2000/svg" width="26.672" height="30.636" viewBox="0 0 26.672 30.636">
														<g id="Group_70" data-name="Group 70" transform="translate(-272.518 -5.918)">
														  <path id="Path_251" data-name="Path 251" d="M285.855,36.554q-5.443,0-10.885,0a2.152,2.152,0,0,1-2.447-2.412q-.01-9.39.014-18.78a3.035,3.035,0,0,1,.383-1.406c1.292-2.312,2.644-4.59,3.947-6.9a2.07,2.07,0,0,1,1.993-1.141q7,.028,13.995,0a2.075,2.075,0,0,1,1.991,1.147c1.327,2.338,2.7,4.652,4.022,6.991a2.4,2.4,0,0,1,.306,1.124q.028,9.48.011,18.959a2.152,2.152,0,0,1-2.445,2.414Q291.3,36.556,285.855,36.554ZM297.39,15.348H274.351c-.012.211-.03.387-.031.562q0,9.057-.011,18.113c0,.577.186.746.758.744q10.73-.025,21.461-.011c.858,0,.86,0,.86-.861q0-8.937,0-17.874ZM284.969,7.724c-2.077,0-4.089-.01-6.1.017a.778.778,0,0,0-.516.374c-.971,1.646-1.92,3.305-2.871,4.963a2.945,2.945,0,0,0-.152.376h9.64Zm11.423,5.748a1.4,1.4,0,0,0-.08-.258c-1-1.741-2-3.485-3.029-5.212a.773.773,0,0,0-.576-.267c-1.832-.02-3.664-.013-5.5-.009a2.737,2.737,0,0,0-.373.048v5.7Z" />
														  <path id="Path_252" data-name="Path 252" d="M351.281,143.152l3.6-3.605c.141-.141.275-.288.426-.418a.889.889,0,1,1,1.262,1.253c-.4.439-.837.851-1.259,1.273q-1.582,1.583-3.166,3.164c-.63.627-1.05.632-1.669.02-.636-.629-1.274-1.258-1.9-1.9a.886.886,0,0,1-.063-1.365.906.906,0,0,1,1.328.1C350.317,142.133,350.762,142.615,351.281,143.152Z" transform="translate(-66.652 -117.042)" />
														</g>
													</svg>
												</div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Tổng tiền đơn hàng</span>
                                                        <?= sprintf(' <h4 class="sherah-product-card__price"><b class="count-animate">%s VND</b></h4>', number_format($totalPriceOrder, 0, '', ','))?>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color2">
															<svg class="sherah-color2__fill" xmlns="http://www.w3.org/2000/svg" width="8.407" height="15.353" viewBox="0 0 8.407 15.353">
																<g id="Arrow_Icon" data-name="Arrow Icon" transform="translate(593.377 321.353) rotate(180)">
																  <path id="Path_247" data-name="Path 247" d="M267.12,84.017c-.794.794-1.506,1.529-2.249,2.231a.7.7,0,0,1-1.2-.195.615.615,0,0,1,.177-.742q.744-.738,1.483-1.481.949-.949,1.9-1.9a.718.718,0,0,1,1.185-.016q1.659,1.653,3.311,3.312a.7.7,0,0,1,.077,1.067.718.718,0,0,1-1.069-.08c-.712-.708-1.422-1.418-2.206-2.2,0,.193,0,.312,0,.431q0,5.747.005,11.495c0,.076,0,.153,0,.229a.719.719,0,0,1-.689.8.71.71,0,0,1-.718-.8q-.008-3.406-.006-6.812,0-2.44,0-4.88C267.119,84.356,267.12,84.237,267.12,84.017Z" transform="translate(321.362 224.389)" />
																</g>
															</svg>
															+80.00 %
														</p>
														<a href="./order-list.php" class="sherah-see-all">View all orders</a>
													</div>
													
												</div>
											</div>
											<!-- End Progress Card -->
										</div>
										<div class="col-lg-3 col-md-6 col-12">
											<!-- Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
													<svg class="sherah-color1__fill" xmlns="http://www.w3.org/2000/svg" width="35.176" height="30.636" viewBox="0 0 35.176 30.636">
														<g id="Group_1177" data-name="Group 1177" transform="translate(-207.977 -44.521)">
														  <path id="Path_253" data-name="Path 253" d="M218.474,150.774c3.084-3.627,11.1-3.619,14.16-.016.113-.172.217-.333.324-.493a4.348,4.348,0,0,1,3.515-2.1,12.57,12.57,0,0,1,3.269.165,4.445,4.445,0,0,1,3.4,4.375c.019,2.426.01,4.853,0,7.28a2.083,2.083,0,0,1-2.259,2.276c-1.808.022-3.617.016-5.425,0-.419,0-.63.082-.767.542a2.316,2.316,0,0,1-2.413,1.657c-1.579.019-3.159.006-4.739.006q-4.224,0-8.447,0a2.493,2.493,0,0,1-2.761-1.87.806.806,0,0,0-.625-.312c-1.739-.025-3.479-.012-5.219-.015-1.79,0-2.51-.716-2.511-2.482,0-2.289,0-4.578,0-6.868a4.633,4.633,0,0,1,4.607-4.8c.343-.014.687.007,1.03-.008A4.854,4.854,0,0,1,218.474,150.774Zm7.083,11.624c2.172,0,4.345,0,6.517,0,.424,0,.705-.08.7-.594-.023-1.966.05-3.937-.055-5.9a5.977,5.977,0,0,0-4.737-5.523,15.559,15.559,0,0,0-3.272-.2,6.2,6.2,0,0,0-6.351,6.325c-.023,1.692.02,3.385-.017,5.076-.014.644.219.826.836.818C221.3,162.381,223.431,162.4,225.558,162.4Zm15.5-2.242c0-2.623.055-5.2-.025-7.779a2.373,2.373,0,0,0-2.232-2.155,14.355,14.355,0,0,0-1.85-.035,2.591,2.591,0,0,0-2.6,3.3,21.233,21.233,0,0,1,.49,5.781c0,.287,0,.575,0,.885Zm-24.813,0c.014-.264.033-.486.035-.708a22.529,22.529,0,0,1,.495-5.987,2.59,2.59,0,0,0-2.632-3.277c-.457-.015-.915-.013-1.372,0a2.581,2.581,0,0,0-2.727,2.773c-.007,2.2,0,4.392,0,6.588,0,.2.021.4.033.612Z" transform="translate(0 -89.312)"/>
														  <path id="Path_254" data-name="Path 254" d="M298.589,44.523a5.972,5.972,0,1,1-6.069,5.89A5.967,5.967,0,0,1,298.589,44.523Zm-.1,2.068a3.9,3.9,0,1,0,3.912,3.931A3.889,3.889,0,0,0,298.486,46.591Z" transform="translate(-72.929 0)"/>
														  <path id="Path_255" data-name="Path 255" d="M224.343,84.1a3.77,3.77,0,1,1,3.749-3.755A3.764,3.764,0,0,1,224.343,84.1Zm-.03-2.066a1.7,1.7,0,1,0-1.693-1.7A1.688,1.688,0,0,0,224.313,82.03Z" transform="translate(-10.849 -27.636)"/>
														  <path id="Path_256" data-name="Path 256" d="M400.423,76.561a3.769,3.769,0,1,1-3.855,3.644A3.755,3.755,0,0,1,400.423,76.561Zm1.613,3.752a1.7,1.7,0,1,0-1.67,1.719A1.685,1.685,0,0,0,402.036,80.312Z" transform="translate(-162.683 -27.637)"/>
														</g>
													</svg>
												</div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Số Lượng Người Dùng</span>
                                                        <?php
                                                        $users = $collection->findAll("Customer");
                                                        $countUser = iterator_count($users);
                                                        ?>
														<h4 class="sherah-progress-card__title"><b class="count-animate"><?=$countUser?></b></h4>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color1">
															<svg class="sherah-color1__fill"  xmlns="http://www.w3.org/2000/svg" width="8.407" height="15.353" viewBox="0 0 8.407 15.353">
																<g id="Arrow_Icon" data-name="Arrow Icon" transform="translate(-584.97 -306)">
																<path id="Path_247" data-name="Path 247" d="M267.12,84.017c-.794.794-1.506,1.529-2.249,2.231a.7.7,0,0,1-1.2-.195.615.615,0,0,1,.177-.742q.744-.738,1.483-1.481.949-.949,1.9-1.9a.718.718,0,0,1,1.185-.016q1.659,1.653,3.311,3.312a.7.7,0,0,1,.077,1.067.718.718,0,0,1-1.069-.08c-.712-.708-1.422-1.418-2.206-2.2,0,.193,0,.312,0,.431q0,5.747.005,11.495c0,.076,0,.153,0,.229a.719.719,0,0,1-.689.8.71.71,0,0,1-.718-.8q-.008-3.406-.006-6.812,0-2.44,0-4.88C267.119,84.356,267.12,84.237,267.12,84.017Z" transform="translate(321.362 224.389)"></path>
																</g>
															</svg>
															+80.00 %
														</p>
														<a href="./user-list.php" class="sherah-see-all">See details</a>
													</div>
													
												</div>
											</div>
											<!-- End Progress Card -->
										</div>
										<div class="col-lg-3 col-md-6 col-12">
<!--											 Progress Card -->
											<div class="sherah-progress-card sherah-border sherah-default-bg mg-top-30">
												<div class="sherah-progress-card__icon sherah-default-bg sherah-border">
													<svg class="sherah-color4__fill" xmlns="http://www.w3.org/2000/svg" width="35.176" height="30.636" viewBox="0 0 35.176 30.636">
														<g id="Group_1177" data-name="Group 1177" transform="translate(-207.977 -44.521)">
														  <path id="Path_253" data-name="Path 253" d="M218.474,150.774c3.084-3.627,11.1-3.619,14.16-.016.113-.172.217-.333.324-.493a4.348,4.348,0,0,1,3.515-2.1,12.57,12.57,0,0,1,3.269.165,4.445,4.445,0,0,1,3.4,4.375c.019,2.426.01,4.853,0,7.28a2.083,2.083,0,0,1-2.259,2.276c-1.808.022-3.617.016-5.425,0-.419,0-.63.082-.767.542a2.316,2.316,0,0,1-2.413,1.657c-1.579.019-3.159.006-4.739.006q-4.224,0-8.447,0a2.493,2.493,0,0,1-2.761-1.87.806.806,0,0,0-.625-.312c-1.739-.025-3.479-.012-5.219-.015-1.79,0-2.51-.716-2.511-2.482,0-2.289,0-4.578,0-6.868a4.633,4.633,0,0,1,4.607-4.8c.343-.014.687.007,1.03-.008A4.854,4.854,0,0,1,218.474,150.774Zm7.083,11.624c2.172,0,4.345,0,6.517,0,.424,0,.705-.08.7-.594-.023-1.966.05-3.937-.055-5.9a5.977,5.977,0,0,0-4.737-5.523,15.559,15.559,0,0,0-3.272-.2,6.2,6.2,0,0,0-6.351,6.325c-.023,1.692.02,3.385-.017,5.076-.014.644.219.826.836.818C221.3,162.381,223.431,162.4,225.558,162.4Zm15.5-2.242c0-2.623.055-5.2-.025-7.779a2.373,2.373,0,0,0-2.232-2.155,14.355,14.355,0,0,0-1.85-.035,2.591,2.591,0,0,0-2.6,3.3,21.233,21.233,0,0,1,.49,5.781c0,.287,0,.575,0,.885Zm-24.813,0c.014-.264.033-.486.035-.708a22.529,22.529,0,0,1,.495-5.987,2.59,2.59,0,0,0-2.632-3.277c-.457-.015-.915-.013-1.372,0a2.581,2.581,0,0,0-2.727,2.773c-.007,2.2,0,4.392,0,6.588,0,.2.021.4.033.612Z" transform="translate(0 -89.312)"/>
														  <path id="Path_254" data-name="Path 254" d="M298.589,44.523a5.972,5.972,0,1,1-6.069,5.89A5.967,5.967,0,0,1,298.589,44.523Zm-.1,2.068a3.9,3.9,0,1,0,3.912,3.931A3.889,3.889,0,0,0,298.486,46.591Z" transform="translate(-72.929 0)"/>
														  <path id="Path_255" data-name="Path 255" d="M224.343,84.1a3.77,3.77,0,1,1,3.749-3.755A3.764,3.764,0,0,1,224.343,84.1Zm-.03-2.066a1.7,1.7,0,1,0-1.693-1.7A1.688,1.688,0,0,0,224.313,82.03Z" transform="translate(-10.849 -27.636)"/>
														  <path id="Path_256" data-name="Path 256" d="M400.423,76.561a3.769,3.769,0,1,1-3.855,3.644A3.755,3.755,0,0,1,400.423,76.561Zm1.613,3.752a1.7,1.7,0,1,0-1.67,1.719A1.685,1.685,0,0,0,402.036,80.312Z" transform="translate(-162.683 -27.637)"/>
														</g>
													</svg>
												</div>
												<div class="sherah-progress-card__content">
													<div class="sherah-progress-card__heading">
														<span class="sherah-pcolor">Số Lượng Món Ăn</span>
                                                        <?php
                                                        $food = $collection->findAll("Food");
                                                        $countFood = iterator_count($food);
                                                        ?>
														<h4 class="sherah-progress-card__title"><b class="count-animate"><?=$countFood?></b></h4>
													</div>
													<div class="sherah-progress-card__button">
														<p class="sherah-progress-card__text sherah-color4">
															<svg class="sherah-color4__fill"  xmlns="http://www.w3.org/2000/svg" width="8.407" height="15.353" viewBox="0 0 8.407 15.353">
																<g id="Arrow_Icon" data-name="Arrow Icon" transform="translate(-584.97 -306)">
																<path id="Path_247" data-name="Path 247" d="M267.12,84.017c-.794.794-1.506,1.529-2.249,2.231a.7.7,0,0,1-1.2-.195.615.615,0,0,1,.177-.742q.744-.738,1.483-1.481.949-.949,1.9-1.9a.718.718,0,0,1,1.185-.016q1.659,1.653,3.311,3.312a.7.7,0,0,1,.077,1.067.718.718,0,0,1-1.069-.08c-.712-.708-1.422-1.418-2.206-2.2,0,.193,0,.312,0,.431q0,5.747.005,11.495c0,.076,0,.153,0,.229a.719.719,0,0,1-.689.8.71.71,0,0,1-.718-.8q-.008-3.406-.006-6.812,0-2.44,0-4.88C267.119,84.356,267.12,84.237,267.12,84.017Z" transform="translate(321.362 224.389)"></path>
																</g>
															</svg>
															+80.00 %
														</p>
														<a href="./products.php" class="sherah-see-all">See details</a>
													</div>
												</div>
											</div>
<!--											 End Progress Card -->
										</div>
										
									</div>

									<div class="row sherah-gap-30">
										
										<div class="col-lg-6 col-12">
											<!-- Charts Two -->
											<div class="charts-main sherah-default-bg charts-home-two sherah-border mg-top-30">
												<div class="charts-main__heading  mg-btm-20 charts-main__heading--v2">
													<h3 class="sherah-heading__title">Total sales</h3>
													<div class="sherah-charts-tabs">
														<!-- Tab List -->
														<div class="sherah-charts-tabs__list list-group " id="list-tab" role="tablist">
															<a class="list-group-item" data-bs-toggle="list" href="#sherah_tab1" role="tab" href="profile.html">7 Days</a>
															<a class="list-group-item active" data-bs-toggle="list" href="#sherah_tab1" role="tab">Monthly</a>
															<a class="list-group-item" data-bs-toggle="list" href="#sherah_tab1" role="tab">Yearly</a>
														</div>
													</div>
													<!-- End Topbar -->
												</div>
												<div class="tab-content" id="nav-tabContent">
													<div class="tab-pane fade show active" id="sherah_tab1" role="tabpanel" aria-labelledby="sherah_tab1">
														<div class="sherah-chart__inside sherah-chart__total--sales">
															<canvas id="myChart_Total_Sales_Home"></canvas>
														</div>
													</div>
												</div>
											</div>
											<!-- End Charts Two -->
											<div class="row">
												<div class="col-lg-6 col-md-6 col-12">
													<!-- Sherah Order Card -->
													<div class="sherah-order-card sherah-default-bg sherah-border sherah-flex-between mg-top-30">
														<div class="sherah-order-card__first">
															<p class="sherah-order-card__text mg-btm-10">Active Creator <span class="sherah-bcolor">86,346</span></p>
															<div class="sherah-chart__inside sherah-chart__inside--aorder">
																<canvas id="myChart_active_creators"></canvas>
															</div>
														</div>
														<div class="sherah-progress__single circle__one" data-value="0.115">
														</div>
													</div>
													<!-- End Sherah Order Card -->
												</div>

											</div>
										</div>
										<div class="col-lg-6 col-12">
											<!-- Charts One -->
											<div class="charts-main sherah-default-bg charts-home-two sherah-border mg-top-30">
												<!-- Top Heading -->
												<div class="charts-main__heading  mg-btm-20">
													<h3 class="sherah-heading__title">Monthly Statistics</h3>
												</div>
												<div class="sherah-flex-between mg-btm-30">
												<div class="charts-main__middle m-0">
													<ul class="sherah-progress-list sherah-progress-list__bg sherah-progress-list__inline sherah-gap-50">
														<li>
															<span class="sherah-progress-list__color sherah-color4__bg"></span>
															<p>Profit <span>13,570</span></p>
														</li>
														<li>
															<span class="sherah-progress-list__color sherah-color1__bg"></span>
															<p>Refunds<span>455,877</span></p>
														</li>
														<li>
															<span class="sherah-progress-list__color sherah-color3__bg"></span>
															<p>Expenses<span>455,877</span></p>
														</li>
													</ul>
												</div>
												<!-- Chart Dropdown Menu -->
												<div class="sherah-chart__dropdown sherah-chart__dropdown--bg">
													<ul  class="nav nav-tabs sherah-dropdown__list" id="nav-tab" role="tablist">
														<li class="nav-item dropdown">
															<a class="sherah-sidebar_btn sherah-offset-bg  sherah-border sherah-heading__tabs nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Last 7 days <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.7" d="M12.4124 0.247421C12.3327 0.169022 12.2379 0.106794 12.1335 0.0643287C12.0291 0.0218632 11.917 0 11.8039 0C11.6908 0 11.5787 0.0218632 11.4743 0.0643287C11.3699 0.106794 11.2751 0.169022 11.1954 0.247421L7.27012 4.07837C7.19045 4.15677 7.09566 4.219 6.99122 4.26146C6.88678 4.30393 6.77476 4.32579 6.66162 4.32579C6.54848 4.32579 6.43646 4.30393 6.33202 4.26146C6.22758 4.219 6.13279 4.15677 6.05312 4.07837L2.12785 0.247421C2.04818 0.169022 1.95338 0.106794 1.84895 0.0643287C1.74451 0.0218632 1.63249 0 1.51935 0C1.40621 0 1.29419 0.0218632 1.18975 0.0643287C1.08531 0.106794 0.990517 0.169022 0.910844 0.247421C0.751218 0.404141 0.661621 0.616141 0.661621 0.837119C0.661621 1.0581 0.751218 1.2701 0.910844 1.42682L4.84468 5.26613C5.32677 5.73605 5.98027 6 6.66162 6C7.34297 6 7.99647 5.73605 8.47856 5.26613L12.4124 1.42682C12.572 1.2701 12.6616 1.0581 12.6616 0.837119C12.6616 0.616141 12.572 0.404141 12.4124 0.247421Z"></path></svg></a>
															<ul class="dropdown-menu sherah-sidebar_dropdown">
																<a class="list-group-item" data-bs-toggle="list" data-bs-target="#sherah-chart__t1" role="tab">Last 15 Days</a>
																<a class="list-group-item" data-bs-toggle="list" data-bs-target="#sherah-chart__t1" role="tab">Last 7 Days</a>
																<a class="list-group-item"  data-bs-toggle="list" data-bs-target="#sherah-chart__t1" role="tab">Last Month</a>
															</ul>
														</li>
													</ul>
												</div>
												<!-- End Chart Dropdown Menu -->
												</div>
												<div class="charts-main__one">
													<div class="tab-content" id="nav-tabContent">
														<div class="tab-pane fade show active" id="sherah-chart__t1" role="tabpanel" aria-labelledby="sherah-chart__t1">
															<div class="sherah-chart__inside sherah-chart__monthly--states">
																<!-- Chart One -->
																<canvas id="myChart_one_monthly"></canvas>
															</div>
														</div>
														<div class="tab-pane fade" id="sherah-chart__t1" role="tabpanel" aria-labelledby="sherah-chart__t1">
															<div class="sherah-chart__inside sherah-chart__monthly--states">
																<!-- Chart One -->
																<canvas id="myChart_one_monthly"></canvas>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- End Charts One -->
										</div>
									</div>
									</div>


									
									
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>
					</div>	
				</div>	
			</section>	
			<!-- End sherah Dashboard -->
		</div>
		
		<!-- Sherah Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/charts.js"></script>
		<script src="js/datatables.min.js"></script> 
		<script src="js/circle-progress.min.js"></script>
		<script src="js/jquery-jvectormap.js"></script>
		<script src="js/jvector-map.js"></script>
		<script src="js/slickslider.min.js"></script>
		<script src="js/main.js"></script>
		
		<script>
			$(document).ready( function () {
			

				$('#sherah-map').vectorMap({
					map: 'world_mill_en',
					backgroundColor: 'transparent',
					panControl: false,
 				   zoomControl: false,
					regionStyle: {
						initial: {
							fill: '#C5C5C5'
						},
						hover: {
							fill: '#09AD95'
						}
					},
					showTooltip: true,
				
				});

		   } );

		  
		   $(".sherah-product-slider").slick({
				autoplay:false,
				speed: 800,
				autoplaySpeed: 3500,
				slidesToShow: 4,
				pauseOnHover: true,
				dots: false,
				center:true,
				arrows:true,
				cssEase: 'ease',
				margin:30,
				speed: 700,
				draggable: true,
				prevArrow: '<button class="Prev"><i class="fa-solid fa-angle-left"></i></button>',
				nextArrow: '<button class="Next"><i class="fa-solid fa-angle-right"></i></button>',
					responsive: [
					{
						breakpoint: 2000,
						settings: {
							slidesToShow: 6,
						}
					},
					{
						breakpoint: 1600,
						settings: {
							slidesToShow: 4,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 3,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 3,
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 2,
						}
					},
				]
			});  


		</script>

		<script>
			new CircleProgress('.circle__one', {
				max: 100,
				value: 60,

			});

			new CircleProgress('.circle__two', {
				max: 100,
				value: 60,

			});
		</script>
		<script>
			// Chart One
			const ctx = document.getElementById('myChart_one_monthly').getContext('2d');
			const myChart_one_monthly = new Chart(ctx, {
				type: 'bar',
				
				data: {
					labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16'],
					datasets: [{
						label: 'Profit',
						data: [90, 60, 85, 40, 75, 45, 95, 75, 45, 65, 35, 90, 40, 50, 30, 70],
						backgroundColor: [
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
							'#F9C200',
						],
						fill: true,
						tension:0.4,
						borderWidth: 0,
						borderSkipped:false,
						borderRadius:4,
						barPercentage:0.7,
						categoryPercentage:0.5,
					},{
						label: 'Profit',
						data: [85, 55, 80, 45, 70, 50, 90, 60, 55, 60, 45, 85, 50, 60, 40, 65],
						backgroundColor: [
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
							'#6176FE',
						],
						fill: true,
						tension:0.4,
						borderWidth: 0,
						borderSkipped:false,
						borderRadius:4,
						barPercentage:0.7,
						categoryPercentage:0.5,
					},{
						label: 'Profit',
						data: [90, 60, 85, 40, 75, 45, 95, 75, 45, 65, 35, 90, 40, 50, 30, 90],
						backgroundColor: [
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
							'#09AD95',
						],
						fill: true,
						tension:0.4,
						borderWidth: 0,
						borderSkipped:false,
						borderRadius:4,
						barPercentage:0.7,
						categoryPercentage:0.5,
					},
				]
				},
				 options: {
					intersect: false,
					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							ticks:{
							},
							grid:{
								display:false,
							},
							
						},
						y:{
							ticks: {
								callback: function(value, index, values) {
								return value + '%';
								}
							},
							grid:{
								drawBorder: false,
								color:'#c5c5c573',
								borderDash: [10, 10]
							},
						},

						
					},
					plugins: {
						tooltip: {
							padding: 10,
							displayColors: true,
							yAlign: 'bottom',
							backgroundColor: '#fff',
							titleColor: '#000',
							titleFont: {weight: 'normal'},
							bodyColor: '#2F3032',
							cornerRadius: 12,
							font: {
								size: 14
							},
							caretSize: 9,
							bodySpacing: 100,
							
						},
						legend: {
							position: 'top',
							display: false,
						},
						title: {
							display: false,
							text: 'Sell History'
						}
					}
				}
			});
			setInterval(() => {
				if (document.body.classList.contains('active')) {
					myChart_one_monthly.options.scales.y.grid.color = '#E2E7F11C ';
				} else {
					myChart_one_monthly.options.scales.y.grid.color = '#c5c5c573 ';
				}
				myChart_one_monthly.update();
			}, 500);


			// Chart Two
			const ctx_two = document.getElementById('myChart_Total_Sales_Home').getContext('2d');

			const gradientBg = ctx_two.createLinearGradient(0, 0, 0, 190);

			gradientBg.addColorStop(0, 'rgba(97, 118, 254, 0.43)');
			gradientBg.addColorStop(1, 'rgba(97, 118, 254, 0)');
			const myChart_Total_Sales_Home = new Chart(ctx_two, {
				type: 'line',
				
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					datasets: [{
						label: 'Visitor',
						data: [20, 15, 35, 45, 60, 45, 70, 50, 70, 70, 44, 50],
						backgroundColor: gradientBg,
						borderColor:'#6176FE',
						pointRadius: 0,
						tension: 0.5,
						borderWidth:6,
						fill:true,
						fillColor:'#fff',
					}]
				},
				
				options: {
					
					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:true,
								color:'#c5c5c573',
							},
							suggestedMax: 80, suggestedMin: 80,
							
						},
						y:{
							suggestedMax: 80, suggestedMin: 80,
							grid:{
								display:true,
								
								color:'#c5c5c573',
								borderDash: [10, 10]
							},
						},
					},
					
					plugins: {
					legend: {
						position: 'bottom',
						display: false,
					},
					title: {
						display: false,
					}
					}
				}
			});

			setInterval(() => {
				if (document.body.classList.contains('active')) {
					myChart_Total_Sales_Home.options.scales.x.grid.color = '#E2E7F11C ';
					myChart_Total_Sales_Home.options.scales.y.grid.color = '#E2E7F11C ';
				} else {
					myChart_Total_Sales_Home.options.scales.x.grid.color = '#c5c5c573 ';
					myChart_Total_Sales_Home.options.scales.y.grid.color = '#c5c5c573 ';
				}
				myChart_Total_Sales_Home.update();
			}, 500);

			// Chart Revenue
			const ctx_market = document.getElementById('myChart_Revenue').getContext('2d');

			const myChart_Revenue = new Chart(ctx_market, {
				type: 'line',
				
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					datasets: [{
						label: 'Visitor',
						data: [10, 15, 15, 90, 90, 45, 45, 45, 70, 70, 45, 45],
						backgroundColor: 'transparent',
						borderColor:'#F2C94C',
						borderWidth:5,
						fill:true,
						fillColor:'#fff',
						tension: 0.5,
						pointRadius: 0,
					},
					{
						label: 'Sells',
						data: [20, 86, 79, 30, 60, 45, 70, 50, 70, 30, 44, 50],
						backgroundColor: 'transparent',
						borderColor:'#09AD95',
						borderWidth:5,
						fill:true,
						tension: 0.5,
						fillColor:'#fff',
						fill:'start',
						pointRadius: 0,
					},
					{
						label: 'Profit',
						data: [20, 20, 79, 80, 60, 45, 70, 30, 20, 90, 44, 50],
						backgroundColor: 'transparent',
						borderColor:'#6176FE',
						borderWidth:5,
						fill:true,
						tension: 0.5,
						fillColor:'#fff',
						fill:'start',
						pointRadius: 0,
					}]
				},
				
				 options: {
					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:true,
								color:'#c5c5c573',
							},
							suggestedMax: 100, suggestedMin: 100,
							
						},
						y:{
							suggestedMax: 100, suggestedMin: 100,
							grid:{
								display:true,
								
								color:'#c5c5c573',
								borderDash: [10, 10]
							},
						},
					},
					plugins: {
					  legend: {
						position: 'top',
						display: false,
					  },
					  title: {
						display: false,
						text: 'Sell History'
					  }
					}
				}
			});

			setInterval(() => {
				if (document.body.classList.contains('active')) {
					myChart_Revenue.options.scales.y.grid.color = '#E2E7F11C ';
					myChart_Revenue.options.scales.x.grid.color = '#E2E7F11C ';
				} else {
					myChart_Revenue.options.scales.y.grid.color = '#c5c5c573 ';
					myChart_Revenue.options.scales.x.grid.color = '#c5c5c573 ';
				}
				myChart_Revenue.update();
			}, 500);
			
			


			// Chart Seven
			const ctx_total_clients = document.getElementById('myChart_active_creators').getContext('2d');

			const myChart_active_creators = new Chart(ctx_total_clients, {
				type: 'line',
				
				data: {
					labels: ['1', '2', '3', '4', '5'],
					datasets: [{
						label: 'Total Clients',
						data: [0, 10, 15, 10, 20],
						borderColor:'#F9C200',
                        backgroundColor: 'transparent',
						pointRadius: 0,
						tension: 0.5,
						borderWidth:7,
						fill:true,
						fillColor:'#fff',
					}]
				},
				
				options: {

					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:false,
								drawBorder: false,
							},
                            ticks:{
								display:false
							},
							suggestedMax: 10, suggestedMin: 30,
							
						},
						
						y:{
							grid:{
								display:false,
								drawBorder: false,
							},
							ticks:{
								display:false
							},
							suggestedMax: 10, suggestedMin: 30,
						},
					},
					
					plugins: {
					legend: {
						display: false,
					},
					title: {
						display: false,
					}
					}
				}
			});

			const ctx_recent_orders = document.getElementById('myChart_recent_orders').getContext('2d');

			const myChart_recent_orders = new Chart(ctx_recent_orders, {
				type: 'line',
				
				data: {
					labels: ['1', '2', '3', '4', '5'],
					datasets: [{
						label: 'Total Clients',
						data: [0, 10, 15, 10, 20],
						borderColor:'#09AD95',
                        backgroundColor: 'transparent',
						pointRadius: 0,
						tension: 0.5,
						borderWidth:7,
						fill:true,
						fillColor:'#fff',
					}]
				},
				
				options: {

					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:false,
								drawBorder: false,
							},
                            ticks:{
								display:false
							},
							suggestedMax: 10, suggestedMin: 30,
							
						},
						
						y:{
							grid:{
								display:false,
								drawBorder: false,
							},
							ticks:{
								display:false
							},
							suggestedMax: 10, suggestedMin: 30,
						},
					},
					
					plugins: {
					legend: {
						display: false,
					},
					title: {
						display: false,
					}
					}
				}
			});
		</script>
	</body>
</html>