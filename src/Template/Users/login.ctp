 <?= $this->Form->create() ?>

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input type="text" name="username"  Placeholder="Username"></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fa fa-lock"></span><input type="password" name="password"  Placeholder="Password"></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="<?= $this->Url->build(['controller'=>'Users', 'action' => 'forgotpassword']) ; ?>">Forgot password?</a></span>
                <span style="width:50%; text-align:right;  display: inline-block;"><?=  $this->Form->button('Sign up',['class'=>'btn btn-info']) ?></span>
            </div>
            <div>
            </div>

          </fieldset>
          <div class="clearfix"></div>
        <?= $this->Form->end() ?>