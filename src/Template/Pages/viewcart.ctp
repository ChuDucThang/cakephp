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
                    <?php foreach ($cart['Orders'] as $key => $cart):
                        $total = $total + $cart['price'];
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
                        <input type="email" class="form-control" id="exampleInputEmail1" value="<?= $cart['quantity'] ?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?= $this->Number->format($cart['price'], ['places' => 0,'after' => ' VND']);?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?= $this->Number->format($cart['total'], ['places' => 0,'after' => ' VND']);?></strong></td>
                        <td class="col-sm-1 col-md-1">
                            <a href="" class="btn btn-outline-info">Update</a>
                              <div class="col-md-1 col-sm-1 col-12"><?php echo $this->Html->link('<i class="fa fa-trash"></i>', ['controller' => 'Pages', 'action' => 'deletecart', $cart['product_id']], ['class' => 'btn btn-secondary btn-sm', 'escape' => false]); ?></div>
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
                        <td class="text-right"><h5><strong><?= $this->Number->format($total, ['places' => 0,'after' => ' VND']); ?><br><?= $this->Number->format('40000', ['places' => 0,'after' => ' VND']); ?></strong></h5><h3><?= $this->Number->format($total + 40000, ['places' => 0,'after' => ' VND']); ?></h3></td>
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
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
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