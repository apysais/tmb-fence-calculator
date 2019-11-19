<?php if($get_plinth){ ?>
  <ul>
  <?php foreach($get_plinth as $k => $v){ ?>
          <li><a href="#" class="js-plinth" data-plinth="<?php echo $v->slug;?>" data-val="<?php echo get_field('value', $v);?>"><?php echo $v->name;?></a></li>
  <?php } ?>
</ul>
<input type="hidden" id="input-js-plinth" name="input-js-plinth" value="0">
<input type="hidden" id="input-js-plinth-val" name="input-js-plinth-val" value="0">
<?php } ?>
