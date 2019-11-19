<?php if($picket){ ?>
  <ul class="picket-type-shape row">
  <?php foreach($picket as $k => $v){ ?>
            <li class="col-md-3 col-sm-6"><a href="#" class="js-fence-type-shape" data-type-shape="<?php echo $v->slug;?>"><?php echo $v->name;?></a></li>
  <?php } ?>
  </ul>
<?php } ?>

<?php if($pailing){ ?>
  <ul class="pailing-type-shape row">
  <?php foreach($pailing as $k => $v){ ?>
            <li class="col-md-3 col-sm-6"><a href="#" class="js-fence-type-shape" data-type-shape="<?php echo $k;?>"><?php echo $v;?></a></li>
  <?php } ?>
  </ul>
  <input type="hidden" id="input-js-fence-type-shape" name="input-js-fence-type-shape" value="0">
<?php } ?>
