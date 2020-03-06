<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ordersdetail'), ['controller' => 'Ordersdetail', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ordersdetail'), ['controller' => 'Ordersdetail', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($order->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($order->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($order->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($order->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($order->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zipcode') ?></th>
            <td><?= $this->Number->format($order->zipcode) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Note') ?></h4>
        <?= $this->Text->autoParagraph(h($order->note)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ordersdetail') ?></h4>
        <?php if (!empty($order->ordersdetail)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->ordersdetail as $ordersdetail): ?>
            <tr>
                <td><?= h($ordersdetail->id) ?></td>
                <td><?= h($ordersdetail->product_id) ?></td>
                <td><?= h($ordersdetail->order_id) ?></td>
                <td><?= h($ordersdetail->quantity) ?></td>
                <td><?= h($ordersdetail->price) ?></td>
                <td><?= h($ordersdetail->created_at) ?></td>
                <td><?= h($ordersdetail->updated_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ordersdetail', 'action' => 'view', $ordersdetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ordersdetail', 'action' => 'edit', $ordersdetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ordersdetail', 'action' => 'delete', $ordersdetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersdetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
 -->
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
            <?php echo $this->Form->control('firstname'); ?>
        </div>
        <div class="form-group col-md-6">
             <?php echo $this->Form->control('lastname', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('phone'); ?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('address', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->input('email');?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('zipcode');?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('note', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('status');?>
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
                           <th style="color:black;">Name</th>
                           <th style="color:black;">Image</th>
                           <th style="color:black;">Quantity</th>
                           <th style="color:black;">Price</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                       </tr>
                   </tbody>
               </table>
            </div>
        </div>
    </fieldset>
    <a href="" class="btn btn-outline-danger">Xac nhan don hang</a>
    <a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
    <?= $this->Form->end() ?>
</div>

