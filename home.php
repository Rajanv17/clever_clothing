<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'head.php'; ?>
    <?php include 'frontSession.php'; ?>
</head>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <a href="#">Sign in</a>
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <!-- <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a> -->
        <!-- <a href="#"><img src="img/icon/heart.png" alt=""></a> -->
        <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
        <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<?php include 'header.php'; ?>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Clothing Collection</h6>
                            <h2>Fall - Men's Collection 2023</h2>
                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                            commitment to exceptional quality.</p>
                            <a href="shop.php" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <!-- <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/hero/hero_7.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8" style="margin-left: 750px;">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>Fall - Women's Collection 2023</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p>
                                <a href="shop.php" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <!-- <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <!-- <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="img/" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing Collections 2030</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner-2.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="img/banner/banner-3.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Spring 2030</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Banner Section End -->

    <!-- Categories section -->

    <br /><br /><br><br><br>

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <!-- <li data-filter=".new-arrivals">New Arrivals</li>
                            <li data-filter=".hot-sales">Hot Sales</li> -->
                        </ul>
                    </div>
                </div>
                <div class="row d-flex flex-wrap flex-row justify-content-center" id="bestSellers">
                    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                        <a href="shop-details?id=">
                            <div class="card shadow p-2">
                                <div class="product__item__pic set-bg" data-setbg="img/Products_new/jeans1.jpg">
                                </div>
                                <div class="product__item__text">
                                    <p class="h4 text-center">Pant</p>
                                    <p class="h6 text-center">Rs. 749</p>
                                </div>
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- Product Section End -->

        <!-- Categories Section Begin -->
        <section class="container">
            <div class="row d-flex flex-wrap flex-row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xsm-12 m-0 px-2">
                    <a href="shop.php?id=2">
                        <div class=" card p-2 shadow">
                            <img src="deal_1.jpg" alt="" width="500" height="500" class="img-fluid">
                            <p class="h3 text-center mt-2">Women's Wear</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xsm-12 m-0 px-2">
                    <a href="shop.php?id=1">
                        <div class=" card p-2 shadow">
                            <img src="img/Products_new/shirt11.jpg" alt="" width="500" height="446">
                            <p class="h3 text-center mt-2">Men's Wear</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xsm-12 m-0 px-2">
                    <a href="shop.php?id=3">
                        <div class=" card p-2 shadow">
                            <img src="img/Clothing Images/kids_coll_1.jpg" alt="" width="500" height="446">
                            <p class="h3 text-center mt-2">Children's Wear</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->

        <!-- Instagram Section Begin -->
        <section class="instagram spad" style="margin-bottom: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="instagram__pic">
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-1.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-2.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-3.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-4.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-5.jpg"></div>
                            <div class="instagram__pic__item set-bg" data-setbg="img/instagram/instagram-6.jpg"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="instagram__text">
                            <h2>Instagram</h2>
                            <p>Variety of Collection to explore & diverse your fashion with our passion, Join us on our social media platform to know new updates about our products.</p>
                            <h3>#Clever_Clothing</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Instagram Section End -->

        <!-- Latest Blog Section Begin -->
    <!-- <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>What Curling Irons Are The Best Ones</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Eternity Bands Do Last Forever</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>The Health Benefits Of Sunglasses</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Latest Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        let getProduct = function(){
            $.ajax({
                url : "fetchFronts.php",
                method : "POST",
                data: {getData : "getBestProduct"},
                dataType : "json",
                success : function(data){
                    if (data.code == 200) {
                        setProduct(data.data);
                    }
                }
            });
        }
        let setProduct = function(data) {
            $.each(data, function(index, val) {
                let dyn = '';
                dyn +='<div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">';
                dyn +='<a href="shop-details.php?id='+val.id+'">';
                dyn +='<div class="card shadow p-2">';
                dyn +='<img class="img-fluid" src="'+val.img+'">';
                dyn +='<div class="product__item__text">';
                dyn +='<p class="h4 text-center">'+val.name+'</p>';
                dyn +='<p class="h6 text-center">Rs. '+val.price+'</p>';
                dyn +='</div>';
                dyn +='</div>';
                dyn +='</a>';
                dyn +='</div>';
                $('#bestSellers').append(dyn);
                dyn = '';
            });
        }
        getProduct();
    </script>
</body>

</html>