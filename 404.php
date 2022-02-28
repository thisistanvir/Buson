<?php
get_header();
?>
<div class="content_area">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="content_wrapper error_content text-center">
               <h1><?php esc_html_e( '404', 'buson' )?></h1>
               <h3><?php esc_html_e( 'Page not found.', 'buson' );?></h3>
               <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'buson' );?></p>
               <a class="btn error_btn" href="<?php echo site_url(); ?>"><?php esc_html_e( 'Go Back to home', 'buson' );?></a>
            </div>
         </div>
      </div>
   </div>
</div>




<?php get_footer();?>