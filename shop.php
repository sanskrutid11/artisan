<?php
session_start();

?>
<?php
// Database connection
require_once 'C:\xampp\htdocs\artisian\connection.php';

// Query to retrieve all products
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title></title>
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
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Rahuri, Maharashtra </a></small>
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
                    <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">Artisan Marketplace</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            
                             <div class="nav-item dropdown">
                                <a href="shop.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Products</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="#mac" class="dropdown-item" data-category="mac">Macrame</a>
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


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        
            <div class="health_carousel-container"> 
        <h2 class="text-uppercase">Macrame </h2>
        <div class="carousel-wrap layout_padding2" id="mac">
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
                            <img src="img/i2.jpg" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                            <h4>Sculpture</h4>
                            <p>It is a macrame Sculpture.</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                <form action="cartmanage.php" method="post">
                                    <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </button>
                                    <input type="hidden" name="med_id" value="1">
                                    <input type="hidden" name="med" value="sculpture">
                                    <input type="hidden" name="price" value="1000">
                                </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shreya:</strong> Beautiful work!</li>
                    
                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>

                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/i1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Wall Hanging</h4>
                                                    <p>Leaf shape macrame wall hanging.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="2"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="wall hanging">
            <input type="hidden" name="price" value="500">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                   <li><strong>Sai:</strong> Great quality.</li>
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
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
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Gauri:</strong> Bestest.</li>
                    
                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
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
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Sonali:</strong>Good.</li>
                    
                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                                    <div class="health_carousel-container"> 
        <h2 class="text-uppercase">Stone Art </h2>
        <div class="carousel-wrap layout_padding2" id="stone">
                                </div>
                            </div>
                                   <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
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
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shreya:</strong> Best work.</li>
                   
                </ul>
                              
                            </div>
                        </div>
                    </div>
                </div>
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
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    
                    <li><strong>Sai:</strong> Appreciating the worker.</li>
                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/s3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Wall Mural</h4>
                                                    <p>different size stone and color wall mural.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                       <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="7"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Wall Mural">
            <input type="hidden" name="price" value="1500">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shree:</strong> Beautiful.</li>
                    
                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
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
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Om:</strong> Nice</li>
                    
                </ul>
                              
                            </div>
                        </div>
                    </div>
                </div>
            <div class="health_carousel-container"> 
        <h2 class="text-uppercase">Hoopart</h2>
        <div class="carousel-wrap layout_padding2" id="p">
                                </div>
                            </div>
                                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
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
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    
                    <li><strong>Sai:</strong> Greatest.</li>
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/e7.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Quote Hoopart</h4>
                                                    <p>Quote Hoopart for Motivation.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="10"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Quote Hoopart">
            <input type="hidden" name="price" value="1500">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Riya:</strong> Best motivation quote.</li>
                    
                </ul>
                              
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/e5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Lord Krishna</h4>
                                                    <p>Lord Krishna with flute. </p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="11"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Lord Krishna">
            <input type="hidden" name="price" value="1500">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shreya:</strong> I like the work.</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/e6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Flower Hoopart</h4>
                                                    <p>Sunflower Hoopart.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="12"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Flower Hoopart">
            <input type="hidden" name="price" value="2000">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                   
                    <li><strong>Sai:</strong> Great quality.</li>
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
            <div class="health_carousel-container"> 
        <h2 class="text-uppercase">Woolean</h2>
        <div class="carousel-wrap layout_padding2" id="woolean">
                                </div>
                            </div>
                                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
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
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Sima:</strong> Beautiful hanging.</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
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
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                  
                    <li><strong>Sai:</strong> Great quality.</li>
                </ul>
                               
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
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shreya:</strong> Beautiful Showpiece.</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
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
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Bhushan:</strong> Beautiful work!</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                  
            <div class="health_carousel-container"> 
        <h2 class="text-uppercase">Coconut Shell Art</h2>
        <div class="carousel-wrap layout_padding2" id="e">
                                </div>
                            </div>
                                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/q.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Tealight</h4>
                                                    <p>Coconut shell Tealight.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 400</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="17"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Tealight">
            <input type="hidden" name="price" value="400">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Siya:</strong> Good Idea.</li>
                   
                </ul>
                              
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/q1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Shell Flower</h4>
                                                    <p>Coconut shell flower showpiece.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="18"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Shell Flower">
            <input type="hidden" name="price" value="500">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shreya:</strong>Extraordinary.</li>
                   
                </ul>
                              
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/q2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Coconut Ganesha</h4>
                                                    <p>Shri Ganesha from cocount shell.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="19"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Coconut Ganesha">
            <input type="hidden" name="price" value="500">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shreya:</strong> Love the work.</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/q3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                               
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Coconut Planter</h4>
                                                    <p>Cocount shell plnater.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 550</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="20"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Coconut Planter">
            <input type="hidden" name="price" value="550">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    
                    <li><strong>Sai:</strong> Great quality.</li>
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
            <div class="health_carousel-container"> 
        <h2 class="text-uppercase">Mandala Art</h2>
        <div class="carousel-wrap layout_padding2" id="mandala">
                                </div>
                            </div>
                                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/m2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Buddha Mandala Art</h4>
                                                    <p>Buddha mandala with surronding dots.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="21"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Buddha mandala art">
            <input type="hidden" name="price" value="2000">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Sima:</strong> Best.</li>
                    
                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/m3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Doodle Mandala</h4>
                                                    <p>Doodle mandala with colourful pens.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="22"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Doodle Mandala">
            <input type="hidden" name="price" value="1500">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Aarti:</strong> Beautiful work!</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/m4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Dot Mandala</h4>
                                                    <p>Dotted mandala with center flower.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="23"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Dot Mandala">
            <input type="hidden" name="price" value="2500">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    
                    <li><strong>Sai:</strong> Great quality work.</li>
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/l.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                               
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Peacock Mandala</h4>
                                                    <p>Blue and White peacock mandala.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="24"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Peacock Mandala">
            <input type="hidden" name="price" value="2000">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Suresh:</strong> Love the work</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
            <div class="health_carousel-container"> 
        <h2 class="text-uppercase">Clay Products</h2>
        <div class="carousel-wrap layout_padding2" id="clay">
                                </div>
                            </div>
                                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
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
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    
                    <li><strong>Sai:</strong> Great quality.</li>
                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/c2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Warli Pottery</h4>
                                                    <p>Blue pottery with warli art.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1500</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="26"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="sculpture">
            <input type="hidden" name="price" value="1000">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Shreya:</strong> Beautiful work!</li>
                    
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/p6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Red Clay Pottery</h4>
                                                    <p>Red Clay Pottery</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 1000</p>
                                                        <button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="27"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="sculpture">
            <input type="hidden" name="price" value="1000">
                                                   </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                   
                    <li><strong>Shubham:</strong> Great quality.</li>
                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <form action="cartmanage.php" method="post">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/p7.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>Dinner Set</h4>
                                                    <p>Clay Dinner Set.</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs 2000</p>
