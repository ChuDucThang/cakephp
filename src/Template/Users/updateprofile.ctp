<?= $this->Html->css('profile.css') ?>
    <?= $this->Form->create($profile) ?>
    <div class="container main-secction">
        <div class="row">
            <div class="form-group col-md-6">
            <?php echo $this->Form->control('username'); ?>
            </div>
            <div class="form-group col-md-6">
             <?php echo $this->Form->control('password'); ?>
            </div>
            <div class="form-group col-md-6">
             <?php echo $this->Form->control('image'); ?>
            </div>
            <div class="form-group col-md-6">
            <?php echo $this->Form->control('fullname');?>
            </div>
            <div class="form-group col-md-6">
            <?php echo $this->Form->control('phone');?>
            </div>
            <div class="form-group col-md-6">
            <?php echo $this->Form->control('address');?>
            </div>
            <div class="form-group col-md-6">
            <?php echo $this->Form->control('email');?>
            </div>
            <div class="form-group col-md-6">
            <div class="form-group col-md-6">
            <?php echo $this->Form->control('created_at');?>
            </div>
            <div class="form-group col-md-6">
            <?php echo $this->Form->control('updated_at');?>
            </div>
        </div>
    </div>
    <div class="text-center">
        <?= $this->Form->button(__('Submit',['class' => 'btn btn-primary'])) ?>
    </div>
    <?= $this->Form->end()  ?>