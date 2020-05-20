<div class="container dimension-fence">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <!--<img src="<?php //echo tmb_get_assets_url_img('fence-diagram.png'); ?>" >-->
      <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/12/fence-measurement-deskt-2.png" >
    </div>
    <div class="col-sm-12 col-md-6">
      <div class="form-group row">
        <label for="length" class="col-sm-1 col-1">A</label>
        <div class="col-sm-6 col-6">
          <input type="text" name="length" value="0" class="js-length form-control form-control-sm">
        </div>
        <div class="col-sm-4 col-4 sm-grid-col">
          <span>m</span>
        </div>
      </div>

      <?php TMB_AjaxSpinners::get_instance()->get('Loading Available Height...');?>

      <?php if($choices){ ?>
        <div class="form-group row">
          <label for="height" class="col-sm-1 col-1">B</label>
          <div class="col-sm-6 col-6">
            <select name="height" class="js-height form-control form-control-sm">
              <?php foreach($choices as $k => $v){?>
                      <option value="<?php echo $k;?>">
                        <?php echo $v;?>
                      </option>
              <?php } ?>
            </select>
          </div>
          <div class="col-sm-4 col-4 sm-grid-col">
            <span>mm</span>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
