<?php if($timber_species){ ?>
  <?php TMB_AjaxSpinners::get_instance()->get('Loading Timber Species...');?>
  <div class="row js-timber-species-container">
  <?php foreach($timber_species as $k => $v){ ?>

  <?php } ?>
</div>
  <input type="hidden" id="input-js-timber-species" name="input-js-timber-species" value="0">
<?php } ?>
