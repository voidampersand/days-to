<?php
/*
 * Plugin Name:       Days To
 * Plugin URI:        https://github.com/voidampersand/days-to
 * Description:       The simplest possible plugin to compute the days to a specified date.
 * Example:           [days-to date='2023-07-20T08:00:00-05']
 * Version:           1.0
 * Author:            voidampersand
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

function voidampersand_days_to_shortcode($atts) {
	$a = shortcode_atts(array('date' => '2023-07-19'), $atts);
	$when = new DateTimeImmutable($a['date']);
	$now = new DateTimeImmutable();
 	$interval = $now->diff($when);
	return $interval->format('%r%a');
}

function voidampersand_days_to_init() {
	add_shortcode('days-to', 'voidampersand_days_to_shortcode');
}

add_action('init', 'voidampersand_days_to_init');
?>
