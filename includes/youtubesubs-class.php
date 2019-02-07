<?php
/**
 * Adds Foo_Widget widget.
 */
class yts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'yts_widget', // Base ID
			esc_html__( 'Youtube Subscribe', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Youtube Subscribe Widget', 'text_domain' ), ) // Args
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
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		echo '<div class="g-ytsubscribe" data-channel="'. $instance['channel'] .'" data-layout="'. $instance['layout'] .'" data-count="default"></div>';

		echo $args['after_widget'];
	}
// UC42Cy8wSEipXnsbV4Fjzh3w
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'Channel Name', 'text_domain' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'Choose layout', 'text_domain' );
		?>
		<p>
		<label
		 for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_attr_e( 'Title:', 'text_domain' ); ?>
		</label> 
		<input
		class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>


		<p>
		<label
		 for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
			<?php esc_attr_e( 'channel:', 'text_domain' ); ?>
		</label> 
		<input
		class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" type="text" value="<?php echo esc_attr( $channel ); ?>">
		</p>

		<p>
		<label
		 for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
			<?php esc_attr_e( 'layout:', 'text_domain' ); ?>
		</label> 
		<select
		class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" type="text" value="<?php echo esc_attr( $layout ); ?>">
		<option value="default" <?php echo( $layout=='default' ) ? 'Selected' : '' ?> >
			Default
		</option>
		<option value="full" <?php echo( $layout=='full' ) ? 'Selected' : '' ?> >
			Full
		</option>

	    </select>
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
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';

		return $instance;
	}

} // class Foo_Widget