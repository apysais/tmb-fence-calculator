<p>Length(mm)</p>
<p><input type="text" name="length" value="0" class="js-length"></p>

<p>Height(mm)</p>
<?php TMB_AjaxSpinners::get_instance()->get('Loading Available Height...');?>
<?php if($choices){ ?>
  <select name="height" class="js-height">
    <?php foreach($choices as $k => $v){?>
            <option value="<?php echo $k;?>">
              <?php echo $v;?>
            </option>
    <?php } ?>
  </select>
<?php } ?>
