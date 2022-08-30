<?php
include 'header.php'; // add header
include 'menu.php'; // add menu

?>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center height-container">
            <div class="col-sm-5">
                <div class="card">
                    <article class="card-body">
<!--                        <a href="" class="float-right btn btn-outline-primary">Sign up</a>-->
                        <h4 class="card-title mb-4 mt-1 text-center">Увійти</h4>
                        <hr>
                        <form action="../modules/login.php" method="post">
                            <div class="form-group">
                                <input name="user" class="form-control" placeholder="Email or login" type="text">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <input name="password" class="form-control mt-2" placeholder="******" type="password">
                            </div> <!-- form-group// -->
                            <div class="row align-items-center align-items-center justify-content-center ">
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">Увійти</button>
                                </div>
                            </div> <!-- .row// -->
                        </form>
                    </article>
                </div> <!-- card.// -->
            </div> <!-- col.// -->
        </div>
    </div>

<?php include 'footer.php' ?>