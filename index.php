<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>artisian</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Rahuri, Maharashtra</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">artisian@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
           <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Artisan Marketplace</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            
                            <div class="nav-item dropdown">
                                <a href="shop.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Products</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="shop.php" class="dropdown-item" data-category="mac">Macrame</a>
                                    <a href="#stone" class="dropdown-item" data-category="stone">Stone art</a>
                                    <a href="#p" class="dropdown-item" data-category="p">Hoopart</a>
                                    <a href="#woolean" class="dropdown-item" data-category="woolean">Woolean</a>
                                    <a href="#e" class="dropdown-item" data-category="e">Coconut Shell Art</a>
                                    <a href="#mandala" class="dropdown-item" data-category="mandala">Mandala art</a>
                                    <a href="#clay" class="dropdown-item" data-category="clay">Clay products</a>
                                    
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                       <div class="d-flex m-3 ms-auto align-items-center"> <!-- Shifted to the right with ms-auto -->
                <div class="nav-item dropdown">
                    <a href="account.php" class="nav-item nav-link d-flex align-items-center text-black dropdown-toggle" data-bs-toggle="dropdown">
                        <!-- Account icon -->
                        <span >My Account</span> <!-- "My Account" text with spacing -->
                         <!-- Dropdown arrow icon -->
                    </a>
                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                        
                        <a href="order_history.php" class="dropdown-item">My Orders</a>
                        <a href="reviews.php" class="dropdown-item">My Reviews</a>
                       
                    </div>
                </div> </div>

                         <div class="d-flex m-3 me-0">
                            <center><button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button></center>
                            <center>
                            <a href="cart.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo isset($_SESSION['cart']) ?'('. count($_SESSION['cart']).')' :'';?></span>
                            </a>
                            </center>
                           <center> <a href="login.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            
                             
        
            <span>
                <center><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?></center>
            </span>
        </a></center>
  
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h2 class="mb-3 text-secondary">Enhance Beauty of yours with our</h2>
                        <h1 class="mb-5 display-3 text-primary">Beautiful Arts</h1>
                        
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="img/a3.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="img/w5.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over Rs 1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Artistic Products</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 130px;">Macrame</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 130px;">Weaving</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                        <span class="text-dark" style="width: 130px;">Stone art</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                        <span class="text-dark" style="width: 130px;">Wooden art </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/a5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"></div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Painting</h4>
                                                    <p>Oil painting.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/i4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Wooden</h4>
                                                    <p>Wooden house.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/i.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Conchried Bag</h4>
                                                    <p>Conchried Bag.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/e1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Engagement Hoopart</h4>
                                                    <p>Wedding engagement hoop gift.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="9"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Engagement Hoopart">
            <input type="hidden" name="price" value="2000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/m3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Doodle Mandala</h4>
                                                    <p>doodle mandala with pens.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="22"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Doodle Mandala">
            <input type="hidden" name="price" value="1500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/c3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>White Pottery</h4>
                                                    <p>White pottery with warli work.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                       <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="25"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="White Pottery">
            <input type="hidden" name="price" value="500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div></form>
                                       <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/i1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Feather Wall Hanging</h4>
                                                    <p>Leaf shape macrame hanging.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="2"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="wall hanging">
            <input type="hidden" name="price" value="500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/p8.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Woolean Hanging</h4>
                                                    <p>Colourful door/wall hanging.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="13"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Woolean Hanging">
            <input type="hidden" name="price" value="500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/p1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                               
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Akashdiya</h4>
                                                    <p>White color Akashdiya.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="4"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Akashdiya">
            <input type="hidden" name="price" value="1500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  </form>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/i10.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Zoola</h4>
                                                    <p>White color zoola.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 800</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="3"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Zoola">
            <input type="hidden" name="price" value="800">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
 <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/i2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                               
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Sculpture</h4>
                                                    <p>It is a macrame Sculpture.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="1"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="sculpture">
            <input type="hidden" name="price" value="1000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         </form>
 <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/m6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Macrame Planter</h4>
                                                    <p>Macrame Hanging Planter.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 400</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/w4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Woolean Kite</h4>
                                                    <p>Woolean kite for wall Decore.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1000</p>
                                                       <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="16"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Woolean Kite">
            <input type="hidden" name="price" value="1000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div></form>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/more.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                               
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Woolean Peacock</h4>
                                                    <p>Pinl color woolean peacock.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/w2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Woolean Elephant</h4>
                                                    <p>Woolean Elephant.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="15"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Woolean Elephant">
            <input type="hidden" name="price" value="1500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div></form>

                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/w1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Baby Set</h4>
                                                    <p>Woolean cap and socks for baby.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="14"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Baby set">
            <input type="hidden" name="price" value="1500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                       <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/p3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                               
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4> Stone Painting</h4>
                                                    <p>Mandala Stone Painting.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                                       <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="5"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Stone painting">
            <input type="hidden" name="price" value="2000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/p4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Apricots</h4>
                                                    <p>Stone Apricots.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="6"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Apricots">
            <input type="hidden" name="price" value="500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                         <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/s2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Pebble Art</h4>
                                                    <p>Boy and girl pebble Art.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1000</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="8"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Pebble art">
            <input type="hidden" name="price" value="1000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  </form>
                                         <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/s3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Wall Mural</h4>
                                                    <p>different size stone wall mural.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                       <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="7"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Wall Mural">
            <input type="hidden" name="price" value="1500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <!-- Fruits Shop End-->

        
        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">About us</h1>
                            <p class="mb-4 text-dark">We Artisian Marketplace situated at Rahuri, Ahmednagar, Maharashtra are a popular firm that create and sell a wide range of andmade products. We also provide Artist to create their own account and sell their art. We showing unique and new products.</p>
                            <a href="shop.php" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="img/p4.jpg" class="img-fluid w-100 rounded" alt="">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Bestseller Products</h1>
                    <p>Following are our Bestseller Products which are more like by customers</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-4">
                        <form action="cartmanage.php" method="post">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/p6.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Red Clay Pottery</a>
                                    
                                    <h4 class="mb-3">Rs 1000</h4>
                                   <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="27"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="sculpture">
            <input type="hidden" name="price" value="1000">
                                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                         <form action="cartmanage.php" method="post">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/p7.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Dinner Set</a>
                                    
                                    <h4 class="mb-3">Rs 2000</h4>
                                    <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="28"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Dinner Set">
            <input type="hidden" name="price" value="2000">
                                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                          <form action="cartmanage.php" method="post">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/p3.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Stone Painting</a>
                                    
                                    <h4 class="mb-3">Rs 2000</h4>
                                     <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="5"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Stone painting">
            <input type="hidden" name="price" value="2000">
                                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <form action="cartmanage.php" method="post">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/c1.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Warli Pottery</a>
                                    
                                    <h4 class="mb-3">Rs 1500</h4>
                                    <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="26"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="sculpture">
            <input type="hidden" name="price" value="1000">
                                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/i6.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Wooden Owl</a>
                                    
                                    <h4 class="mb-3">Rs 1500</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <form action="cartmanage.php" method="post">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/m4.jpg" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="#" class="h5">Dot Mandala</a>
                                    
                                    <h4 class="mb-3">Rs 2500</h4>
                                   <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="23"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Dot Mandala">
            <input type="hidden" name="price" value="2500">
                                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/a2.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">painting with color pencils.</a>
                                
                                <h4 class="mb-3">Rs 2500</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="img/i3.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Wooden crafted tree.</a>
                                
                                <h4 class="mb-3">Rs 1000</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                         <form action="cartmanage.php" method="post">
                        <div class="text-center">
                            <img src="img/c2.jpg" class="img-fluid rounded" alt="">
                            <div class="py-4">
                                <a href="#" class="h5">Warli Pottery</a>
                                
                                <h4 class="mb-3">Rs 1500</h4>
                                 <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="26"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="sculpture">
            <input type="hidden" name="price" value="1000">
                                                    </form>
                            
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-6 col-lg-6 col-xl-3">
                         <form action="cartmanage.php" method="post">
                        <div class="text-center">
                            <img src="img/i10.jpg" class="img-fluid rounded" alt="">
                            <div class="py-2">
                                <a href="#" class="h5">Zoola</a>
                                
                                <h4 class="mb-3">Rs 800</h4>
                                <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="3"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Zoola">
            <input type="hidden" name="price" value="800">
                            </div>
                        </div>
                    </form>
                    </div>
               
                </div>
            </div>
        </div>
        <!-- Bestsaler Product End -->


       


        <!-- Tastimonial Start -->
        <div class="container-fluid testimonial py-4">
            <div class="container py-4">
                <div class="testimonial-header text-center">
                    <h2 class="text-primary">Our Testimonial</h2>
                    <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Artisian Marketplace provides best Handmade products.
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Vaishnavi Adhav</h4>
                                    <p class="m-0 pb-3">Customer</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">I like the features of website.
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Ayush Sinha</h4>
                                    <p class="m-0 pb-3">Customer</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">Products are best and are in affordable price.
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">Pooja Jadhav</h4>
                                    <p class="m-0 pb-3">Customer</p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tastimonial End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">Artisan Marketplace</h1>
                                
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">We provide best and unique products and also accept orders for products with customer choice.</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            
                            <a class="btn-link" href="contact.php">Contact Us</a>
                            <a class="btn-link" href="">Privacy Policy</a>
                            <a class="btn-link" href="">Terms & Condition</a>
                           
                            <a class="btn-link" href="">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="">My Account</a>
                            
                            <a class="btn-link" href="cart.php">Shopping Cart</a>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: Rahuri, Ahmednagar,Maharashtra</p>
                            <p>Email: artisian@gmail.com</p>
                            <p>Phone: +9876475758</p>
                            <p>Payment Accepted</p>
                            <img src="img/payment.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Artisan Marketplace</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Artisian design team</a> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>