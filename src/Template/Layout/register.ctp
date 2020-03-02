<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>REGISTER FORM</title>
	<link rel="stylesheet" href="">
	<?= $this->Html->css('font-awesome.min.css') ?>

  <!-- CSS Files -->
  <?= $this->Html->css('material-dashboard.css') ?>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <?= $this->Html->css('demo.css') ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
   <?= $this->fetch('script') ?>
</head>
<body>
	<div class="container">
		<?= $this->Flash->render() ?>
		<?= $this->Form->create() ?>
		<div class="form-group">
			<?= $this->Form->input('username',['class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('password',['class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('image',['class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('fullname',['class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('phone',['class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('address',['class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('email',['class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('level',['type' => 'number', 'class' => 'form-control']) ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('status',['type' => 'number','class' => 'form-control']) ?>
		</div>
		<?= $this->Form->button('Resgister', ['class' => 'btn btn-primary']) ?>
		<?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'] , ['class' => 'btn btn-info']) ?>
		<?= $this->Form->end() ?>
</div>
</body>
</html>