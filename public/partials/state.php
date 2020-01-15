<?php if($get_state){ ?>
<div class="map-container">
  <svg class="svg-map" preserveAspectRatio="xMidYMid meet" viewBox="0 0 500 450" xmlns="http://www.w3.org/2000/svg">
    <a href="#" class="js-au-state" data-au-state="sa-nt">
      <?php TMB_View::get_instance()->public_partials('map/nt.php', $data); ?>
    </a>
    <a href="#" class="js-au-state" data-au-state="wa">
      <?php TMB_View::get_instance()->public_partials('map/wa.php', $data); ?>
    </a>
    <a href="#" class="js-au-state" data-au-state="nsw-act">
      <?php TMB_View::get_instance()->public_partials('map/nsw.php', $data); ?>
    </a>
    <a href="#" class="js-au-state" data-au-state="nsw-act">
      <?php TMB_View::get_instance()->public_partials('map/act.php', $data); ?>
    </a>
    <a href="#" class="js-au-state" data-au-state="sa-nt">
      <?php TMB_View::get_instance()->public_partials('map/sa.php', $data); ?>
    </a>
    <a href="#" class="js-au-state" data-au-state="vic">
      <?php TMB_View::get_instance()->public_partials('map/vic.php', $data); ?>
    </a>
    <a href="#" class="js-au-state" data-au-state="qld-fnq">
      <?php TMB_View::get_instance()->public_partials('map/qld.php', $data); ?>
    </a>
    <a href="#" class="js-au-state" data-au-state="tas">
      <?php TMB_View::get_instance()->public_partials('map/tas.php', $data); ?>
    </a>
  </svg>
  <input type="hidden" id="input-js-au-state" name="input-js-au-state" value="0">
</div>

<?php } ?>
