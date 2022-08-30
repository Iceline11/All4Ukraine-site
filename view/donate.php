<div class="modal fade" id="modal_donate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel name"><?= $lang['donate_to']?><span type="text" id="name" name="order-name"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#by_creditcard" data-bs-toggle="tab" ><?= $lang['donate_official']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#by_paypal" data-bs-toggle="tab"><?= $lang['donate_paypal']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#other" data-bs-toggle="tab"><?= $lang['donate_other']?></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="case-creditcard">
                <div class="tab-pane fade show active mx-4 mb-4" id="by_creditcard" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="post" action="../modules/donate_credit_card.php">
                        <div class="row mb-4">
                            <label class="form-label mt-2"><?= $lang['fill_to_continue']?></label>
                            <div class="col-sm-4">
                                <div class="form-floating">
                                    <input type="hidden" class="name" name="order-name">
                                    <input type="hidden" class="order_id_hidden" name="id">
                                    <input type="hidden" class="card_order_hidden" name="card_order">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="donate_sum" required>
                                    <label for="floatingInput"><?= $lang['donate_sum']?></label>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckCheckedPaypal" name="allow" checked>
                                        <label class="form-check-label" for="flexCheckCheckedPaypal">
                                            <small><?= $lang['i_agree_1']?><a href="obligations.php"><?= $lang['i_agree_2']?></a><?= $lang['i_agree_3']?></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingPassword" placeholder="Підпис на сторінці" name="donater_name" required>
                                    <label for="floatingPassword"><?= $lang['your_name']?></label>
                                    <div class="mt-1"><small><?= $lang['after_success']?></small></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal"><?= $lang['cancel']?></button>
                            <button type="submit" class="btn btn-primary"><?= $lang['continue']?></button>
                        </div>
                    </form>
                </div>
                <div class="tab-content" id="case-paypal">
                    <div class="tab-pane fade mx-4 mb-4" id="by_paypal" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form>
                            <div class="row mb-4">
                                <label class="form-label mt-2"><?= $lang['fill_fields']?></label>
                                <div class="col-sm-5">
                                    <input type="hidden" id="order_name" class="name" name="order_name">
                                    <input type="hidden" id="order_id" class="order_id_hidden" name="id">
                                    <input type="hidden" id="card_order" class="card_order_hidden" name="card_order">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="sum" placeholder="sum" name="donate_sum" required>
                                                <label for="floatingInput"><?= $lang['sum']?></label>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-floating">
                                                <select class="form-select" aria-label="Пример выбора по умолчанию" id="currency" name="currency">
                                                    <option value="USD">USD</option>
                                                    <option value="EUR">EUR</option>
                                                    <option value="UAH">UAH</option>
                                                </select>
                                                <label for="currency"><?= $lang['currency']?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckCheckedIpay" checked>
                                        <label class="form-check-label" for="flexCheckCheckedIpay">
                                            <small><?= $lang['i_agree_1']?><a href="obligations.php"><?= $lang['i_agree_2']?></a><?= $lang['i_agree_3']?></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="donater_name" placeholder="Підпис на сторінці" name="donater_name" required>
                                        <label for="donater_name"><?= $lang['your_name']?></label>
                                        <div class="mt-1"><small><?= $lang['after_success']?></small></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Replace "test" with your own sandbox Business account app client ID -->
                        <script src="https://www.paypal.com/sdk/js?client-id=Ad1yllXji_Ar2gTo7x0qnZ6rJLNQYefjipg27uNGd_zdJpZFvyZMLTbLYmmrj51tvZEmSvqrHlBIkdXi&currency=USD"></script>
                        <!-- Set up a container element for the button -->
                        <div id="paypal-button-container"></div>
                        <script>
                            paypal.Buttons({
                                // Sets up the transaction when a payment button is clicked
                                createOrder: (data, actions) => {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                "currency_code": document.querySelector("#currency").value,
                                                "value": document.querySelector("#sum").value
                                            }
                                        }]
                                    });
                                },
                                // Finalize the transaction after payer approval
                                onApprove: (data, actions) => {
                                    return actions.order.capture().then(function(orderData) {
                                        // Successful capture! For dev/demo purposes:
                                        const data={
                                            "order": {
                                                "order_name": document.querySelector("#order_name").value,
                                                "order_id": document.querySelector("#order_id").value,
                                                "card_order": document.querySelector("#card_order").value,
                                                "sum": document.querySelector("#sum").value,
                                                "currency": document.querySelector("#currency").value,
                                                "flexCheckCheckedIpay": document.querySelector("#flexCheckCheckedIpay").value,
                                                "donater_name": document.querySelector("#donater_name").value
                                            }
                                        }
                                        console.log(data);
                                        fetch("../modules/donate_paypal.php", {
                                            method: "POST",
                                            // body: data
                                            body: JSON.stringify(data)
                                        }).then((response) => {
                                            console.log(response);
                                            return response.text();

                                        }).then((data) => {
                                            // console.log(data);
                                            const url = window.location.href;
                                            // redirect
                                            window.location.href = url + '&info=good';
                                        })
                                        //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                        //const transaction = orderData.purchase_units[0].payments.captures[0];
                                        //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                                        // When ready to go live, remove the alert and show a success message within this page. For example:
                                        // const element = document.getElementById('paypal-button-container');
                                        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                        // Or go to another URL:  actions.redirect('thank_you.html');
                                    });
                                }
                            }).render('#paypal-button-container');
                        </script>
                    </div>
                </div>
                <div class="tab-content" id="case-other">
                    <div class="tab-pane fade mx-4 mb-4" id="other" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <form method="post" action="../modules/feedback.php">
                            <div class="row mb-4">
                                <label class="form-label mt-2"><?= $lang['give_contacts']?></label>
                                <div class="col-sm-4">
                                    <div class="form-floating">
                                        <input type="hidden" id="order_name" class="name" name="order_name">
                                        <input type="text" class="form-control" id="resp_name" placeholder="name@example.com" name="name" required>
                                        <label for="floatingInput"><?= $lang['your_name']?></label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contact" placeholder="Підпис на сторінці" name="contact" required>
                                        <label for="floatingPassword"><?= $lang['your_contacts']?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating">
                                        <textarea type="text" class="form-control" id="text" placeholder="Підпис на сторінці" name="text" rows="5" required></textarea>
                                        <label for="text"><?= $lang['addit_info']?></label>
                                        <small><?= $lang['addit_info_exp']?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal"><?= $lang['cancel']?></button>
                                <button type="submit" class="btn btn-primary"><?= $lang['send']?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--&lt;!&ndash;                    This ID&ndash;&gt;-->
            <!--                    <input type="hidden" class="id_hidden" name="id">-->

        </div>
    </div>
</div>





