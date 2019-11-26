<div class="info-data">
  <div class="info-data-values">
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Timber Units</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext form-control form-control-sm calculate_timber_units">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Vertical Fence Post</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext  form-control form-control-sm calculate_vertical_fence_post">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Min height of vertical fence post</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext form-control form-control-sm  calculate_min_height_vertical_fence_post" >
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Timber Capping units</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext form-control form-control-sm  calculate_timber_capping_units">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Fixings Nails/Screws</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext form-control form-control-sm  calculate_fixings">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Overlapping Timber Units</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext form-control form-control-sm  calculate_overlapping_timber_units">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Horizontal Support Rails</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext form-control form-control-sm  calculate_horizontal_support">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label">Total Pailing/Pickets</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext form-control form-control-sm  calculate_total_picket_pailing">
      </div>
    </div>
  </div>
  <div class="submit-email-print form-group row">
    <label class="col-sm-4 col-form-label">Send To Email</label>
    <div class="col-sm-8 ">
      <?php TMB_AjaxSpinners::get_instance()->get('Sending to Email...');?>
      <div class="send-email-container">
        <input type="text" class="form-control form-control-sm send_to_email">
        <p></p>
        <p></p>
        <button class="btn btn-primary send_to_email_button">Send To Email</button>
        <button class="btn btn-primary print_button">Print</button>
      </div>
    </div>
  </div>
</div>
