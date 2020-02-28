<div type="button" class="btn btn-secondary" data-placement="" title="">
    DANH SÁCH Category
</div>
<a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-success">ADD category</a>
<table class="table table-striped table-bordered table-hover" style="margin-top:50px;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($cats as $key => $c):?>
    <tr>
      <th scope="row"><?php echo $c->id ?></th>
      <td><?php echo $c->name ?></td>
      <td><?php echo $c->status ?></td>
      <td><?php echo $c->created_at ?></td>
      <td>
          <a href="<?= $this->Url->build(['action' => 'view', $c->id]) ?>" class="btn btn-primary">View</a>
          <a href="<?= $this->Url->build(['action' => 'edit', $c->id]) ?>" class="btn btn-info">Edit</a>
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $c->id], ['confirm' => __('Are you sure you want to delete # {0}?', $c->id)]); ?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>