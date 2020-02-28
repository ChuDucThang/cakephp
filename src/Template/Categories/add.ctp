<div type="button" class="btn btn-secondary" data-placement="" title="">
    Them category
</div>
<div class="users view large-9 medium-8 columns content" style="margin-top:50px;">
	<?= $this->Form->create(); ?>
	<form  method="post" enctype="multipart/form-data">
	    <div class="form-group col-md-6">
 			<?= $this->Form->control('name')?>
	    </div>
	    <div class="form-group col-md-6">
	     	<?= $this->Form->control('status')?>
	    </div>
	    <div class="form-group col-md-6">
	     	<?= $this->Form->date('created_at')?>
	    </div>
	    <div>
			<?= $this->Form->button(__('Submit')) ?>
			<a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
		</div>
	<!-- </form> -->
	<?= $this->Form->end() ?>
</div>