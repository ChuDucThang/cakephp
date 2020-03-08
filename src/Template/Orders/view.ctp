<div type="button" class="btn btn-secondary" data-placement="" title="">
    View Order
</div>
<div class="card">
    <div class="card-body">
        Thong tin ve khach hang
    </div>
</div>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
       <div class="row">
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('firstname', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group col-md-6">
             <?php echo $this->Form->control('lastname', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('phone', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('address', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->input('email', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('zipcode', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('note', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('status', ['class' => 'form-control']);?>
        </div>
       </div>
       <div class="card">
            <div class="card-body">
                Thong tin san pham
            </div>
            <div class="container">
               <table class="table table-bordered table-inverse table-hover">
                   <thead>
                       <tr>
                           <th style="color:black;">STT</th>
                           <th style="color:black;">Order ID</th>
                           <th style="color:black;">Quantity</th>
                           <th style="color:black;">Price</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php foreach ($ordersdetail as $key => $value) : ?>
                       <tr>
                           <td style="color:black;"><?= $value['id']  ?></td>
                           <td style="color:black;"><?= $value['order_id']  ?></td>
                           <td style="color:black;"><?= $value['quantity']  ?></td>
                           <td style="color:black;"><?= $value['price']  ?></td>
                       </tr>
                   <?php endforeach; ?>
                   </tbody>
               </table>
            </div>
        </div>
    </fieldset>
    <a href="<?= $this->Url->build(['action' => 'confirm', $order->id]); ?>" class="btn btn-outline-danger" title="">Xác nhận đơn hàng</a>
    <a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
    <?= $this->Form->end() ?>
</div>

