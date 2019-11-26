<div class="form-group">
  <label for="length">Length(m)</label>
  <input type="text" name="length" value="0" class="js-length form-control form-control-sm">
</div>

<?php TMB_AjaxSpinners::get_instance()->get('Loading Available Height...');?>
<?php if($choices){ ?>
  <div class="form-group">
    <label for="length">Height</label>
    <select name="height" class="js-height form-control form-control-sm">
      <?php foreach($choices as $k => $v){?>
              <option value="<?php echo $k;?>">
                <?php echo $v;?>
              </option>
      <?php } ?>
    </select>
  </div>
<?php } ?>
