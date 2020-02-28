<div type="button" class="btn btn-secondary" data-placement="" title="">
    DANH SÁCH USER
</div>
<a href="" class="btn btn-success">ADD user</a>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Image</th>
      <th scope="col">Fullname</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Level</th>
      <th scope="col">Status</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $key => $u):?>
    <tr>
      <th scope="row"><?php echo $u->id ?></th>
      <td><?php echo $u->username ?></td>
      <td><?php echo $u->password ?></td>
      <td><?php echo $u->image ?></td>
      <td><?php echo $u->fullname ?></td>
      <td><?php echo $u->phone ?></td>
      <td><?php echo $u->address ?></td>
      <td><?php echo $u->email ?></td>
      <td><?php echo $u->level ?></td>
      <td><?php echo $u->status ?></td>
      <td><?php echo $u->created_at ?></td>
      <td><?php echo $u->updated_at ?></td>
      <td>
          <a href="" class="btn btn-primary">View</a>
          <a href="<?= $this->Url->build(['controller'=>'Users', 'action' => 'edit', $u->id]) ?>" class="btn btn-info">Edit</a>
          <a href="#" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>