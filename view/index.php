<?php
include '../view/header.php'; // add header
include '../view/menu.php'; // add menu

include "../dbconnect/dbconnect.php";

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
                        <div class="d-lg-none text-center"><img class="img-fluid shadow rounded-3 mt-5 w-75" src="../uploads/<?= $first_priority->pict_src; ?>" alt="..." /></div>
                        <div class="col-sm-12 col-lg-6 col-xl-7 col-xxl-6">
                            <div class="my-5 ms-3 text-xl-start">
                                <h1 class="display-6 fw-bolder text-black mb-2"><?= $first_priority->name_ua; ?></h1>
                                <p class="lead fw-normal text-black-50 mb-4"><?= mb_substr($first_priority->descr_ua, 0, 300) . " "; ?>... <a href="view_order.php?od=<?= $first_priority->card_order ?>">(далі)</a></p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $first_priority->card_order ?>">До заявки</a>
                                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $first_priority->card_order ?>">Задонатити</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 col-xxl-6 d-none d-lg-block text-center"><img class="img-fluid shadow rounded-3 my-5 w-75" src="../uploads/<?= $first_priority->pict_src; ?>" alt="..." /></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="bg-white bg_flag py-5">
                <div class="container gradient_box px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="d-lg-none text-center"><img class="img-fluid shadow rounded-3 mt-5 w-75" src="../uploads/<?= $second_priority->pict_src; ?>" alt="..." /></div>
                        <div class="col-sm-12 col-lg-6 col-xl-7 col-xxl-6">
                            <div class="my-5 ms-3 text-xl-start">
                                <h1 class="display-6 fw-bolder text-black mb-2"><?= $second_priority->name_ua; ?></h1>
                                <p class="lead fw-normal text-black-50 mb-4"><?= mb_substr($second_priority->descr_ua, 0, 300) . " "; ?>... <a href="view_order.php?od=<?= $second_priority->card_order ?>">(далі)</a></p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $second_priority->card_order ?>">До заявки</a>
                                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $second_priority->card_order ?>">Задонатити</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 col-xxl-6 d-none d-lg-block text-center"><img class="img-fluid shadow rounded-3 my-5 w-75" src="../uploads/<?= $second_priority->pict_src; ?>" alt="..." /></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="bg-white bg_flag py-5">
                <div class="container gradient_box px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="d-lg-none text-center"><img class="img-fluid shadow rounded-3 mt-5 w-75" src="../uploads/<?= $third_priority->pict_src; ?>" alt="..." /></div>
                        <div class="col-sm-12 col-lg-6 col-xl-7 col-xxl-6">
                            <div class="my-5 ms-3 text-xl-start">
                                <h1 class="display-6 fw-bolder text-black mb-2"><?= $third_priority->name_ua; ?></h1>
                                <p class="lead fw-normal text-black-50 mb-4"><?= mb_substr($third_priority->descr_ua, 0, 300) . " "; ?>... <a href="view_order.php?od=<?= $third_priority->card_order ?>">(далі)</a></p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $third_priority->card_order ?>">До заявки</a>
                                    <a class="btn btn-warning btn-lg px-4 me-sm-3" href="view_order.php?od=<?= $third_priority->card_order ?>">Задонатити</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 col-xxl-6 d-none d-lg-block text-center"><img class="img-fluid shadow rounded-3 my-5 w-75" src="../uploads/<?= $third_priority->pict_src; ?>" alt="..." /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Попередній</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Наступний</span>
    </button>
</div>

