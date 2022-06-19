<?php 

/**
 * Adds wp-tut widget.
 */
class WpTut_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wp_tut_widget', // Base ID
			esc_html__( 'Wordpress Tut', 'wptut_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to Consume API', 'wptut_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; // Display something before widget (<div>,etc)

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

        // Widget Content Output / need to display or hide label
		echo '
		<form method="post" action=".">
			<input type="hidden" id="twiliophonenumber" name="twiliophonenumber" value="'.$instance['twiliophonenumber'].'">
			<input type="hidden" id="myphonenumber" name="myphonenumber" value="'.$instance['myphonenumber'].'">
			<label for="message">Message (Character Limit: 200):</label>
			<input type="text" id="message" name="message" maxlength="200" required> <br>
			<input type="submit" name="form_submit">
		</form>';

		echo $args['after_widget']; // Display something after widget (</div>, etc)
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Wordpress Tut Test', 'wptut_domain' );
		$twiliophonenumber = ! empty( $instance['twiliophonenumber'] ) ? $instance['twiliophonenumber'] : esc_html__( 'Enter Twilio Phone Number Here', 'wptut_domain' );
		$myphonenumber = ! empty( $instance['myphonenumber'] ) ? $instance['myphonenumber'] : esc_html__( 'Enter Your Phone Number Here', 'wptut_domain' );
		?>


    <!---- TITLE --> 
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'wptut_domain' ); ?></label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!---- TWILIO PHONE NUMBER --> 
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twiliophonenumber' ) ); ?>"><?php esc_attr_e( 'Twilio Number:', 'wptut_domain' ); ?></label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'twiliophonenumber' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'twiliophonenumber' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $twiliophonenumber ); ?>">
		</p>



				<!---- MY PHONE NUMBER --> 
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'myphonenumber' ) ); ?>"><?php esc_attr_e( 'My Number:', 'wptut_domain' ); ?></label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'myphonenumber' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'myphonenumber' ) ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $myphonenumber ); ?>">
		</p>

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */

	 // Save Instances When Update/Save Is Clicked
	public function update( $new_instance, $old_instance ) {
        
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['twiliophonenumber'] = ( ! empty( $new_instance['twiliophonenumber'] ) ) ? sanitize_text_field( $new_instance['twiliophonenumber'] ) : '';
		$instance['myphonenumber'] = ( ! empty( $new_instance['myphonenumber'] ) ) ? sanitize_text_field( $new_instance['myphonenumber'] ) : '';

		return $instance;
	}

}

?>