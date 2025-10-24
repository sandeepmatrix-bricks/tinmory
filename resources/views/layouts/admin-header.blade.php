<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riho admin is super flexible, powerful, clean & modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('admin/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Tinmory Admin</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/themify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/feather-icon.css')}}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/intltelinput.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/echart.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/datatables.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/bootstrap.css')}}">

    <!-- App CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin/assets/css/color-1.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/responsive.css')}}">
</head>
<body>
    <!-- Loader -->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>

    <!-- Tap on Top -->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <!-- Page Wrapper -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <!-- Search Form -->
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Riho .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                                <i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>

                <!-- Logo -->
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper">
                        <a href="index.html">Tinmory</a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                    </div>
                </div>

                <!-- Left Header -->
                <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
                    <div>
                        <a class="toggle-sidebar" href="#">
                            <i class="iconly-Category icli"></i>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="f-w-600">Welcome Admin</h4>
                            <img class="mt-0" src="{{asset('admin/assets/images/hand.gif')}}" alt="hand-gif">
                        </div>
                    </div>
                    <div class="welcome-content d-xl-block d-none">
                        <span class="text-truncate col-12"></span>
                    </div>
                </div>

                <!-- Right Header -->
                <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                    <ul class="nav-menus">
                        <!-- Search Bar (Desktop) -->
                        <li class="d-md-block d-none">
                            <div class="form search-form mb-0">
                                <div class="input-group">
                                    <span class="input-icon">
                                        <svg>
                                            <use href="{{asset('admin/assets/svg/icon-sprite.svg#search-header')}}"></use>
                                        </svg>
                                        <input class="w-100" type="search" placeholder="Search">
                                    </span>
                                </div>
                            </div>
                        </li>
                        <!-- Search Bar (Mobile) -->
                        <li class="d-md-none d-block">
                            <div class="form search-form mb-0">
                                <div class="input-group">
                                    <span class="input-show">
                                        <svg id="searchIcon">
                                            <use href="{{asset('admin/assets/svg/icon-sprite.svg#search-header')}}"></use>
                                        </svg>
                                        <div id="searchInput">
                                            <input type="search" placeholder="Search">
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <!-- Theme Mode Toggle -->
                        <li>
                            <div class="mode"><i class="moon" data-feather="moon"></i></div>
                        </li>
                        <!-- Notifications -->
                        <li class="onhover-dropdown notification-down">
                            <div class="notification-box">
                                <svg>
                                    <use href="{{asset('admin/assets/svg/icon-sprite.svg#notification-header')}}"></use>
                                </svg>
                                <span class="badge rounded-pill badge-secondary">4</span>
                            </div>
                            <div class="onhover-show-div notification-dropdown">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="common-space">
                                            <h4 class="text-start f-w-600">Notifications</h4>
                                            <div><span>4 New</span></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="notitications-bar">
                                            <!-- Notification Tabs -->
                                            <ul class="nav nav-pills nav-primary p-0" id="pills-tab" role="tablist">
                                                <li class="nav-item p-0">
                                                    <a class="nav-link active" id="pills-aboutus-tab" data-bs-toggle="pill" href="#pills-aboutus" role="tab" aria-controls="pills-aboutus" aria-selected="true">All(3)</a>
                                                </li>
                                                <li class="nav-item p-0">
                                                    <a class="nav-link" id="pills-blog-tab" data-bs-toggle="pill" href="#pills-blog" role="tab" aria-controls="pills-blog" aria-selected="false">Messages</a>
                                                </li>
                                                <li class="nav-item p-0">
                                                    <a class="nav-link" id="pills-contactus-tab" data-bs-toggle="pill" href="#pills-contactus" role="tab" aria-controls="pills-contactus" aria-selected="false">Cart</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <!-- All Notifications -->
                                                <div class="tab-pane fade show active" id="pills-aboutus" role="tabpanel" aria-labelledby="pills-aboutus-tab">
                                                    <div class="user-message">
                                                        <div class="cart-dropdown notification-all">
                                                            <ul>
                                                                <li class="pr-0 pl-0 pb-3 pt-3">
                                                                    <div class="media">
                                                                        <img class="img-fluid b-r-5 me-3 img-60" src="{{asset('admin/assets/images/other-images/receiver-img.jpg')}}" alt="">
                                                                        <div class="media-body">
                                                                            <a class="f-light f-w-500" href="../template/product.html">Men Blue T-Shirt</a>
                                                                            <div class="qty-box">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-prepend">
                                                                                        <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">-</button>
                                                                                    </span>
                                                                                    <input class="form-control input-number" type="text" name="quantity" value="1">
                                                                                    <span class="input-group-prepend">
                                                                                        <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <h6 class="font-primary">$695.00</h6>
                                                                        </div>
                                                                        <div class="close-circle">
                                                                            <a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <ul>
                                                            <li>
                                                                <div class="user-alerts">
                                                                    <img class="user-image rounded-circle img-fluid me-2" src="{{asset('admin/assets/images/dashboard/user/5.jpg')}}" alt="user"/>
                                                                    <div class="user-name">
                                                                        <div>
                                                                            <h6><a class="f-w-500 f-14" href="../template/user-profile.html">Floyd Miles</a></h6>
                                                                            <span class="f-light f-w-500 f-12">Sir, Can i remove part in des...</span>
                                                                        </div>
                                                                        <div>
                                                                            <svg>
                                                                                <use href="{{asset('admin/assets/svg/icon-sprite.svg#more-vertical')}}"></use>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="user-alerts">
                                                                    <img class="user-image rounded-circle img-fluid me-2" src="{{asset('admin/assets/images/dashboard/user/6.jpg')}}" alt="user"/>
                                                                    <div class="user-name">
                                                                        <div>
                                                                            <h6><a class="f-w-500 f-14" href="../template/user-profile.html">Dianne Russell</a></h6>
                                                                            <span class="f-light f-w-500 f-12">So, what is my next work ?</span>
                                                                        </div>
                                                                        <div>
                                                                            <svg>
                                                                                <use href="{{asset('admin/assets/svg/icon-sprite.svg#more-vertical')}}"></use>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Messages -->
                                                <div class="tab-pane fade" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab">
                                                    <div class="notification-card">
                                                        <ul>
                                                            <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                                <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                    <div class="user-alerts flex-shrink-0">
                                                                        <img class="rounded-circle img-fluid img-40" src="{{asset('admin/assets/images/dashboard/user/3.jpg')}}" alt="user"/>
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <div class="common-space user-id w-100">
                                                                            <div class="common-space w-100">
                                                                                <a class="f-w-500 f-12" href="../template/private-chat.html">Robert D. Hambly</a>
                                                                            </div>
                                                                        </div>
                                                                        <div><span class="f-w-500 f-light f-12">Hello Miss...😊</span></div>
                                                                    </div>
                                                                    <span class="f-light f-w-500 f-12">44 sec</span>
                                                                </div>
                                                            </li>
                                                            <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                                <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                    <div class="user-alerts flex-shrink-0">
                                                                        <img class="rounded-circle img-fluid img-40" src="{{asset('admin/assets/images/dashboard/user/7.jpg')}}" alt="user"/>
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <div class="common-space user-id w-100">
                                                                            <div class="common-space w-100">
                                                                                <a class="f-w-500 f-12" href="../template/private-chat.html">Courtney C. Strang</a>
                                                                            </div>
                                                                        </div>
                                                                        <div><span class="f-w-500 f-light f-12">Wishing You a Happy Birthday Dear.. 🥳🎊</span></div>
                                                                    </div>
                                                                    <span class="f-light f-w-500 f-12">52 min</span>
                                                                </div>
                                                            </li>
                                                            <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                                <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                    <div class="user-alerts flex-shrink-0">
                                                                        <img class="rounded-circle img-fluid img-40" src="{{asset('admin/assets/images/dashboard/user/5.jpg')}}" alt="user"/>
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <div class="common-space user-id w-100">
                                                                            <div class="common-space w-100">
                                                                                <a class="f-w-500 f-12" href="../template/private-chat.html">Raye T. Sipes</a>
                                                                            </div>
                                                                        </div>
                                                                        <div><span class="f-w-500 f-light f-12">Hello Dear!! This Theme Is Very beautiful</span></div>
                                                                    </div>
                                                                    <span class="f-light f-w-500 f-12">48 min</span>
                                                                </div>
                                                            </li>
                                                            <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                                <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                    <div class="user-alerts flex-shrink-0">
                                                                        <img class="rounded-circle img-fluid img-40" src="{{asset('admin/assets/images/dashboard/user/6.jpg')}}" alt="user"/>
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <div class="common-space user-id w-100">
                                                                            <div class="common-space w-100">
                                                                                <a class="f-w-500 f-12" href="../template/private-chat.html">Henry S. Miller</a>
                                                                            </div>
                                                                        </div>
                                                                        <div><span class="f-w-500 f-light f-12">You’re older today than yesterday, happy birthday!</span></div>
                                                                    </div>
                                                                    <span class="f-light f-w-500 f-12">3 min</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Cart -->
                                                <div class="tab-pane fade" id="pills-contactus" role="tabpanel" aria-labelledby="pills-contactus-tab">
                                                    <div class="cart-dropdown mt-4">
                                                        <ul>
                                                            <li class="pr-0 pl-0 pb-3">
                                                                <div class="media">
                                                                    <img class="img-fluid b-r-5 me-3 img-60" src="{{asset('admin/assets/images/other-images/cart-img.jpg')}}" alt="">
                                                                    <div class="media-body">
                                                                        <a class="f-light f-w-500" href="../template/product.html">Furniture Chair for Home</a>
                                                                        <div class="qty-box">
                                                                            <div class="input-group">
                                                                                <span class="input-group-prepend">
                                                                                    <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">-</button>
                                                                                </span>
                                                                                <input class="form-control input-number" type="text" name="quantity" value="1">
                                                                                <span class="input-group-prepend">
                                                                                    <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <h6 class="font-primary">$500</h6>
                                                                    </div>
                                                                    <div class="close-circle">
                                                                        <a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="pr-0 pl-0 pb-3 pt-3">
                                                                <div class="media">
                                                                    <img class="img-fluid b-r-5 me-3 img-60" src="{{asset('admin/assets/images/other-images/receiver-img.jpg')}}" alt="">
                                                                    <div class="media-body">
                                                                        <a class="f-light f-w-500" href="../template/product.html">Men Cotton Blend Blue T-Shirt</a>
                                                                        <div class="qty-box">
                                                                            <div class="input-group">
                                                                                <span class="input-group-prepend">
                                                                                    <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">-</button>
                                                                                </span>
                                                                                <input class="form-control input-number" type="text" name="quantity" value="1">
                                                                                <span class="input-group-prepend">
                                                                                    <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <h6 class="font-primary">$695.00</h6>
                                                                    </div>
                                                                    <div class="close-circle">
                                                                        <a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="mb-3 total">
                                                                <a href="../template/checkout.html">
                                                                    <h6 class="mb-0">Order Total :<span class="f-right">$1195.00</span></h6>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-footer pb-0 pr-0 pl-0">
                                                    <div class="text-center">
                                                        <a class="f-w-700" href="private-chat.html">
                                                            <button class="btn btn-primary" type="button" title="btn btn-primary">Check all</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Profile Dropdown -->
                        <li class="profile-nav onhover-dropdown">
                            <div class="media profile-media">
                                <img class="b-r-10" src="{{asset('admin/assets/images/dashboard/profile.png')}}" alt="">
                                <div class="media-body d-xxl-block d-none box-col-none">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>Alex Mora</span>
                                        <i class="middle fa fa-angle-down"></i>
                                    </div>
                                    <p class="mb-0 font-roboto">Admin</p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="user-profile.html"><i data-feather="user"></i><span>My Profile</span></a></li>
                                <li><a href="letter-box.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="edit-profile.html"><i data-feather="settings"></i><span>Settings</span></a></li>
                                <li>
                                    <a class="btn btn-pill btn-outline-primary btn-sm" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Handlebars Templates -->
                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">
                        <div class="ProfileCard-avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0">
                                <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                <polygon points="12 15 17 21 7 21 12 15"></polygon>
                            </svg>
                        </div>
                        <div class="ProfileCard-details">
                            <div class="ProfileCard-realName"></div>
                        </div>
                    </div>
                </script>
                <script class="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
                </script>
            </div>
        </div>
        <!-- Page Header Ends -->

        <!-- Page Body -->
        <div class="page-body-wrapper">
            <!-- Sidebar -->
            <div class="sidebar-wrapper" data-layout="stroke-svg">
                <div class="logo-wrapper">
                    <a href="index.html" style="color: #fff !important; font-size: 25px !important; font-weight: bold !important;">Tinmory</a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
                </div>
                <div class="logo-icon-wrapper">
                    <a href="index.html"><img class="img-fluid" src="{{asset('admin/assets/images/logo/logo-icon.png')}}" alt=""></a>
                </div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn">
                                <a href="index.html"><img class="img-fluid" src="{{asset('admin/assets/images/logo/logo-icon.png')}}" alt=""></a>
                                <div class="mobile-back text-end">
                                    <span>Back</span>
                                    <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li class="pin-title sidebar-main-title">
                                <div>
                                    <h6>Pinned</h6>
                                </div>
                            </li>
                            <!-- General Section -->
                            <li class="sidebar-main-title">
                                <div>
                                    <h6 class="lan-1">General</h6>
                                </div>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-home')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-home')}}"></use>
                                    </svg>
                                    <span class="lan-3">Dashboard</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="index.html">Default</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-ecommerce')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-ecommerce')}}"></use>
                                    </svg>
                                    <span>Home</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.home.banners.index')}}">Banner Details</a></li>
                                    <li><a href="{{route('admin.home.desc.index')}}">Description Details</a></li>
                                    <li><a href="{{ route('admin.home.highlights.index') }}">Highlight Details</a></li>
                                    <li><a href="{{ route('admin.home.carousels.index') }}">Carousels Details</a></li>
                                    <li><a href="{{ route('admin.home.faqs.index') }}">FAQ Details</a></li>
                                    <li><a href="{{ route('admin.home.contact.index') }}">Contact Details</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-widget')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-widget')}}"></use>
                                    </svg>
                                    <span class="lan-6">CMS</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="general-widget.html">Home</a></li>
                                    <li><a href="chart-widget.html">About us</a></li>
                                    <li><a href="chart-widget.html">Services</a></li>
                                    <li><a href="chart-widget.html">Contact us</a></li>
                                </ul>
                            </li>
                            <!-- Applications Section -->
                            <li class="sidebar-main-title">
                                <div>
                                    <h6 class="lan-8">Applications</h6>
                                </div>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-project')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-project')}}"></use>
                                    </svg>
                                    <span>Warehouse</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="projects.html">Warehouse List</a></li>
                                    <li><a href="{{route('admin.add_warehouse_show')}}">Add New</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-ecommerce')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-ecommerce')}}"></use>
                                    </svg>
                                    <span>Ecommerce</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.add_product_show')}}">Add Products</a></li>
                                    <li><a href="{{route('admin.all_products_show')}}">Products</a></li>
                                    <li><a href="{{route('admin.all_catgeory_show')}}">Category</a></li>
                                    <li><a href="order-history.html">Orders</a></li> 
                                    <li><a href="order-history.html">Invoices</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="list-wish.html">Wishlist</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-user')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-user')}}"></use>
                                    </svg>
                                    <span>Users</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.add_user_show')}}">Add Users</a></li>
                                    <li><a href="user-profile.html">Customers</a></li>
                                    <li><a href="{{route('admin.get_all_regional_managers')}}">Regional Managers</a></li>
                                    <li><a href="{{route('admin.get_all_staff_members')}}">Staff Members</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="contacts.html">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-contact')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-contact')}}"></use>
                                    </svg>
                                    <span>Contact Submissios</span>
                                </a>
                            </li>
                            <!-- Miscellaneous Section -->
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>Miscellaneous</h6>
                                </div>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-gallery')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-gallery')}}"></use>
                                    </svg>
                                    <span>Gallery</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="gallery.html">Gallery Grid</a></li>
                                    <li><a href="gallery-with-description.html">Gallery Grid Desc</a></li>
                                    <li><a href="gallery-masonry.html">Masonry Gallery</a></li>
                                    <li><a href="masonry-gallery-with-disc.html">Masonry with Desc</a></li>
                                    <li><a href="gallery-hover.html">Hover Effects</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-blog')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-blog')}}"></use>
                                    </svg>
                                    <span>Blogs</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="blog.html">Blog Details</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                    <li><a href="add-post.html">Add Post</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="faq.html">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-faq')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-faq')}}"></use>
                                    </svg>
                                    <span>FAQ</span>
                                </a>
                            </li>
                            <li class="sidebar-list">
                                <i class="fa fa-thumb-tack"></i>
                                <a class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#stroke-job-search')}}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{asset('admin/assets/svg/icon-sprite.svg#fill-job-search')}}"></use>
                                    </svg>
                                    <span>Job Search</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="job-cards-view.html">Cards view</a></li>
                                    <li><a href="job-list-view.html">List View</a></li>
                                    <li><a href="job-details.html">Job Details</a></li>
                                    <li><a href="job-apply.html">Apply</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </div>
                </nav>
            </div>
            <!-- Sidebar Ends -->

            <!-- Content -->
            @yield('content')

            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2025 © Tinmory</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JavaScript -->
    <!-- Core Libraries -->
    <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="{{asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <script src="{{asset('admin/assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{asset('admin/assets/js/scrollbar/custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/config.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/assets/js/sidebar-pin.js')}}"></script>
    <script src="{{asset('admin/assets/js/slick/slick.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/slick/slick.js')}}"></script>
    <script src="{{asset('admin/assets/js/header-slick.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/echart/esl.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/echart/config.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/echart/pie-chart/facePrint.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/echart/pie-chart/testHelper.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/echart/pie-chart/custom-transition-texture.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/echart/data/symbols.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard/dashboard_3.js')}}"></script>
    <script src="{{asset('admin/assets/js/flat-pickr/flatpickr.js')}}"></script>
    <script src="{{asset('admin/assets/js/flat-pickr/custom-flatpickr.js')}}"></script>
    <script src="{{asset('admin/assets/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('admin/assets/js/dropzone/dropzone-script.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2/tagify.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2/tagify.polyfills.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2/intltelinput.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/add-product/select4-custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/height-equal.js')}}"></script>
    <script src="{{asset('admin/assets/js/tooltip-init.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('admin/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/notify/index.js') }}"></script>

    <!-- Theme Script -->
    <script src="{{asset('admin/assets/js/script.js')}}"></script>

    <!-- Inline Scripts -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $(document).ready(function() {
            $('#user_country').on('change', function() {
                var countryID = $(this).val();
                if(countryID) {
                    $.ajax({
                        url: '/get-states/' + countryID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#user_state').empty().append('<option value="0">--Select--</option>');
                            $('#user_city').empty().append('<option value="0">--Select--</option>');
                            $.each(data, function(key, value) {
                                $('#user_state').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#user_state').empty().append('<option value="0">--Select--</option>');
                    $('#user_city').empty().append('<option value="0">--Select--</option>');
                }
            });

            $('#user_state').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: '/get-cities/' + stateID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#user_city').empty().append('<option value="0">--Select--</option>');
                            $.each(data, function(key, value) {
                                $('#user_city').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#user_city').empty().append('<option value="0">--Select--</option>');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#warehouse_country').on('change', function() {
                var countryID = $(this).val();
                if(countryID) {
                    $.ajax({
                        url: '/get-states/' + countryID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#warehouse_state').empty().append('<option value="0">--Select--</option>');
                            $('#warehouse_city').empty().append('<option value="0">--Select--</option>');
                            $.each(data, function(key, value) {
                                $('#warehouse_state').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#warehouse_state').empty().append('<option value="0">--Select--</option>');
                    $('#warehouse_city').empty().append('<option value="0">--Select--</option>');
                }
            });

            $('#warehouse_state').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: '/get-cities/' + stateID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#warehouse_city').empty().append('<option value="0">--Select--</option>');
                            $.each(data, function(key, value) {
                                $('#warehouse_city').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                            });
                        }
                    });
                } else {
                    $('#warehouse_city').empty().append('<option value="0">--Select--</option>');
                }
            });
        });
    </script>

    <!-- Custom Styles -->
    <style>
        .ck-content ul {
            list-style: disc !important;
            padding-left: 20px !important;
        }
        .ck-content ol {
            list-style: decimal !important;
            padding-left: 20px !important;
        }
        .ck-content li {
            margin-bottom: 5px;
        }
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>

    <!-- CKEditor Initialization -->
    <script>
        ClassicEditor.create(document.querySelector('#summernote'), {
            toolbar: [
                'heading',
                '|',
                'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript',
                'link', 'blockQuote', 'codeBlock',
                'bulletedList', 'numberedList', 'todoList',
                '|',
                'alignment', 'outdent', 'indent',
                '|',
                'fontColor', 'fontBackgroundColor', 'fontSize', 'fontFamily',
                '|',
                'insertTable', 'imageUpload', 'mediaEmbed', 'horizontalLine', 'pageBreak',
                '|',
                'undo', 'redo', 'removeFormat', 'highlight', 'specialCharacters'
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ]
            },
            fontSize: {
                options: ['tiny', 'small', 'default', 'big', 'huge']
            },
            alignment: {
                options: ['left', 'center', 'right', 'justify']
            }
        }).catch(error => {
            console.error(error);
        });
    </script>

    <!-- Notifications -->
    @if (session('message'))
    <script>
        (function ($) {
            "use strict";
            $.notify(
                '<i class="fa fa-bell-o"></i><strong>{{ session('message') }}</strong>',
                {
                    type: "theme",
                    allow_dismiss: true,
                    delay: 5000,
                    showProgressbar: true,
                    timer: 300,
                    animate: {
                        enter: "animated fadeInDown",
                        exit: "animated fadeOutUp",
                    },
                }
            );
        })(jQuery);
    </script>
    @endif

    @if ($errors->any())
    <script>
        (function ($) {
            "use strict";
            $.notify(
                '<i class="fa fa-bell-o"></i><strong>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</strong>',
                {
                    type: "danger",
                    allow_dismiss: true,
                    delay: 8000,
                    showProgressbar: true,
                    timer: 300,
                    animate: {
                        enter: "animated fadeInDown",
                        exit: "animated fadeOutUp",
                    },
                }
            );
        })(jQuery);
    </script>
    @endif

    <!-- Dynamic Table Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tableBody = document.querySelector('#highlightItemsTable tbody');

            function addButtonHtml() {
                return '<button type="button" class="btn btn-primary addRow">Add More</button>';
            }

            function removeButtonHtml() {
                return '<button type="button" class="btn btn-danger removeRow">Remove</button>';
            }

            function addRow() {
                const lastRow = tableBody.querySelector('tr:last-child');
                lastRow.querySelector('td:last-child').innerHTML = removeButtonHtml();

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>
                        <input type="file" name="icons[]" accept="image/*" class="form-control" required>
                        <small class="text-secondary">Max size 2MB. Format: jpg, jpeg, png, webp</small>
                    </td>
                    <td>
                        <input type="text" name="titles[]" placeholder="Enter Title" class="form-control" required>
                    </td>
                    <td>
                        <textarea name="descriptions[]" placeholder="Enter Description" class="form-control" required></textarea>
                    </td>
                    <td>${addButtonHtml()}</td>
                `;
                tableBody.appendChild(newRow);
            }

            tableBody.addEventListener('click', function(e) {
                if (e.target.classList.contains('addRow')) {
                    addRow();
                }
                if (e.target.classList.contains('removeRow')) {
                    e.target.closest('tr').remove();
                    const rows = tableBody.querySelectorAll('tr');
                    if (rows.length > 0) {
                        rows.forEach((row, index) => {
                            const actionCell = row.querySelector('td:last-child');
                            if (index === rows.length - 1) {
                                actionCell.innerHTML = addButtonHtml();
                            } else {
                                actionCell.innerHTML = removeButtonHtml();
                            }
                        });
                    }
                }
            });
        });
    </script>

    @push('scripts')
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('warehouseSearch');
            const list = document.getElementById('warehouseList');
            const items = list.getElementsByTagName('li');

            searchInput.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();
                for (let i = 0; i < items.length; i++) {
                    const label = items[i].textContent || items[i].innerText;
                    items[i].style.display = label.toLowerCase().includes(filter) ? "" : "none";
                }
            });
        });
        </script>
    @endpush
</body>
</html>