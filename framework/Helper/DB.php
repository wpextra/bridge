<?php

namespace Bridge\Helper;


if (!defined('ABSPATH'))
	exit;


class DB {

	#https://developer.wordpress.org/reference/functions/maybe_create_table/
	static public function table_exists($table_name) {
		
		global $wpdb;
		$table_name = $wpdb->prefix . $table_name;
		$query = $wpdb->prepare( "SHOW TABLES LIKE %s", $wpdb->esc_like( $table_name ) );

		if ( $wpdb->get_var( $query ) == $table_name ) {
			return true;
		}
		return false;
	}

	
	static public function create_table($table_name, $schema, $force = false) {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . $table_name;

		if(!self::table_exists($table_name)) {
			$sql = "CREATE TABLE $table_name ($schema) $charset_collate;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			$success = empty($wpdb->last_error);
			return $success;
		}
	}


	static public function update_table() {

	}

	static public function delete_table() {

	}

	static public function export_table() {

	}

	static public function import_table() {

	}

}