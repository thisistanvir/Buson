<?php
// Creating the widget 
class wpb_widget extends WP_Widget
{

  function __construct()
  {
    parent::__construct(

      // Base ID of your widget
      'wpb_widget',

      // Widget name will appear in UI
      __('WPBeginner Widget', 'wpb_widget_domain'),

      // Widget description
      array('description' => __('Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain'),)
    );
  }

  // Creating widget front-end
  public function widget($args, $instance)
  {
    $title = apply_filters('widget_title', $instance['title']);

    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if (!empty($title))
      echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    echo '<div class="textwidget">';

    echo esc_html__($instance['text'], 'text_domain');

    echo '</div>';
    echo $args['after_widget'];
  }

  // Widget Backend 
  public function form($instance)
  {
    $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'text_domain');
    $text = !empty($instance['text']) ? $instance['text'] : esc_html__('', 'text_domain');
    // Widget admin form
?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'text_domain'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('Text')); ?>"><?php echo esc_html__('Text:', 'text_domain'); ?></label>
      <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" cols="30" rows="10"><?php echo esc_attr($text); ?></textarea>
    </p>
<?php
  }

  // Updating widget replacing old instances with new
  public function update($new_instance, $old_instance)
  {
    $instance = array();

    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';
    return $instance;
  }

  // Class wpb_widget ends here
}
