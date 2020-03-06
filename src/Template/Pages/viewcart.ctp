 <div class="heading cf">
    <h1>My Cart</h1>
  </div>
<?php if ($cart){ 
        $total = 0;
    ?>
<div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart['Ordersdetail'] as $key => $cart):
                        $total = $total + $cart['total'];
                        ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="https://i.pinimg.com/originals/19/f5/f7/19f5f71b440cdbab667206d951043ef9.jpg" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body" style="margin-top: 20px;margin-left: 10px;">
                                <h4 class="media-heading"><a href="#"><?= $cart['name'] ?></a></h4>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <?= $this->Form->create(NULL, ['url' => ['controller' => 'Pages', 'action' => 'updatecart']]); ?>
                        <?= $this->Form->input('id', ['type' => 'hidden', 'value' => $cart['product_id']]); ?>
                        <?= $this->Form->input('quantity', ['label' => false, 'div' => false, 'class' => 'numeric form-control input-small', 'type' => 'tel', 'size'=> 2, 'min' => 1, 'max' => 99, 'maxlength' => 2, 'value' => $cart['quantity']]); ?>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?= $this->Number->format($cart['price'],['places'=>0, 'after'=>' VND']); ?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?= $this->Number->format($cart['total'],['places'=>0, 'after'=>' VND']);?></strong></td>
                        <td class="col-sm-1 col-md-1">
                            <?php echo $this->Form->button('<i class="fa fa-calculator"></i> &nbsp; Update', ['class' => 'btn btn-outline-info btn-sm', 'type' =>'submit', 'escape' => false]);?>
                            <?php echo $this->Form->end(); ?>
                            <a href="<?php echo $this->Url->build(['action'=>'deletecart', $key]) ?>" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal<br>Estimated shipping</h5><h3>Total</h3></td>
                        <td class="text-right"><h5><strong><?= $this->Number->format($total,['places'=>0, 'after'=>' VND']); ?><br><?= $this->Number->format(20000,['places'=>0, 'after'=>' VND']); ?></strong></h5><h3><?= $this->Number->format($total + 20000,['places'=>0, 'after'=>' VND']); ?></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td> 
                            <?php echo $this->Html->link('<i class="fa fa-ban"></i> &nbsp; Clear Shooping Cart', ['controller' => 'Pages', 'action' => 'clear'], ['class' => 'btn btn-danger', 'escape' => false]); ?>
                        </td>
                        <td>
                        <a href="<?php echo $this->Url->build(['action'=>'home']); ?>" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        <td>
                             <?php echo $this->Html->link('<i class="fa fa-ban"></i> &nbsp; Checkout', ['controller' => 'Pages', 'action' => 'checkout'], ['class' => 'btn btn-success', 'escape' => false]); ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php }else{?>
    <div class="alert alert-light" role="alert">
        Gio hang <strong>trong.</strong> Mời ban quay lại <a class="btn btn-success" href="<?php echo $this->Url->build(['action'=>'home']); ?>">Home</a> mua hàng.
    </div>
<?php }?>