<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN FORM</title>
  <?= $this->Html->css('login.css')?>
  <?= $this->Html->css('bootstrap.min.css')?>

  <?= $this->Html->css('font-awesome.min.css')?>
</head>
<body>
  <div class="main">
    <div class="container">
<center>
  <div class="middle">
      <div id="login">

        <form action="javascript:void(0);" method="get">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input type="text"  Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fa fa-lock"></span><input type="password"  Placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                                <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
                                password?</a></span>
                                <!-- <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span> -->
                            </div>
            <div>
              <a class="btn btn-success" href="<?= $this->Url->build(['controller'=>'Dashboard','action'=>'index']) ?>">Login</a>
            </div>

          </fieldset>
          <div class="clearfix"></div>
        </form>

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

