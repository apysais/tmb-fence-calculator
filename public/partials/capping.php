<?php if($get_capping){ ?>
  <ul>
  <?php foreach($get_capping as $k => $v){ ?>
          <li><a href="#" class="js-capping" data-capping="<?php echo $v->slug;?>" data-val="<?php echo get_field('value', $v);?>"><?php echo $v->name;?></a></li>
  <?php } ?>
</ul>
<input type="hidden" id="input-js-capping" name="input-js-capping" value="0">
<input type="hidden" id="input-js-capping-val" name="input-js-capping-val" value="0">
<?php } ?>
