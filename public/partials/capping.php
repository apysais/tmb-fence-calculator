<?php if($get_capping){ ?>
  <div class="row select-capping d-flex justify-content-center">
  <?php foreach($get_capping as $k => $v){ ?>
          <?php
            $img = get_field('image', $v);
            $card_img = tmb_get_tax_acf_img($img)
          ?>
          <div class="col-md-4  col-sm-6 col-6 fence-type-col">
            <a href="#" class="js-capping" data-capping="<?php echo $v->slug;?>" data-val="<?php echo get_field('value', $v);?>"><div class="card text-center">
              <img class="card-img-top" src="<?php echo $card_img;?>" alt="">
              <div class="card-body">
                <?php echo $v->name;?>
              </div>
            </div></a>
          </div>
  <?php } ?>
</div>
<input type="hidden" id="input-js-capping" name="input-js-capping" value="0">
<input type="hidden" id="input-js-capping-val" name="input-js-capping-val" value="0">
<?php } ?>
