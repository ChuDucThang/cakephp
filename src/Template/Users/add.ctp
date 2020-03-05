
<div type="button" class="btn btn-secondary" data-placement="" title="">
    Thêm User
</div>
<div class="users view large-9 medium-8 columns content" style="margin-top:50px;">
    <?= $this->Form->create(); ?>
        <div class="row">
            <div class="form-group col-md-6">
            <?= $this->Form->input('username',['class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('password',['class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('image',['class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('fullname',['class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('phone',['class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('address',['class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('email',['class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <select name="level" class="form-control">
                <option value="2">Thủ thư</option>
                <option value="3">Nhân viên</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <select name="status" class="form-control">
                <option value="0">Hiển thị</option>
                <option value="1">Không hiển thị</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('created_at',['type' => 'date', 'class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->input('updated_at',['type' => 'date', 'class'=>'form-control'])?>
        </div>
        </div>
        <div>
            <?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ?>
            <a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
        </div>
    <!-- </form> -->
    <?= $this->Form->end() ?>
</div>
