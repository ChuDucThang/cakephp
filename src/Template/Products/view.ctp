<div type="button" class="btn btn-secondary" data-placement="" title="">
    View Product
</div>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
       <div class="row">
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group col-md-6">
             <?php echo $this->Form->control('cat_id', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group col-md-6">
            <?php echo $this->Form->control('image', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('description', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->input('price', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('status', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('created_at', ['class' => 'form-control']);?>
        </div>
        <div class="form-group col-md-6">
            <?php   echo $this->Form->control('updated_at', ['class' => 'form-control']);?>
        </div>
       </div>
    </fieldset>
    <a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
    <?= $this->Form->end() ?>
</div>
