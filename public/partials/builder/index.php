<?php //tmb_dd($rows); ?>
<div class="bootstra-iso">
  <form>
  <?php if($rows){ ?>
    <?php $index = 0; ?>
    <ul class="nav nav-tabs" id="stepTab" role="tablist">
      <?php foreach($rows as $k => $v){ ?>
              <?php
                $last_step = 'is-last-step-' . $v['is_last_step'];
                $index_last_step = '';
                if( (count($rows)-1) == $index ){
                  $index_last_step = 'index-last-step';
                }
              ?>
              <li class="nav-item">
                <a
                  class="nav-link <?php echo ($index == 0) ? 'active':'';?> <?php echo $last_step;?> <?php echo $index_last_step;?>"
                  id="nav-<?php echo $k;?>"
                  data-toggle="tab"
                  href="#tab-content-<?php echo $k;?>"
                  role="tab"
                  aria-controls="tab-content-<?php echo $k;?>"
                  aria-selected="true"
                >
                  <?php echo $v['step_title']; ?>
                </a>
              </li>
              <?php $index++; ?>
      <?php }//foreach ?>
    </ul>
  <?php }//if ?>

  <?php if($rows){ ?>
    <?php $tab_index = 1; ?>
    <?php $count_rows = count($rows); ?>
    <div class="tab-content" id="stepTabContent">
      <?php foreach($rows as $k => $v){ ?>
              <?php
                $last_step = 'is-last-step-' . $v['is_last_step'];
                $index_last_step = '';
                if( $count_rows == $tab_index ){
                  $index_last_step = 'index-last-step';
                }
              ?>
              <div
                class="tab-pane fade show <?php echo ($tab_index == 1) ? 'active':'';?> <?php echo $last_step;?> <?php echo $index_last_step;?>"
                id="tab-content-<?php echo $k;?>"
                role="tabpanel"
                aria-labelledby="tab-content-<?php echo $k;?>"
              >
                <h1><?php echo $v['heading']; ?></h1>

                <?php echo do_shortcode($v['content']); ?>

                <div class="input-group mb-3 group-end">
                  <?php if($count_rows > $tab_index){ ?>
                    <a class="btn btn-primary btnNext">Next</a>
                  <?php } ?>

                  <?php if($tab_index > 1){ ?>
                    <a class="btn btn-primary btnPrevious">Previous</a>
                  <?php } ?>
                </div>
                <!--/. form element wrap -->

              </div>
              <?php $tab_index++; ?>
      <?php }//foreach ?>
    </div><!-- stepTabContent -->
  <?php }//if ?>

    <input type="hidden" id="current-step" name="current-step" value="">
  </form>
</div><!-- bootstra-iso -->
