<header class="header" style="height: 165px;">
    <div class="header__top" style="background-color: #0173b2;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 7-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <a href="index.php">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo" style="height: 140px;">
                    <a href="./index.php"><img src="img/logo_1.png" alt="" width="80px" height="80px"></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu" style="margin-top: 20px;">
                    <ul>
                        <li class="active"><a href="home.php">Home</a></li>
                        <li><a href="#">Categories</a>
                            <ul class="dropdown" id="headCats">
                               <!--  <li><a href="shop.php?id=3">Kid's collection</a></li> -->
                            </ul>
                        </li>
                        <li><a href="./contact.php">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option" style="margin-top: 23px;">
                    <!-- <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a> -->
                    <!-- <a href="#"><img src="img/icon/heart.png" alt=""></a> -->
                    <a href="cart.php"><i class="fa fa-shopping-cart fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
    let getHeadCats = function(start,Limit, cName){
            $.ajax({
                url : "fetchFronts.php",
                method : "POST",
                data: {getData : "getHeadCats"},
                dataType : "json",
                success : function(data){
                    if (data.code == 200) {
                        setHeadCats(data.data);
                    }
                }
            });
        }
        let setHeadCats = function(data) {
            $.each(data, function(index, val) {
                let dyn = '';
                dyn += '<li><a href="shop.php?id='+val.id+'">'+val.name+'</a></li>';
                $('#headCats').append(dyn);
                dyn = '';
            });
        }
        getHeadCats();
</script>