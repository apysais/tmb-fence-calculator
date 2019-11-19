<?php if($timber_species){ ?>
  <ul>
  <?php foreach($timber_species as $k => $v){ ?>
            <li><a href="#" class="js-timber-species" data-timber-species="<?php echo $v->slug;?>"><?php echo $v->name;?></a></li>
  <?php } ?>
  </ul>
  <input type="hidden" id="input-js-timber-species" name="input-js-timber-species" value="0">
<?php } ?>
