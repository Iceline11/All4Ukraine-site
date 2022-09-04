<?php

include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

// select priorities
$maxsql = $pdo->query('SELECT MAX(card_order) FROM orders')->fetch(PDO::FETCH_ASSOC);
$max = $maxsql["MAX(card_order)"];
$first_priority = $pdo->query("SELECT * FROM `orders` WHERE card_order = '$max' ")->fetch(PDO::FETCH_OBJ);
$second_priority = $pdo->query("SELECT * FROM `orders` WHERE card_order = ('$max'-1) ")->fetch(PDO::FETCH_OBJ);
$third_priority = $pdo->query("SELECT * FROM `orders` WHERE card_order = ('$max'-2) ")->fetch(PDO::FETCH_OBJ);

// last news
$last_news = $pdo->query('SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3');

// Total amount
$total_amount = $pdo->query('SELECT SUM(sum) FROM `donate_list`')->fetch(PDO::FETCH_ASSOC);

// Total amount for today
date_default_timezone_set('Europe/Kiev');
$today = date('Y-m-d');
$tomorow = date('Y-m-d',strtotime($today . "+1 days"));
$today_amount = $pdo->query("SELECT SUM(sum) FROM `donate_list` WHERE  date >= '$today' AND date < '$tomorow'")->fetch(PDO::FETCH_ASSOC);

// popups
$info = isset($_GET['info']) ? $_GET['info'] : "";
if ($info == "exit") {
    require 'info_exit.html';
}
?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item pos_rel active">
            <div class="bg-white bg_flag py-5">
                <div class="container gradient_box px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="d-lg-none text-center"><img class="img-fluid shadow rounded-3 mt-5 w-75" src="../uploads/
                            <?php
                            if (get_user_lang() == "ua") {
                                echo $first_priority->pict_src_ua; }
                                elseif (get_user_lang() == "en") {
                                echo $first_priority->pict_src_en; }
                                else {
                                echo $first_priority->pict_src_ck;
                                }
                            ?>
                        " alt="..." /></div>
                        <div class="col-sm-12 col-lg-6 col-xl-7 col-xxl-6">
                            <div class="my-5 ms-3 text-xl-start">
                                <h1 class="display-6 fw-bolder text-black mb-2">
                                    <?php
                                    if (get_user_lang() == "ua") {
                                        echo $first_priority->name_ua; }
                                    elseif (get_user_lang() == "en") {
                                        echo $first_priority->name_en; }
                                    else {
                                        echo $first_priority->name_ck;
                                    }
                                    ?>
                                </h1>
                                <p class="lead fw-normal text-black-50 mb-4">
                                    <?php
                                    if (get_user_lang() == "ua") {
                                        echo mb_substr($first_priority->descr_ua, 0, 150) . " "; }
                                    elseif (get_user_lang() == "en") {
                                        echo mb_substr($first_priority->descr_en, 0, 150) . " "; }
                                    else {
                                        echo mb_substr($first_priority->descr_ck, 0, 150) . " ";
                                    }
                                    ?>
                                ... <a href="view_order.php?od=<?= $first_priority->card_order ?>"><?= $lang['main_more']?></a></p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $first_priority->card_order ?>"><?= $lang['main_to_order']?></a>
                                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $first_priority->card_order ?>"><?= $lang['donate_btn']?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 col-xxl-6 d-none d-lg-block text-center"><img class="img-fluid shadow rounded-3 my-5 w-75" src="../uploads/<?= $first_priority->pict_src_ua; ?>" alt="..." /></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="bg-white bg_flag py-5">
                <div class="container gradient_box px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="d-lg-none text-center"><img class="img-fluid shadow rounded-3 mt-5 w-75" src="../uploads/
                            <?php
                            if (get_user_lang() == "ua") {
                                echo $second_priority->pict_src_ua; }
                            elseif (get_user_lang() == "en") {
                                echo $second_priority->pict_src_en; }
                            else {
                                echo $second_priority->pict_src_ck;
                            }
                            ?>
                        " alt="..." /></div>
                        <div class="col-sm-12 col-lg-6 col-xl-7 col-xxl-6">
                            <div class="my-5 ms-3 text-xl-start">
                                <h1 class="display-6 fw-bolder text-black mb-2">
                                    <?php
                                    if (get_user_lang() == "ua") {
                                        echo $second_priority->name_ua; }
                                    elseif (get_user_lang() == "en") {
                                        echo $second_priority->name_en; }
                                    else {
                                        echo $second_priority->name_ck;
                                    }
                                    ?>
                                </h1>
                                <p class="lead fw-normal text-black-50 mb-4">
                                    <?php
                                    if (get_user_lang() == "ua") {
                                        echo mb_substr($second_priority->descr_ua, 0, 150) . " "; }
                                    elseif (get_user_lang() == "en") {
                                        echo mb_substr($second_priority->descr_en, 0, 150) . " "; }
                                    else {
                                        echo mb_substr($second_priority->descr_ck, 0, 150) . " ";
                                    }
                                    ?>
                                    ... <a href="view_order.php?od=<?= $second_priority->card_order ?>"><?= $lang['main_more']?></a></p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $second_priority->card_order ?>"><?= $lang['main_to_order']?></a>
                                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $second_priority->card_order ?>"><?= $lang['donate_btn']?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 col-xxl-6 d-none d-lg-block text-center"><img class="img-fluid shadow rounded-3 my-5 w-75" src="../uploads/<?= $first_priority->pict_src_ua; ?>" alt="..." /></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="bg-white bg_flag py-5">
                <div class="container gradient_box px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="d-lg-none text-center"><img class="img-fluid shadow rounded-3 mt-5 w-75" src="../uploads/
                            <?php
                            if (get_user_lang() == "ua") {
                                echo $third_priority->pict_src_ua; }
                            elseif (get_user_lang() == "en") {
                                echo $third_priority->pict_src_en; }
                            else {
                                echo $third_priority->pict_src_ck;
                            }
                            ?>
                        " alt="..." /></div>
                        <div class="col-sm-12 col-lg-6 col-xl-7 col-xxl-6">
                            <div class="my-5 ms-3 text-xl-start">
                                <h1 class="display-6 fw-bolder text-black mb-2">
                                    <?php
                                    if (get_user_lang() == "ua") {
                                        echo $third_priority->name_ua; }
                                    elseif (get_user_lang() == "en") {
                                        echo $third_priority->name_en; }
                                    else {
                                        echo $third_priority->name_ck;
                                    }
                                    ?>
                                </h1>
                                <p class="lead fw-normal text-black-50 mb-4">
                                    <?php
                                    if (get_user_lang() == "ua") {
                                        echo mb_substr($third_priority->descr_ua, 0, 150) . " "; }
                                    elseif (get_user_lang() == "en") {
                                        echo mb_substr($third_priority->descr_en, 0, 150) . " "; }
                                    else {
                                        echo mb_substr($third_priority->descr_ck, 0, 150) . " ";
                                    }
                                    ?>
                                    ... <a href="view_order.php?od=<?= $third_priority->card_order ?>"><?= $lang['main_more']?></a></p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $third_priority->card_order ?>"><?= $lang['main_to_order']?></a>
                                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $third_priority->card_order ?>"><?= $lang['donate_btn']?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 col-xxl-6 d-none d-lg-block text-center"><img class="img-fluid shadow rounded-3 my-5 w-75" src="../uploads/<?= $first_priority->pict_src_ua; ?>" alt="..." /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?= $lang['main_prev']?></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"><?= $lang['main_next']?></span>
    </button>
