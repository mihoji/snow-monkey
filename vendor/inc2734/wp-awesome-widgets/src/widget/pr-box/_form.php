<?php
/**
 * @package inc2734/wp-awesome-widgets
 * @author inc2734
 * @license GPL-2.0+
 */
?>

<div class="wpaw-pr-box-widget">
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			value="<?php echo esc_attr( $instance['title'] ); ?>"
		>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>"><?php esc_html_e( 'Lead', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<textarea
			name="<?php echo esc_attr( $this->get_field_name( 'lead' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'lead' ) ); ?>"
		><?php echo esc_textarea( $instance['lead'] ); ?></textarea>
	</p>

	<p class="wpaw-color-picker-field">
		<label for="<?php echo esc_attr( $this->get_field_id( 'bg-color' ) ); ?>"><?php esc_html_e( 'Background color', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			class="wpaw-color-picker-field__input"
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'bg-color' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'bg-color' ) ); ?>"
			value="<?php echo esc_attr( $instance['bg-color'] ); ?>"
		>
	</p>

	<div class="wpaw-repeaters">
		<div class="wpaw-repeaters__items">
			<?php
			$item_template = [
				'src'     => '',
				'title'   => '',
				'summary' => '',
			];
			array_unshift( $instance['items'], $item_template );
			?>

			<?php foreach ( $instance['items'] as $key => $item ) : $item = shortcode_atts( $item_template, $item ); ?>
				<div class="wpaw-repeaters__item">
					<div class="wpaw-thumbnail-field">
						<span class="wpaw-thumbnail-field__thumbnail">
							<?php echo wp_get_attachment_image( $item['src'], 'medium' ); ?>
						</span>
						<div class="wpaw-thumbnail-field__buttons">
							<button class="button wpaw-thumbnail-field__set-image-btn">
								<?php esc_html_e( 'Set image', 'inc2734-wp-awesome-widgets' ); ?>
							</button>
							<button class="button wpaw-thumbnail-field__unset-image-btn">
								<?php esc_html_e( 'Unset', 'inc2734-wp-awesome-widgets' ); ?>
							</button>
						</div>

						<input
							class="wpaw-thumbnail-field__input-image"
							type="hidden"
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][src]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][src]"
							value="<?php echo esc_attr( $item['src'] ); ?>"
						>
					</div>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"><?php esc_html_e( 'Title', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<input
							class="wpaw-pr-box-widget__input-title"
							type="text"
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][title]"
							value="<?php echo esc_attr( $item['title'] ); ?>"
						>
					</p>

					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"><?php esc_html_e( 'Summary', 'inc2734-wp-awesome-widgets' ); ?></label><br>
						<textarea
							class="wpaw-pr-box-widget__input-summary"
							name="<?php echo esc_attr( $this->get_field_name( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"
							id="<?php echo esc_attr( $this->get_field_id( 'items' ) ); ?>[<?php echo esc_attr( (int) $key ); ?>][summary]"
						><?php echo esc_textarea( $item['summary'] ); ?></textarea>
					</p>

					<div class="wpaw-repeaters__item-controls">
						<a class="button-link button-link-delete"><?php esc_html_e( 'Delete', 'inc2734-wp-awesome-widgets' ); ?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<button class="button wpaw-repeaters__add-repeater-btn">
			<?php esc_html_e( 'Add Item', 'inc2734-wp-awesome-widgets' ); ?>
		</button>
	</div>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail-size' ) ); ?>"><?php esc_html_e( 'Size of image to use', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'thumbnail-size' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'thumbnail-size' ) ); ?>"
		>
			<?php
			$thumbnail_sizes = get_intermediate_image_sizes();
			$thumbnail_sizes[] = 'full';
			$thumbnail_sizes = array_unique( $thumbnail_sizes );
			?>
			<?php foreach ( $thumbnail_sizes as $thumbnail_size ) : ?>
				<option value="<?php echo esc_attr( $thumbnail_size ); ?>" <?php selected( $thumbnail_size, $instance['thumbnail-size'], true ); ?>><?php echo esc_html( $thumbnail_size ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'thumbnail-aspect-ratio' ) ); ?>"><?php esc_html_e( 'Thumbnail aspect ratio', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'thumbnail-aspect-ratio' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'thumbnail-aspect-ratio' ) ); ?>"
		>
			<?php
			$aspect_ratios = [
				'4to3'  => '4:3',
				'16to9' => '16:9',
			];
			?>
			<?php foreach ( $aspect_ratios as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['thumbnail-aspect-ratio'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'sm-columns' ) ); ?>"><?php esc_html_e( 'Column size for mobile', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'sm-columns' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'sm-columns' ) ); ?>"
		>
			<?php
			$types = [
				'1' => __( '1 column', 'inc2734-wp-awesome-widgets' ),
				'2' => __( '2 columns', 'inc2734-wp-awesome-widgets' ),
				'3' => __( '3 columns', 'inc2734-wp-awesome-widgets' ),
				'4' => __( '4 columns', 'inc2734-wp-awesome-widgets' ),
				'5' => __( '5 columns', 'inc2734-wp-awesome-widgets' ),
			];
			?>
			<?php foreach ( $types as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['sm-columns'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'md-columns' ) ); ?>"><?php esc_html_e( 'Column size for tablet', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'md-columns' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'md-columns' ) ); ?>"
		>
			<?php
			$types = [
				'1' => __( '1 column', 'inc2734-wp-awesome-widgets' ),
				'2' => __( '2 columns', 'inc2734-wp-awesome-widgets' ),
				'3' => __( '3 columns', 'inc2734-wp-awesome-widgets' ),
				'4' => __( '4 columns', 'inc2734-wp-awesome-widgets' ),
				'5' => __( '5 columns', 'inc2734-wp-awesome-widgets' ),
			]
			?>
			<?php foreach ( $types as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['md-columns'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'md-columns' ) ); ?>"><?php esc_html_e( 'Column size for PC', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<select
			name="<?php echo esc_attr( $this->get_field_name( 'lg-columns' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'lg-columns' ) ); ?>"
		>
			<?php
			$types = [
				'1' => __( '1 column', 'inc2734-wp-awesome-widgets' ),
				'2' => __( '2 columns', 'inc2734-wp-awesome-widgets' ),
				'3' => __( '3 columns', 'inc2734-wp-awesome-widgets' ),
				'4' => __( '4 columns', 'inc2734-wp-awesome-widgets' ),
				'5' => __( '5 columns', 'inc2734-wp-awesome-widgets' ),
			]
			?>
			<?php foreach ( $types as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $instance['lg-columns'], true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'link-url' ) ); ?>"><?php esc_html_e( 'Link URL', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'link-url' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'link-url' ) ); ?>"
			value="<?php echo esc_attr( $instance['link-url'] ); ?>"
		>
	</p>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'link-text' ) ); ?>"><?php esc_html_e( 'Link text', 'inc2734-wp-awesome-widgets' ); ?></label><br>
		<input
			type="text"
			name="<?php echo esc_attr( $this->get_field_name( 'link-text' ) ); ?>"
			id="<?php echo esc_attr( $this->get_field_id( 'link-text' ) ); ?>"
			value="<?php echo esc_attr( $instance['link-text'] ); ?>"
		>
	</p>
</div>