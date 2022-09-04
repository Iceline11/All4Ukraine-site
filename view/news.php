<?php
include 'header.php'; // add header
$menuitem = "news"; // active page
include 'menu.php'; // add menu


// Select news
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    $sql_select_news = $pdo->query("SELECT * FROM `news` WHERE category = '$cat' ORDER BY date DESC");
}
else
    $sql_select_news = $pdo->query('SELECT * FROM `news` ORDER BY date DESC');
?>

<div class="container px-5">
    <div class="row">
        <h4 class="mt-4"><?= $lang['news']?></h4>
    <div class="d-flex align-items-start my-2">
        <div class="btn-group me-2">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $lang['news_categories']?>
            </button>
            <ul class="dropdown-menu ps-2">
                <li class="list-group-item"><a href="news.php" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i><?= $lang['news_all']?></a></li>
                <li class="list-group-item"><a href="?cat=1" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i><?= $lang['news_histories']?></a></li>
                <li class="list-group-item"><a href="?cat=2" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i><?= $lang['news_reports']?></a></li>
                <li class="list-group-item"><a href="?cat=3" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i><?= $lang['news_news']?></a></li>
                <li class="list-group-item"><a href="?cat=4" class="text-reset"><i class="fa-solid fa-angle-right me-2 color-orange"></i><?= $lang['news_other']?></a></li>
            </ul>
        </div>
    </div>
        <?php if ($log == true and $pas == true)
            echo '<a href="new_news.php" type="button"class="btn btn-outline-success my-2">Добавити</a>'
        ?>
    </div>
    <div class="row">
    <?php while ($row = $sql_select_news->fetch(PDO::FETCH_OBJ)) { // start while ?>
        <div class="col-xl-3 col-lg-4 col-md-6 mb-5">
            <div class="card h-100 shadow border-0">
                <?php if ($log == true and $pas == true) {
                    echo '<div class="position-absolute ms-1 mt-1">
                            <a type="button" href="edit_news.php?id=' . $row->news_id . '"
                               class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a type="button" href="../modules/delete_news.php?id=' . $row->news_id . '"
                               class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                           </div>';
                }
                ?>
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
    </div>
</div>

<?php
include 'footer.php'; // add footer
?>
