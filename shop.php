<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include 'head.php'; ?>
</head>

<body>
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
                <!-- <a href="#">FAQs</a> -->
            </div>
            <!-- <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div> -->
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row d-flex flex-wrap flex-row" id="products">
                <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xsm-12">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/Products_new/shirt4.jpg">
                        </div>
                        <div class="product__item__text">
                            <h6>shirt</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>

                            <h5>$67.24</h5>

                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

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
    function getParameter(p)
    {
        var url = window.location.search.substring(1);
        var varUrl = url.split('&');
        for (var i = 0; i < varUrl.length; i++)
        {
            var parameter = varUrl[i].split('=');
            if (parameter[0] == p)
            {
                return parameter[1];
            }
        }
    }
    var id = decodeURI(getParameter('id'));
    let getProduct = function(start,Limit, cName){
        $.ajax({
            url : "fetchFronts.php",
            method : "POST",
            data: {getData : "getProductCat", id : id},
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
            $('#products').append(dyn);
            dyn = '';
        });
    }
    getProduct();
</script>
</body>

</html>