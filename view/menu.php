<?php

// DB connect
include "../dbconnect/dbconnect.php";

// language and language selector
function get_user_lang () {
return isset($_COOKIE["lang"]) ? $_COOKIE["lang"] :'ua';
}

// list of languages
require "../modules/language_list.php";
if (get_user_lang() === 'en') {
    $lang = $en;
}
elseif (get_user_lang() === 'ck') {
    $lang = $ck;
}
else {
    $lang = $ua;
}

// check admin rules
if (isset($_COOKIE["login"])) {
    $log = true;
}
else $log = false;

if (isset($_COOKIE["password"])) {
    $pas = true;
}
else $pas = false;

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="position-absolute end-0 me-2">
        <?php if ($log == true and $pas == true) {
            echo '<a type="button" href="../modules/admin-exit.php" class="btn btn-danger"><i class="fa-solid fa-person-walking-dashed-line-arrow-right fa-xl"></i></a>';
        }
        ?>
    </div>
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">🇺🇦 All4Ukraїne</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse ms-3" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "news") echo "active"?>" aria-current="page" href="news.php"><?= $lang['news']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "orders") echo "active"?>" aria-current="page" href="order_list.php"><?= $lang['good deeds']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "report") echo "active"?>" href="report.php"><?= $lang['reports']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($menuitem == "contacts") echo "active"?>" href="contacts.php"><?= $lang['contacts']?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-earth-americas"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="../modules/set_lang.php?lang=ua">UA, грн.</a></li>
                        <li><a class="dropdown-item" href="../modules/set_lang.php?lang=en">EN, usd</a></li>
                        <li><a class="dropdown-item" href="../modules/set_lang.php?lang=ck">CK, usd</a></li>
                    </ul>
                </li>
            </ul>
            <small class="text-yellow"><i class="fa-solid fa-square-phone"></i> <a href="tel:+0979563613" class="text-yellow">(097)  956 36 13</a></small>
        </div>
    </div>
</nav>