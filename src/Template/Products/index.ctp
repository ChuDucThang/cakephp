<div type="button" class="btn btn-secondary" data-placement="" title="">
    DANH SÁCH Product
</div>
<a class="btn btn-success" href="<?php echo $this->Url->build(['action'=>'add']); ?>" >ADD product</a>
<table class="table table-striped table-bordered table-hover" style="margin-top:50px;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Cat_id</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($products as $key => $p):?>
    <tr>
      <th scope="row"><?php echo $p->id ?></th>
      <td><?php echo $p->name ?></td>
      <td><?php echo $p->cat_id?></td>
      <td><?php echo $p->image ?></td>
      <td><?php echo $p->description ?></td>
      <td><?php echo $p->price ?></td>
      <td><?php echo $p->status ?></td>
      <td><?php echo $p->created_at ?></td>
      <td><?php echo $p->updated_at ?></td>
      <td>
          <a href="<?= $this->Url->build(['controller'=>'Products', 'action' => 'view', $p->id]) ?>" class="btn btn-primary">View</a>
          <a href="<?= $this->Url->build(['controller'=>'Products', 'action' => 'edit', $p->id]) ?>" class="btn btn-info">Edit</a>
          <?= $this->Form->postLink('Delete', ['action' => 'delete', $p->id], [ 'class'=>'btn btn-danger' , 'confirm' => __('Are you sure you want to delete # {0}?', $p->id)]); ?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>