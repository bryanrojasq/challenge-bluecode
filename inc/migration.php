<?php

function migration_install() {
	
	global $wpdb;
	
	global $migration_date;

	$table_name = $wpdb->prefix . 'point_of_service';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		text text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	dbDelta( $sql );

	add_option( 'migration_unique_date', $migration_date );
}

function migration_seed() {
	
	global $wpdb;
	
	$welcome_name = 'Brian Brain';
	
	$welcome_text = 'Congratulations, you just completed the installation!';
	
	$table_name = $wpdb->prefix . 'point_of_service';
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'time' => current_time( 'mysql' ), 
			'name' => $welcome_name, 
			'text' => $welcome_text, 
		) 
	);
}


register_activation_hook( __FILE__, 'migration_install' );
register_activation_hook( __FILE__, 'migration_seed' );



add_action( 'plugins_loaded', function() {
    
    global $migration_date;
    
    if ( get_option( 'migration_date' ) != $migration_date ) {
        migration_install();
    }
});


register_uninstall_hook(__FILE__, function() {
    
    global $wpdb;

    $table_name = $wpdb->prefix . 'point_of_service';

    $sql = "DROP TABLE IF EXISTS $table_name";

    $wpdb->query($sql);

    delete_option('jal_db_version');
});




