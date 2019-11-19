<?php if($get_fence_types){ ?>
  <ul class="row">
    <?php foreach($get_fence_types as $k => $v){ ?>
              <li class="col-md"><a href="#" class="js-fence-type" data-fence-type="<?php echo $v->slug;?>"><?php echo $v->name;?></a></li>
    <?php } ?>
  </ul>
  <input type="hidden" id="input-js-fence-type" name="input-js-fence-type" value="0">
<?php } ?>
