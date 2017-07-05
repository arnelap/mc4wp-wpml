<?php
/*
Plugin Name: MailChimp for WordPress - WPML Integration
Plugin URI: https://mc4wp.com/#utm_source=wp-plugin&utm_medium=mailchimp-for-wp&utm_campaign=plugins-page
Description: Improved WPML integration for MailChimp for WordPress.
Version: 1.0
Author: ibericode
Author URI: https://ibericode.com/
Text Domain: mc4wp-wpml
Domain Path: /languages
License: GPL v3

MailChimp for WordPress - WPML Integration
Copyright (C) 2017, Danny van Kooten, hi@dannyvankooten.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

function _mc4wp_wpml_load() {

  // only load when MailChimp for WordPress is activated
  if( ! defined( 'MC4WP_VERSION' ) ) {
    return;
  }

  // only load when PHP >= 5.3
  if( version_compare( PHP_VERSION, '5.3', '<' ) ) {
    return;
  }

  // load functions & hooks
  require __DIR__ . '/includes/functions.php';
  require __DIR__ . '/includes/hooks.php';

  if( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
    require __DIR__ . '/includes/admin-functions.php';
    require __DIR__ . '/includes/admin-hooks.php';
  }
}

add_action( 'plugins_loaded', '_mc4wp_wpml_load', 20 );
