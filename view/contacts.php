<?php
    include '../view/header.php'; // add header
    $menuitem = "contacts"; // active page
    include '../view/menu.php'; // add menu

    // popups
    $msg = isset($_GET['msg']) ? $_GET['msg'] : "";
    if ($msg == "success") {
        require_once '../view/info_ask.html';
    }
?>


<section>
    <div class="container">

        <!--Section heading-->
        <h2 class="section-heading h1 pt-4"><?= $lang['contacts_title']?></h2>

        <!--Section description-->
        <p class="section-description pb-4"><?= $lang['contacts_about']?></p>
        <div class="row mt-5">

            <!--Grid column-->
            <div class="col-lg-5 mb-4">

                <!--Form with header-->
                <div class="card">

                    <div class="card-body">
                        <!--Header-->
                        <div class="form-header">
                            <h3><i class="fas fa-envelope"></i><?= $lang['contacts_write_us']?></h3>
                        </div>
                        <p><?= $lang['contacts_write_us_we_give_answer']?></p>
                        <form method="post" action="../modules/contact_us.php">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" placeholder="name@example.com" name="name" required>
                                <label for="name"><?= $lang['contacts_your_name']?></label>
                                <div class="form-text"><?= $lang['contacts_your_name_2']?></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="contact" placeholder="name@example.com" name="contact" required>
                                <label for="contact"><?= $lang['contacts_call_back']?></label>
                                <div class="form-text"><?= $lang['contacts_call_back_2']?></div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea style="height: 232px" class="form-control" id="floatingInput" placeholder="name@example.com" rows="3" name="text" required></textarea>
                                <label for="floatingInput"><?= $lang['contacts_message']?></label>
                            </div>
                            <button type="submit" class="btn btn-primary"><?= $lang['contacts_send']?></button>
                        </form>

                    </div>

                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-7">

                <!--Google map-->
                <div id="map-container-google-10" class="z-depth-1-half map-container-7" style="width: 100%">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2542.9646937610178!2d30.678392515729755!3d50.404495579469106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c48cd3c5b099%3A0xc7040bdf969808b6!2z0KXQsNGA0YzQutC-0LLRgdC60L7QtSDRiC4sIDIwMS8yMDMsINCa0LjQtdCyLCAwMjAwMA!5e0!3m2!1sru!2sua!4v1660299792731!5m2!1sru!2sua" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <br>
                <!--Buttons-->
                <div class="row text-center">
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1 waves-effect waves-light "><i class="fas fa-map-marker-alt"></i></a>
                        <p><?= $lang['contacts_adress_1']?><br><?= $lang['contacts_adress_2']?></p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1 waves-effect waves-light"><i class="fas fa-phone"></i></a>
                        <p><a href="tel:+0979563613">(097) 956 36 13</a><br><?= $lang['contacts_time']?></p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1 waves-effect waves-light"><i class="fas fa-envelope"></i></a>
                        <p><a href="mailto:all4ukr@gmail.com">all4ukr@gmail.com</a><br>
                            <a href="https://t.me/SachukOlga"><i class="fa-brands fa-telegram"></i>SachukOlga</a></p>
                    </div>
                </div>

            </div>

        <!--Grid column-->
        </div>

        <h2 class="section-heading h1 pt-4 mb-4"><?= $lang['main_our_team_title']?></h2>
        <div class="row d-flex justify-content-around">
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
    </div>
</section>

<?php
    include '../view/footer.php'; // add footer
?>
