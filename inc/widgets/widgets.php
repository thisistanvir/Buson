<?php
require_once(__DIR__ . '/demo-widget.php');
require_once(__DIR__ . '/buson-search.php');


// Register and load the widget
function buson_custom_widget()
{
  register_widget('wpb_widget');
  register_widget('buson_search');
}
add_action('widgets_init', 'buson_custom_widget');
