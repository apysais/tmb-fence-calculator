<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function set_title($post_id) {
    // If this is a revision, get real post ID
    if ( $parent_id = wp_is_post_revision( $post_id ) )
        $post_id = $parent_id;

    if(isset($_POST['post_type']) && $_POST['post_type'] == 'fence'){
      $title = '';

      //location
      //field_5dc6536848aad
      $location = '';
      if(isset($_POST['acf']['field_5dc6536848aad'])){
        $location_term_id = $_POST['acf']['field_5dc6536848aad'];
        $acf_location_id = get_term_by('id', $location_term_id, 'au-state');
        if($acf_location_id){
          $location = $acf_location_id->slug;
        }
      }

      //fence type
      //field_5dc6539748aae
      $fence_type = '';
      if(isset($_POST['acf']['field_5dc6539748aae'])){
        $fence_type_id = $_POST['acf']['field_5dc6539748aae'];
        $acf_fence_type_id = get_term_by('id', $fence_type_id, 'fence-type');
        if($acf_fence_type_id){
          $fence_type = $acf_fence_type_id->slug;
        }
        wp_set_post_terms( $post_id, $fence_type_id, 'fence-type' );
      }

      //board height
      //field_5dc6548b48aaf
      $board_height = '';
      if(isset($_POST['acf']['field_5dc6548b48aaf'])){
        $board_height = $_POST['acf']['field_5dc6548b48aaf'];
      }

      //timber species
      //field_5dc6558548ab0
      $timber_species = '';
      if(isset($_POST['acf']['field_5dc6558548ab0'])){
        $timber_species_term_id = $_POST['acf']['field_5dc6558548ab0'];
        $acf_timber_species_id = get_term_by('id', $timber_species_term_id, 'timber-species');
        if($acf_timber_species_id){
          $timber_species = $acf_timber_species_id->slug;
        }
      }

      //picket shape
      //field_5dc6559848ab1
      $picket_shape = '';
      if(isset($_POST['acf']['field_5dc6559848ab1'])){
        $picket_shape_id = $_POST['acf']['field_5dc6559848ab1'];
        $acf_picket_shape_id = get_term_by('id', $picket_shape_id, 'picket-shapes');
        if($acf_picket_shape_id){
          $picket_shape = $acf_picket_shape_id->slug;
        }
      }

      //board width
      //field_5dc65883ce9c9
      $board_width = '';
      if(isset($_POST['acf']['field_5dc65883ce9c9'])){
        $board_width = $_POST['acf']['field_5dc65883ce9c9'];
      }

      if($picket_shape == ''){
        $title = $location.'-'.$fence_type.'-'.$board_height.'-'.$timber_species.'-'.$board_width;
      }else{
        $title = $location.'-'.$fence_type.'-'.$board_height.'-'.$timber_species.'-'.$picket_shape.'-'.$board_width;
      }

      // unhook this function so it doesn't loop infinitely
      remove_action( 'save_post', 'set_title' );

      // $post_title = $_POST['post_title'];
      // if($post_title == ''){
      //   $post_title = $title;
      // }
      $post_title = $title;
      // update the post, which calls save_post again
      wp_update_post( array( 'ID' => $post_id, 'post_title' => $post_title ) );

      // re-hook this function
      add_action( 'save_post', 'set_title' );
    }

}
add_action( 'save_post', 'set_title' );
