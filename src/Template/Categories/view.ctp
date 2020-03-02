<div type="button" class="btn btn-secondary" data-placement="" title="">
    Thông tin category
</div>
<div class="users view large-9 medium-8 columns content" style="margin-top:50px;">
	<?= $this->Form->create($cat, ['type' => 'file']); ?>
	    <div class="form-group col-md-6">
 			<?= $this->Form->input('name')?>
	    </div>
	    <div class="form-group col-md-6">
	     	<?= $this->Form->input('status') ?>
	    </div>
	    <div class="form-group col-md-6">
	     	<?= $this->Form->input('created_at',['class'=>'form-control']) ?>
	    </div>
	    <div>
			<a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
		</div>
	<?= $this->Form->end() ?>
</div>
