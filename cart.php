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
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <!-- <th>Quantity</th> -->
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cartDetail">
                                <!-- <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shopping-cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>T-shirt Contrast Pocket</h6>
                                            <h5>$98.49</h5>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ 30.00</td>
                                    <td class="cart__close"><i class="fa fa-close"></i></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="home.php">Continue Shopping</a>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span id="totalAm"></span></li>
                        </ul>
                        <p class="primary-btn" style="cursor:pointer;" id="placeOrder">Place your Order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->


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
        $(document).on('click', '#placeOrder', function(){
            $.ajax({
                url: 'frontprocessdata.php',
                type: 'POST',
                dataType: 'json',
                data: {process: 'addOrder'},
                success : function (datas) {
                    $('#loading').hide();
                    if (datas.code == 200) {
                        alert('Order Placed');
                        window.location.replace('home.php');
                    }
                }
            })
        });
        let getCartTot = function(){
            $.ajax({
                url : "fetchFronts.php",
                method : "POST",
                data: {getData : "getCartTot"},
                dataType : "json",
                success : function(data){
                    if (data.code == 200) {
                        $('#totalAm').text(data.data[0].total);
                    }
                }
            });
        }
        let getCart = function(){
            $.ajax({
                url : "fetchFronts.php",
                method : "POST",
                data: {getData : "getCart"},
                dataType : "json",
                success : function(data){
                    if (data.code == 200) {
                        setCart(data.data);
                    }
                }
            });
        }
        let setCart = function(data) {
            $.each(data, function(index, val) {
                let dyn = '';
                dyn +='<tr>';
                dyn +='<td class="product__cart__item">';
                dyn +='<div class="product__cart__item__pic">';
                dyn +='<img src="'+val.img+'" width="100" height="100" class="img-fluid" alt="">';
                dyn +='</div>';
                dyn +='<div class="product__cart__item__text">';
                dyn +='<p class="h4 mt-4">'+val.name+'</p>';
                dyn +='</div>';
                dyn +='</td>';
                dyn +='<td class="cart__price">Rs. '+val.price+'</td>';
                dyn +='</tr>';
                $('#cartDetail').append(dyn);
                dyn = '';
            });
        }
        getCart();
       getCartTot();
    </script>
</body>

</html>