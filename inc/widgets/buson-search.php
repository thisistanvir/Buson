<?php
// Creating the widget 
class buson_search extends WP_Widget
{

  function __construct()
  {
    parent::__construct(

      // Base ID of your widget
      'buson_search',

      // Widget name will appear in UI
      __('Buson Search', 'buson'),

      // Widget description
      array('description' => __('Simple buson search', 'buson'),)
    );
  }

  // Creating widget front-end
  public function widget($args, $instance)
  {
    // $title = apply_filters('widget_title', $instance['title']);

    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    // if (!empty($title))
    //   echo $args['before_title'] . $title . $args['after_title'];

    // This is where you run the code and display the output
    // echo '<div class="textwidget">';

    // echo esc_html__($instance['text'], 'text_domain');

    // echo '</div>';

    echo '<div class="search_widget">
            <form action="#">
              <div class="form-group">
                  <div class="input-group mb-3">
    <input type="search" class="form-control" placeholder="' . $instance['text'] . '">
    </div>
              </div>
              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                  type="submit">' . $instance['search_text'] . '</button>
          </form>
        </div>';

    echo $args['after_widget'];
  }

  // Widget Backend 
  public function form($instance)
  {
    $text = !empty($instance['text']) ? $instance['text'] : 'Search';
    $search_text = !empty($instance['search_text']) ? $instance['search_text'] : 'search';
    // Widget admin form
?>
    <p>
      <input type="search" name="<?php echo esc_attr($this->get_field_name('text')) ?>" id="<?php echo esc_attr($this->get_field_id('text')); ?>" placeholder="<?php echo esc_attr($text) ?>">
      <input type="text" value="<?php echo esc_attr($search_text); ?>">
    </p>
<?php
  }

  // Updating widget replacing old instances with new
  public function update($new_instance, $old_instance)
  {
    $instance = array();

    $instance['text'] = (!empty($new_instance['text'])) ? strip_tags($new_instance['text']) : '';
    $instance['search_text'] = (!empty($new_instance['search_text'])) ? $new_instance['search_text'] : '';
    return $instance;
  }

  // Class wpb_widget ends here
}
