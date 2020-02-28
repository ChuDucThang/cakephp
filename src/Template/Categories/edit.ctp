<div type="button" class="btn btn-secondary" data-placement="" title="">
    Sua thong tin category
</div>
<div class="users view large-9 medium-8 columns content" style="margin-top:50px;">
	<?= $this->Form->create($cat, ['type' => 'file']); ?>
	    <div class="form-group col-md-6">
 			<?= $this->Form->control('name')?>
	    </div>
	    <div class="form-group col-md-6">
	     	<?= $this->Form->control('status')?>
	    </div>
	    <div class="form-group col-md-6">
	     	<?php echo $this->Form->control('created_at',['type' => 'date', 'class'=>'form-control'])?>
	    </div>
	    <div>
			<?= $this->Form->button(__('Submit')) ?>
			<a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
		</div>
	<!-- </form> -->
	<?= $this->Form->end() ?>
</div>