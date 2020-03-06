<div type="button" class="btn btn-secondary" data-placement="" title="">
    DANH SÁCH Order
</div>
<a class="btn btn-success" href="<?php echo $this->Url->build(['action'=>'add']); ?>" >ADD Order</a>
<table class="table table-striped table-bordered table-hover" style="margin-top:50px;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Zipcode</th>
      <th scope="col">Status</th>
      <th scope="col">Note</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($orders as $key => $o):?>
    <tr>
      <th scope="row"><?php echo $o->id ?></th>
      <td><?php echo $o->firstname ?></td>
      <td><?php echo $o->lastname?></td>
      <td><?php echo $o->phone ?></td>
      <td><?php echo $o->address ?></td>
      <td><?php echo $o->email ?></td>
      <td><?php echo $o->zipcode ?></td>
      <td>
          <?php if($o->status == 0){ ?>
            <span class="badge badge-primary">Cho xac nhan</span>
          <?php }elseif ($o->status == 1) { ?>
            <span class="badge badge-danger">Da xac nhan</span>
          <?php } ?>

      </td>
      <td><?php echo $o->note ?></td>
      <td>
          <a href="<?= $this->Url->build(['controller'=>'Orders', 'action' => 'view', $o->id]) ?>" class="btn btn-primary">View</a>
          <?= $this->Form->postLink('Delete', ['action' => 'delete', $o->id], [ 'class'=>'btn btn-danger' , 'confirm' => __('Are you sure you want to delete # {0}?', $o->id)]); ?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
