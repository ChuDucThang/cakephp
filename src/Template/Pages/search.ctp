<?= $this->Html->css('product.css') ?>
<?php foreach ($postdata as $key => $p): ?>
<div class="block">
  
  <div class="top text-center">
    <span class="converse"><?= $p->name ?></span>
  </div>
  
  <div class="middle">
    <img src="https://i.pinimg.com/originals/19/f5/f7/19f5f71b440cdbab667206d951043ef9.jpg" alt="pic" />
  </div>
  
  <div class="bottom">
    <div class="heading"><?= $p->name ?></div>
    <div class="price"><?= $this->Number->format($p->price, ['places' => 0,'after' => ' VND']);?></div>
  </div>
  <div class="bottom">
  <a href="" class="btn btn-success">View</a>
  <?php echo $this->Form->create(NULL, ['url' => ['controller' => 'Pages', 'action' => 'addcart']]); ?>
  <?php echo $this->Form->input('id', ['type' => 'hidden', 'value' => $p->id]); ?>
  <?php echo $this->Form->button('<i class="fa fa-cart-plus"></i> &nbsp; Add to Cart', ['style="width:232px"' ,'class' => 'btn btn-outline-info btn-xs', 'type' =>'submit', 'escape' => false]);?>
  <?php echo $this->Form->end(); ?>
  </div>
</div>
<?php endforeach; ?>
