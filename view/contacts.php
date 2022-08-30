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
        <h2 class="section-heading h1 pt-4">Контакти</h2>
        <!--Section description-->
        <p class="section-description pb-4">Ми - команда однодумців, спеціалістів різного профілю та різного напрямку. Ми не можемо бути осторонь війни. Ми працюємо як волонтери без заробітних плат чи премій. Всі фінанси без виключення ідуть на закриття потреб Збройних Сил України. Ми працюємо - задля пришвидшення перемоги, до переможного кінця!</p>

        <div class="row mt-5">

            <!--Grid column-->
            <div class="col-lg-5 mb-4">

                <!--Form with header-->
                <div class="card">

                    <div class="card-body">
                        <!--Header-->
                        <div class="form-header">
                            <h3><i class="fas fa-envelope"></i> Напишіть нам:</h3>
                        </div>
                        <p>Ми дамо відповідь при першій можливості</p>
                        <form method="post" action="../modules/contact_us.php">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" placeholder="name@example.com" name="name" required>
                                <label for="name">Ваше ім`я</label>
                                <div class="form-text">Як до Вас можна звертатись?</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="contact" placeholder="name@example.com" name="contact" required>
                                <label for="contact">Зворотній контакт</label>
                                <div class="form-text">Ваша пошта, телефон чи профіль в telegram</div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea style="height: 232px" class="form-control" id="floatingInput" placeholder="name@example.com" rows="3" name="text" required></textarea>
                                <label for="floatingInput">Повідомлення</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Відправити</button>
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
                        <p>м.Київ<br>Харьківське шосе 201/203</p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1 waves-effect waves-light"><i class="fas fa-phone"></i></a>
                        <p><a href="tel:+0979563613">(097) 956 36 13</a><br>пн-нд, 9:00 - 20:00</p>
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

        <h2 class="section-heading h1 pt-4 mb-4">Наша команда</h2>
<div class="row d-flex justify-content-around">

        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
        <div class="card px-0 shadow border-0 mx-2 mb-4" style="width: 18rem;">
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
    </div>

</section>



<?php
    include '../view/footer.php'; // add footer
?>