<!-- Header-->
<header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6">
                <div class="text-center my-5">
                    <h1 class="fw-bolder mb-3">🇺🇦 All4Ukraine - онлайн платформа для збору коштів на потреби ЗСУ 💙💛</h1>
                    <p class="lead fw-normal text-muted mb-4">Тут ви можете ознайомитись зі всіма заявками з передової, обрати одну з них і задонатити кошти для пришвидшення її закриття.<p>
                    <p class="lead fw-normal text-muted mb-4">Прогрес закриття заявки, а також історію донатів (в тому числі ваших) ви зможете відслідковувати на сайті.</p>
                    <a class="btn btn-primary btn-lg" href="order_list.php">Перейти до заявок</a>
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
                    <div class="fs-4 mb-4 fst-italic"><p>"Війна не закінчується, а лише набирає обертів. Тому ми вирішили вивести допомогу нашій країні на новий більш якісний рівень, для чого започаткували благодійну організацію All4Ukraine, яка зможе об‘єднати більше активних і патріотичних людей як в Україні, так і в цілому світі задля досягнення великої мети - перемоги нашого спільного ворога, допомоги всім тим, хто її потребує та наближення справжнього Дня Перемоги 🇺🇦!"</p></div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="rounded-circle pic_ceo me-3" src="../pictures/savchenko.jpeg" alt="..." />
                        <div class="fw-bold">
                            Сергій Савченко
                            <span class="fw-bold text-primary mx-1">/</span>
                            засновник All4Ukraine
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
                <h2>Наші результати</h2>
                <p>З початку повномасштабного вторгнення ми з вами зробили наступне:</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-car fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="48" data-speed="1500"></h2>
                    <p class="count-text ">Закуплених пікапів для ЗСУ</p>
                </div>
            </div>
            <div class="col">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-file-circle-check fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="218" data-speed="1500"></h2>
                    <p class="count-text ">Кількість закритих заявок від ЗСУ</p>
                </div>
            </div>
            <div class="col">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-money-bills fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="<?=(15353560 + $total_amount["SUM(sum)"]); ?>" data-speed="1500"></h2>
                    <p class="count-text ">Сума (грн) придбаного майна для ЗСУ</p>
                </div></div>
            <div class="col">
                <div class="counter shadow border-0">
                    <i class="fa-solid fa-money-bill fa-2xl mb-2"></i>
                    <h2 class="timer count-title count-number" data-to="<?= $today_amount["SUM(sum)"] ?>" data-speed="1500"></h2>
                    <p class="count-text ">Зібрано за сьогодні</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features section-->
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Чому нам довіряють:</h2></div>
            <div class="col-lg-8">
                <div class="row gx-5 row-cols-1 row-cols-md-2">
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-regular fa-building"></i></div>
                        <h2 class="h5">Зареєстрована організація</h2>
                        <p class="mb-0">Наша волонтерська організація зареєстрована офіційно. Деталі щодо організації ви можете дізнатись в сервісі відкритих даних українських організацій <a href="https://youcontrol.com.ua/ru/contractor/?id=64719976" target="_blank">YouControl.com.ua</a></p>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-solid fa-people-group"></i></div>
                        <h2 class="h5">Реальні люди</h2>
                        <p class="mb-0">Засновник фонду - власник найвідомішої фабрики м`яких меблів в Україні Сергій Савченко. Також ми залишаємо контакти всіх членів нашої команди. Ви можете зв`язатиз з будь-ким з нас для того, щоб впевнетись що ми не шахраї</p>
                    </div>
                    <div class="col h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-solid fa-globe"></i></div>
                        <h2 class="h5">Відслідковування зборів он-лайн</h2>
                        <p class="mb-0">Вся інформація по заявкам та зібраним коштам ведеться он-лайн. Відразу після донату, ви побачите своє ім`я та перераховану Вами суму на даному сайті. Вся історія по зібраним коштам - залишається на сайті</p>
                    </div>
                    <div class="col h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa-regular fa-comments"></i></div>
                        <h2 class="h5">Принцип відкритості</h2>
                        <p class="mb-0">Ми публікуємо всі наші досягнення на фейсбук сторінці та у розділі новин на сайті. Ми відкриті до спілкування. Ви можете задати нам будь-які питання просто зв`язавшись з нами по телефону: <a href="tel:+0979563613">(097)&nbsp956&nbsp36&nbsp13</a></p>
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
                    <h2 class="fw-bolder">Останні новини</h2>
                    <p class="lead fw-normal text-muted mb-5">Долучайтесь до нашої <a href="https://www.facebook.com/all4ukraineua"><i class="fa-brands fa-facebook"></i> фейсбук сторінки</a>, щоб бути в курсі останніх новин волонтерського фонду</p>
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
                            <p class="card-text mb-0"><?= mb_substr($row->descr_ua, 0, 200) . " "  ?> <a href="view_news.php?id=<?= $row->news_id ?>">(далі)</a></p>
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
                    Більше новин
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
                    <h2 class="fw-bolder">Наша команда</h2>
                    <p class="lead fw-normal text-muted mb-5">Ми – команда однодумців, яка не може бути осторонь війни в нашій країні.
                        Ми різні за профілем та напрямком діяльності, але рівні за бажанням Перемоги у боротьбі за свободу та незалежність.
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
                <p><b>Сергій та Тетяна Савченко</b></p>
                <p>В житті до війни: підприємці</p>
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
                <p><b>Ольга Сачук</b></p>
                <p>В житті до війни: директор з персоналу</p>
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
                <p><b>Валентина Міхова</b></p>
                <p>В житті до війни: бізнес-тренер</p>
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
                <p><b>Вікторія Семенець</b></p>
                <p>В житті до війни: експорт-менеджер</p>
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
                <p><b>Орина Легащова</b></p>
                <p>В житті до війни: журналіст</p>
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
                <p><b>Сергій Передерій</b></p>
                <p>В житті до війни: маркетолог</p>
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
                <p><b>Ростистлав Шоломок</b></p>
                <p>В житті до війни: маркетолог</p>
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
                <p><b>Сергій Бачеріков</b></p>
                <p>В житті до війни: адміністратор сайтів</p>
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
                <p><b>Олександр Рибчинський</b></p>
                <p>В житті до війни: директор ІТ компанії</p>
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
                <p><b>Ярослав Костюк</b></p>
                <p>В житті до війни: менеджер з розвитку бізнесу, фармацевтична галузь</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <h2 class="display-4 fw-bolder mb-4">Переможемо разом!</h2>
        <a class="btn btn-lg btn-primary" href="contacts.php">Зв`яжіться з нами</a>
    </div>
</section>

<script src="../js/start_owl_carusel.js"></script>
<script src="../js/counter.js"></script>

</main>
<!-- Footer-->

<?php
    include '../view/footer.php'; // add footer
?>
