<div type="button" class="btn btn-secondary" data-placement="" title="">
    Thêm PRODUCT
</div>
<div class="users view large-9 medium-8 columns content" style="margin-top:50px;">
    <?= $this->Form->create($product); ?>
        <div class="form-group col-md-6">
            <?= $this->Form->control('name',['class'=>'form-control', 'required' => false])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->control('cat_id',['label'=>'Category','class'=>'form-control'])?>
        </div>
         <div class="form-group col-md-6">
            <?= $this->Form->control('image',['class'=>'form-control', 'required' => false])?>
        </div>
         <div class="form-group col-md-6">
            <?= $this->Form->control('description',['class'=>'form-control', 'required' => false])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->control('price',['class'=>'form-control', 'required' => false])?>
        </div>
        <div class="form-group col-md-6">
            <select name="status" class="form-control">
                <option value="0">Hiển thị</option>
                <option value="1">Không hiển thị</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->control('created_at',['type' => 'date', 'class'=>'form-control'])?>
        </div>
        <div class="form-group col-md-6">
            <?= $this->Form->control('updated_at',['type' => 'date', 'class'=>'form-control'])?>
        </div>
        <div>
            <?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ?>
            <a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
        </div>
    <!-- </form> -->
    <?= $this->Form->end() ?>
</div>
