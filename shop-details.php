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

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./home.php">Home</a>
                            <a href="./shop.php?id=1">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img  alt="" id="proImg" class="img-fluid" width="600" height="600">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <p class="h1 my-0" id="proName"></p>
                            <br>
                            <p class="h3 my-0" id="proPrice"></p>
                            <br>
                            <div class="product__details__cart__option">
                                <button id="addToCart" class="primary-btn" style="cursor: pointer;">add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note text-center" id="proDesc"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row d-flex flex-wrap flex-row justify-content-center" id="relPro">
            </div>
        </div>
    </section>
    <!-- Related Section End -->

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
        $(document).on('click', '#addToCart', function(){
            $('#loading').show();
            $.ajax({
                url: 'frontprocessdata.php',
                type: 'POST',
                dataType: 'json',
                data: {process: 'addCart', id : id},
                success : function (datas) {
                    $('#loading').hide();
                    if (datas.code == 200) {
                        alert('Product Added To Cart');
                    }
                }
            })
        });
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
        let getProduct = function(){
            $.ajax({
                url : "fetchFronts.php",
                method : "POST",
                data: {getData : "getSingleProduct", id : id},
                dataType : "json",
                success : function(data){
                    if (data.code == 200) {
                        $('#proImg').attr('src', data.data[0].img);
                        $('#proName').text(data.data[0].name);
                        $('#proDesc').text(data.data[0].desc);
                        $('#proPrice').text(data.data[0].price);
                    }
                }
            });
        }
        let getRelProduct = function(){
            $.ajax({
                url : "fetchFronts.php",
                method : "POST",
                data: {getData : "getRelProduct", id : id},
                dataType : "json",
                success : function(data){
                    if (data.code == 200) {
                        setRelProduct(data.data);
                    }
                }
            });
        }
        let setRelProduct = function(data) {
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
                $('#relPro').append(dyn);
                dyn = '';
            });
        }
        getProduct();
        getRelProduct();
    </script>
</body>

</html>