<?php TMB_AjaxSpinners::get_instance()->get('Loading Available Width...');?>
<div class="form-group row with-spacing-overlap">
  <label for="length" class="col-sm-5 col-5">Width</label>
  <div class="col-sm-4 col-4">
    <select name="width" class="js-width form-control form-control-sm">
    </select>
  </div>
  <div class="col-sm-3 col-3" style="padding-left:0px;">
    <span>mm</span>
  </div>
</div>

<div class="form-group row js-spacing-container with-spacing-overlap">
  <label for="length" class="col-sm-5 col-5">Gap</label>
  <div class="col-sm-4 col-4">
    <select name="width" name="spacing" class="js-spacing form-control form-control-sm">
      <option value="0">0</option>
      <option value="5">5</option>
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="30">30</option>
    </select>
  </div>
  <div class="col-sm-3 col-3" style="padding-left:0px;">
    <span>mm</span>
  </div>
</div>

<!-- <div class="form-group row js-pailing-overlap-container with-spacing-overlap">
  <label for="length" class="col-sm-5 col-5">Paling Overlap</label>
  <div class="col-sm-4 col-4">
    <input type="text" name="pailing-overlap" class="xjs-pailing-overlap form-control form-control-sm">
  </div>
  <div class="col-sm-3 col-3" style="padding-left:0px;">
    <span>mm</span>
  </div>
</div> -->

<div class="form-group row not-wa-space-overlap-paling not-wa-js-pailing-spacing-overlap-container not-wa-js-with-spacing-overlap">
  <label for="length" class="col-sm-5 col-5">Gap / Overlap</label>
  <div class="col-sm-4 col-4">
    <select name="not-wa-spacing-gap" class="js-pailing-overlap with-spacing-overlap with-spacing-overlap not-wa-js-spacing-gap form-control form-control-sm" style="font-size:20px;">
      <option value="20">Gap (20mm)</option>
      <option value="0">No Gap (Butt Join)</option>
      <option value="25">Overlap (25mm)</option>
    </select>
  </div>
  <div class="col-sm-3 col-3" style="padding-left:0px;">
    <span>mm</span>
  </div>
</div>

<div class="form-group row wa-space-overlap-paling wa-js-pailing-spacing-overlap-container wa-js-with-spacing-overlap">
  <label for="length" class="col-sm-5 col-5">Gap / Overlap</label>
  <div class="col-sm-4 col-4">
    <select name="wa-spacing-gap" class="js-pailing-overlap with-spacing-overlap with-spacing-overlap wa-js-spacing-gap form-control form-control-sm" style="font-size:20px;">
      <option value="20">Gap (20mm)</option>
      <option value="0">No Gap (Butt Join)</option>
      <option value="38">Overlap (38mm)</option>
    </select>
  </div>
  <div class="col-sm-3 col-3" style="padding-left:0px;">
    <span>mm</span>
  </div>
</div>
