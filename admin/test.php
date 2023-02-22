<?php
    // require 'include/session.php';
    $a = 'lgjbfg23468902345790sdfbjklsdfty8902345}{}:?p)ujr()#uj%k@#(%p_)';
    $c = 'holfgQJKWERJKL;ASDFGHKLv;jklBG89023456789234}:{:++i$io*(@#jmn*ddfws*(';
    $b = 123456;
    $salted = $a.$b.$c;
    echo hash('SHA512', $salted); // encryption mode to encode the password
 ?>