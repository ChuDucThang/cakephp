<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN FORM</title>
  <?= $this->Html->css('login.css')?>
  <?= $this->Html->css('bootstrap.min.css')?>

  <?= $this->Html->css('font-awesome.min.css')?>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  <div class="main">
    <div class="container">
<center>
  <div class="middle">
      <div id="login">
         <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">LOGO
          
          <div class="clearfix"></div>
      </div>
      
      </div>
    </center>
    </div>

</div>
</body>
</html>

