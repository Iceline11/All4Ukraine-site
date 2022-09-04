<?php
include '../view/header.php'; // add header
$menuitem = "news"; // active page
include '../view/menu.php'; // add menu

$news_id = $_GET['id'];

// SQL select this news
$this_news = $pdo->query("SELECT * FROM `news` WHERE news_id = '$news_id'")->fetch(PDO::FETCH_OBJ);

?>

<!-- Page Content-->
<section class="py-2">
    <div class="container px-5 my-3">
        <!-- breadcrumbs-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><?= $lang['main']?></a></li>
                <li class="breadcrumb-item"><a href="news.php"><?= $lang['news']?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                    if (get_user_lang() == "ua") {
                        echo $this_news->name_ua; }
                    elseif (get_user_lang() == "en") {
                        echo $this_news->name_en; }
                    else {
                        echo $this_news->name_ck;
                    }
                    ?>
                </li>
            </ol>
        </nav>

        <div class="row gx-5">
            <div class="col-lg-12">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">
                            <?php
                            if (get_user_lang() == "ua") {
                                echo $this_news->name_ua; }
                            elseif (get_user_lang() == "en") {
                                echo $this_news->name_en; }
                            else {
                                echo $this_news->name_ck;
                            }
                            ?>
                        </h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">
                            <?=$this_news->date; ?>
                        </div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">
                            <?php
                            if ($this_news->category == 1) echo $lang['histories'];
                            elseif ($this_news->category == 2) echo $lang['reports'];
                            elseif ($this_news->category == 3) echo $lang['news'];
                            else echo $lang['others'];
                            ?>
                        </a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="../uploads/<?=$this_news->pict_src; ?>" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-6 mb-4">
                            <?php
                            if (get_user_lang() == "ua") {
                                echo $this_news->descr_ua; }
                            elseif (get_user_lang() == "en") {
                                echo $this_news->descr_en; }
                            else {
                                echo $this_news->descr_ck;
                            }
                            ?>
                        </p>
                    </section>
                </article>
            </div>
        </div>
        <div class="row text-center mb-3">
            <a href="order_list.php"><button class="btn btn-warning btn-lg px-4 me-sm-3"><?= $lang['goto_btn']?></button></a>
        </div>
    </div>
</section>




<?php
include '../view/footer.php'; // add footer
?>