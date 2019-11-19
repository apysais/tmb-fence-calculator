<?php if($get_state){ ?>
  <ul>
  <?php foreach($get_state as $k => $v){ ?>
            <li><a href="#" class="js-au-state" data-au-state="<?php echo $v->slug;?>"><?php echo $v->name;?></a></li>
  <?php } ?>
</ul>
<input type="hidden" id="input-js-au-state" name="input-js-au-state" value="0">
<?php } ?>
