<?php  
    /* 
    Plugin Name: Partie Privée AMB 
    Plugin URI:  
    Description:  
    Author:  
    Version: 0.1 
    Author URI: 
    */  

class MyWidget extends WP_Widget {
  function MyWidget() {
    parent::WP_Widget( false, $name = 'My Widget' );
  }

  function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    ?>

    <?php
	echo $before_widget;
    ?>

    <?php
      if ($title) {
	echo $before_title . $title . $after_title;
      }
    ?>

    <?php
    echo file_get_contents( "/Applications/XAMPP/xamppfiles/htdocs/wordpress/wp-content/plugins/partie-privee/login.html" );
    ?>

     <?php
       echo $after_widget;
     ?>
     
     <?php
  }

  function update( $new_instance, $old_instance ) {
    return $new_instance;
  }

  function form( $instance ) {
    $title = esc_attr( $instance['title'] );
    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
      </label>
    </p>
    <?php
  }
}

add_action( 'widgets_init', 'MyWidgetInit' );
function MyWidgetInit() {
  register_widget( 'MyWidget' );
}

?>

