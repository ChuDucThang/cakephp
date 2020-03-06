<?= $this->Html->css('checkout.css') ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container wrapper">
    <?= $this->Flash->render() ?>
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            <?php $total = 0; ?>
                            <?php foreach ($cart['Ordersdetail'] as $key => $cart):
                                $total = $total + $cart['total'];
                            ?>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img style="width: 100%; height: 100px;" class="img-responsive" src="https://i.pinimg.com/originals/19/f5/f7/19f5f71b440cdbab667206d951043ef9.jpg" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?= $cart['name']  ?></div>
                                    <div class="col-xs-12"><small>Quantity:<span><?= $cart['quantity'] ?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span><?= $this->Number->format($cart['total'], ['places' => 0,'after' => ' VND']);?></span></h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                           <?php endforeach; ?>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span><?= $this->Number->format($total, ['places' => 0,'after' => ' VND']);?></span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span><?= $this->Number->format(20000, ['places' => 0,'after' => ' VND']);?></span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span><?= $this->Number->format($total + 20000, ['places' => 0,'after' => ' VND']);?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <?= $this->Form->create($order) ?>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <?= $this->Form->control('firstname',['class'=>'form-control', 'required' => false])?>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <?= $this->Form->control('lastname',['class'=>'form-control', 'required' => false])?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?= $this->Form->control('phone',['class'=>'form-control', 'required' => false])?>
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-12">
                                   <?= $this->Form->control('address',['class'=>'form-control', 'required' => false])?>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-12">
                                    <?= $this->Form->control('email',['class'=>'form-control', 'required' => false])?>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?= $this->Form->control('zipcode',['class'=>'form-control', 'required' => false])?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?= $this->Form->control('note',['class'=>'form-control', 'required' => false])?>
                                </div>
                            </div>
                        </div>
                         <div class="form-group text-center">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->button('Place Order',['class'=>'btn btn-info btn-lg']) ?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Html->link('Back',['action' => 'home'], ['class'=>'btn btn-success btn-lg']) ?>
                            </div>
                        </div>
                        <?= $this->Form->end(); ?>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <!--  <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card Type:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card CVV:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Expiration Date</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- CREDIT CART PAYMENT END -->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>