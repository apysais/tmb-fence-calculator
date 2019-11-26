<?php if($get_fence_types){ ?>
  <div class="row">
    <?php foreach($get_fence_types as $k => $v){ ?>
              <?php
                $img = get_field('image', $v);
                $card_img = tmb_get_tax_acf_img($img)
              ?>
              <div class="col-sm-3 fence-type-col">
                <a href="#" class="js-fence-type" data-fence-type="<?php echo $v->slug;?>"><div class="card text-center">
                  <img class="card-img-top" src="<?php echo $card_img;?>" alt="">
                  <div class="card-body">
                    <?php echo $v->name;?>
                  </div>
                </div></a>
              </div>
    <?php } ?>
  </div>
  <input type="hidden" id="input-js-fence-type" name="input-js-fence-type" value="0">
<?php } ?>
