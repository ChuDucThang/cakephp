<div type="button" class="btn btn-secondary" data-placement="" title="">
    View User
</div>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
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
        <?php   echo $this->Form->control('fullname');?>
        </div>
        <div class="form-group col-md-6">
        <?php   echo $this->Form->control('phone');?>
        </div>
        <div class="form-group col-md-6">
        <?php   echo $this->Form->control('address');?>
        </div>
        <div class="form-group col-md-6">
        <?php   echo $this->Form->control('email');?>
        </div>
        <div class="form-group col-md-6">
            <select name="level" class="form-control">
                <option value="2">Thủ thư</option>
                <option value="3">Nhân viên</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <select name="status" class="form-control">
                <?php if($user->status == 0){ ?>
                <option value="0" selected>Hiển thị</option>
                <option value="1">Không hiển thị</option>
                <?php }else{ ?>
                <option value="0">Hiển thị</option>
                <option value="1" selected>Không hiển thị</option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
        <?php   echo $this->Form->control('created_at');?>
        </div>
        <div class="form-group col-md-6">
        <?php   echo $this->Form->control('updated_at');?>
        </div>
       </div>
    </fieldset>
    <a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
    <?= $this->Form->end() ?>
</div>
