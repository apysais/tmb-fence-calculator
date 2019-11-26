<?php
function get_page_builder_acf()
{
  $pg_builder = new TMB_Page_Builder;
  $pg_builder->getFieldsRepeat();
}

function tmb_get_img_placeholder() {
  $dir_url = tmb_get_plugin_dir_url();
  $place_holder_path = '/assets/images/placeholder.png';
  $full_path = $dir_url . $place_holder_path;
  return $full_path;
}

function tmb_get_tax_acf_img($image_url = '') {
  if($image_url == ''){
    return tmb_get_img_placeholder();
  }else{
    return $image_url;
  }
}

function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '03bb6f02053c14';
  $phpmailer->Password = 'b34291b889be14';
}

//add_action('phpmailer_init', 'mailtrap');
