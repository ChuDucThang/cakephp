<div type="button" class="btn btn-secondary" data-placement="" title="">
    Thông tin category
</div>
<div class="users view large-9 medium-8 columns content" style="margin-top:50px;">
	    <div class="form-group col-md-6">
	      <label for="usr">Name:</label>
	      <input type="text" class="form-control" value="<?= $cat->name ?>">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="pwd">Status</label>
	      <input type="text" class="form-control" value="<?= $cat->status ?>">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="pwd">Created_at</label>
	      <input type="date" class="form-control" value="<?= $cat->created_at ?>">
	    </div>
	    <div>
			<a href="<?= $this->Url->build(['action'=>'index'])?>" class="btn btn-info">Back</a>
		</div>
</div>
