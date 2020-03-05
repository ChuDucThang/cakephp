 <?= $this->Form->create() ?>

          <fieldset class="clearfix">
            <?= $this->Form->input('email',['class' => 'form-control']) ?>       
          </fieldset>
          <div class="clearfix" style="margin-top: 20px;">
          		<?= $this->Form->button('Submit', ['class' => 'btn btn-info']) ?>
          </div>
        <?= $this->Form->end() ?>