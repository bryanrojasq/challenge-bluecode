<div class="wrap">
	<h1>Custom Settings <small>/ <?php print get_admin_page_title(); ?></small></h1>
	
	<?php echo isset($data['title']) ? $data['title'] : ""; ?>

	<?php echo isset($data['description']) ? $data['description'] : ""; ?>

	<?php settings_errors('status_msg'); ?>

	<form method="POST" action="options.php">
		<?php 

		settings_fields( 'custom_main_settings' );
		                                        
		do_settings_sections( 'custom_main_settings' );

		submit_button();

		?>
	</form>

</div>