</div>

<!-- Header-->
<header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6">
                <div class="text-center my-5">
                    <h1 class="fw-bolder mb-3"><?= $lang['main_online']?></h1>
                    <p class="lead fw-normal text-muted mb-4"><?= $lang['main_here']?><p>
                    <p class="lead fw-normal text-muted mb-4"><?= $lang['main_progress']?></p>
                    <a class="btn btn-primary btn-lg" href="order_list.php"><?= $lang['main_go_to_order']?></a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Quotes -->
<div class="py-5 bg-light">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-10 col-xl-7">
                <div class="text-center">
                    <div class="fs-4 mb-4 fst-italic"><p>"<?= $lang['main_quote']?>"</p></div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="rounded-circle pic_ceo me-3" src="../pictures/savchenko.jpeg" alt="..." />
                        <div class="fw-bold">
                            <?= $lang['main_quote_name']?>
                            <span class="fw-bold text-primary mx-1">/</span>
                            <?= $lang['main_quote_founder']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Our results-->
<section class="py-5">
    <div class="container px-5">
        <div class="row">
            <div class="col text-center mt-5 mb-3">
                <h2><?= $lang['main_our_results']?></h2>
                <p><?= $lang['main_our_results_2']?></p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-6 my-3">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-car fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="48" data-speed="1500"></h2>
                    <p class="count-text "><?= $lang['main_our_results_block_1']?></p>
                </div>
            </div>
            <div class="col-sm-6 my-3">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-file-circle-check fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="218" data-speed="1500"></h2>
                    <p class="count-text "><?= $lang['main_our_results_block_2']?></p>
                </div>
            </div>
            <div class="col-sm-6 my-3">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-money-bills fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="<?=(15353560 + $total_amount["SUM(sum)"]); ?>" data-speed="1500"></h2>
                    <p class="count-text "><?= $lang['main_our_results_block_3']?></p>
                </div></div>
            <div class="col-sm-6 my-3">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-money-bill fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="<?= $today_amount["SUM(sum)"] ?>" data-speed="1500"></h2>
                    <p class="count-text "><?= $lang['main_our_results_block_4']?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features section-->
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0"><?= $lang['main_why_we']?></h2></div>
            <div class="col-lg-8">
                <div class="row gx-5 row-cols-1 row-cols-md-2">
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-regular fa-building"></i></div>
                        <h2 class="h5"><?= $lang['main_why_we_title_1']?></h2>
                        <p class="mb-0"><?= $lang['main_why_we_content_1']?><a href="https://youcontrol.com.ua/ru/contractor/?id=64719976" target="_blank">YouControl.com.ua</a></p>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-solid fa-people-group"></i></div>
                        <h2 class="h5"><?= $lang['main_why_we_title_2']?></h2>
                        <p class="mb-0"><?= $lang['main_why_we_content_2']?></p>
                    </div>
                    <div class="col h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-solid fa-globe"></i></div>
                        <h2 class="h5"><?= $lang['main_why_we_title_3']?></h2>
                        <p class="mb-0"><?= $lang['main_why_we_content_3']?></p>
                    </div>
                    <div class="col h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-regular fa-comments"></i></div>
                        <h2 class="h5"><?= $lang['main_why_we_title_4']?></h2>
                        <p class="mb-0"><?= $lang['main_why_we_content_4']?><a href="tel:+0979563613">(097)&nbsp956&nbsp36&nbsp13</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- News section-->
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder"><?= $lang['main_news_title']?></h2>
                    <p class="lead fw-normal text-muted mb-5"><?= $lang['main_news_content_1']?><a href="https://www.facebook.com/all4ukraineua"><i class="fa-brands fa-facebook"></i><?= $lang['main_news_content_2']?></a><?= $lang['main_news_content_3']?></p>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            <?php while ($row = $last_news->fetch(PDO::FETCH_OBJ)) { // start while ?>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="../uploads/<?= $row->pict_src ?>" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                <?php
                                if ($row->category == 1) echo $lang['histories'];
                                elseif ($row->category == 2) echo $lang['reports'];
                                elseif ($row->category == 3) echo $lang['news'];
                                else echo $lang['others'];
                                ?>
                            </div>
                            <a class="order_link_nostyle" href="view_news.php?id=<?= $row->news_id ?>"><h5 class="card-title mb-3"><?= $row->name_ua ?></h5></a>
                            <p class="card-text mb-0"><?= mb_substr($row->descr_ua, 0, 200) . " "  ?> <a href="view_news.php?id=<?= $row->news_id ?>"><?= $lang['main_more']?></a></p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="small">
                                        <div class="text-muted"><?= $row->date ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="text-end mb-xl-0">
                <a class="text-decoration-none" href="news.php">
                    <?= $lang['main_more_news']?>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Call to action-->
<!--        <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">-->
<!--            <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">-->
<!--                <div class="mb-4 mb-xl-0">-->
<!--                    <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>-->
<!--                    <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>-->
<!--                </div>-->
<!--                <div class="ms-xl-4">-->
<!--                    <div class="input-group mb-2">-->
<!--                        <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />-->
<!--                        <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>-->
<!--                    </div>-->
<!--                    <div class="small text-white-50">We care about privacy, and will never share your data.</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </aside>-->
    </div>
</section>

<!-- Our team-->
<section>
    <div class="container">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder"><?= $lang['main_our_team_title']?></h2>
                    <p class="lead fw-normal text-muted mb-5"><?= $lang['main_our_team_content']?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container owl-carousel owl-theme mb-3">
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/savshenko.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/profile.php?id=100001783389284" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_savchenko']?></b></p>
                <p><?= $lang['main_our_team_savchenko_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/sachuk.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/olga.sachuk.9" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_sachuk']?></b></p>
                <p><?= $lang['main_our_team_sachuk_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/valya.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/profile.php?id=100005426670088" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_mihova']?></b></p>
                <p><?= $lang['main_our_team_mihova_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/semenets.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/profile.php?id=100003824037733" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_semenets']?></b></p>
                <p><?= $lang['main_our_team_semenets_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/oryna.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/arina.legaschova" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_oryna']?></b></p>
                <p><?= $lang['main_our_team_oryna_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/serhiy.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_perederiy']?></b></p>
                <p><?= $lang['main_our_team_perederiy_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/rost.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/rostislav.sholomok" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_sholomok']?></b></p>
                <p><?= $lang['main_our_team_sholomok_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/bach.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/profile.php?id=100007691311165" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_basherikov']?></b></p>
                <p><?= $lang['main_our_team_basherikov_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/sanya.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/profile.php?id=100007691311165" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_rybchik']?></b></p>
                <p><?= $lang['main_our_team_rybchik_before']?></p>
            </div>
        </div>
        <div class="item card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
            <div class="position-relative">
                <img src="../pictures/team/yaroslav.png" class="card-img-top" alt="...">
                <div class="fb_link text-center">
                    <a type="button" class="btn btn-light" href="https://www.facebook.com/yakost" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                <p><b><?= $lang['main_our_team_kosjuk']?></b></p>
                <p><?= $lang['main_our_team_kosjuk_before']?></p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <h2 class="display-4 fw-bolder mb-4"><?= $lang['main_lets_win']?></h2>
        <a class="btn btn-lg btn-primary" href="contacts.php"><?= $lang['main_call_us']?></a>
    </div>
</section>

<script src="../js/start_owl_carusel.js"></script>
<script src="../js/counter.js"></script>

</main>
<!-- Footer-->

<?php
    include '../view/footer.php'; // add footer
?>
