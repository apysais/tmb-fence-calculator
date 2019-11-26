<div id="tab-picket-shapes-container">
  <?php TMB_AjaxSpinners::get_instance()->get('Loading Shapes...');?>
  <?php if($picket){ ?>
    <div class="picket-type-shape row js-picket-shapes-container">
    <?php foreach($picket as $k => $v){ ?>
            <?php
              $img = get_field('image', $v);
              $card_img = tmb_get_tax_acf_img($img)
            ?>
            <div class="col-sm-3 fence-type-col">
              <a href="#" class="js-fence-type-shape" data-type-shape="<?php echo $v->slug;?>"><div class="card text-center">
                <img class="card-img-top" src="<?php echo $card_img;?>" alt="">
                <div class="card-body">
                  <?php echo $v->name;?>
                </div>
              </div></a>
            </div>
    <?php } ?>
    </div>
  <?php } ?>

  <?php if($pailing){ ?>
    <div class="pailing-type-shape row">
      <?php foreach($pailing as $k => $v){ ?>
        <?php
          $img = get_field('image', $v);
          $card_img = tmb_get_tax_acf_img($img)
        ?>
        <div class="col-sm-3 fence-type-col">
          <a href="#" class="js-fence-type-shape" data-type-shape="<?php echo $k;?>"><div class="card text-center">
            <img class="card-img-top" src="<?php echo $card_img;?>" alt="">
            <div class="card-body">
              <?php echo $v;?>
            </div>
          </div></a>
        </div>
    <?php } ?>
    </div>
    <input type="hidden" id="input-js-fence-type-shape" name="input-js-fence-type-shape" value="0">
  <?php } ?>
</div>