<button name="addcart" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary" ></i> Add to cart</button>
                                                    <input type="hidden" name="med_id" value="28"> <!-- Add this line to store the medicine ID -->
            <input type="hidden" name="med" value="Dinner Set">
            <input type="hidden" name="price" value="2000">
                                                    </form>
                            </div>
                            <!-- Review/Comments Section -->
                            <div class="mt-3">
                                <h5>Reviews</h5>
                                <div id="reviews-container"></div>
                                <ul class="list-unstyled">
                    <li><strong>Ayush:</strong> Beautiful work!</li>
                   
                </ul>
                               
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
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Artisan design team</a> 
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
    <script type>
         <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const reviewsContainer = document.getElementById('reviews-container');
                        const viewMoreBtn = document.getElementById('view-more-btn');
                        const productId = 1; // This should be dynamic if you have multiple products
                        let offset = 0;
                        const limit = 5;

                        function loadReviews() {
                            const xhr = new XMLHttpRequest();
                            xhr.open('GET', `get_reviews.php?product_id=${productId}&offset=${offset}&limit=${limit}`, true);
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    const reviews = JSON.parse(xhr.responseText);
                                    if (reviews.length > 0) {
                                        reviews.forEach(review => {
                                            const reviewElement = document.createElement('div');
                                            reviewElement.classList.add('review');
                                            reviewElement.innerHTML = `<strong>${review.user_name}</strong> <em>${review.created_at}</em><p>${review.review_text}</p>`;
                                            reviewsContainer.appendChild(reviewElement);
                                        });
                                        offset += limit;
                                    } else {
                                        viewMoreBtn.style.display = 'none';
                                    }
                                }
                            };
                            xhr.send();
                        }

                        // Initial load
                        loadReviews();

                        // Load more reviews on button click
                        viewMoreBtn.addEventListener('click', loadReviews);
                    });
                </script>
    </script>
    </body>

</html>