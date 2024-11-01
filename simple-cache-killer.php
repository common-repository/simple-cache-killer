<?php
/**
 * Plugin Name: Simple Cache Killer
 * Plugin URI: http://www.jcummings.net
 * Description: A simple plugin to allow individual Wordpress sites to disable browser-side caching, and pass Cache-Control and Pragma: no-cache headers back.
 * Version: 1.0.2
 * Author: John Cummings
 * Author URI: http://www.jcummings.net
 * License: GPL2
 *
 /*  Copyright 2014 John Cummings  (email : john@jcummings.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
include 'sck-options.php';
function stop_the_cache_madness(){
	$options = get_option('sck');
	
	if($options['meta_cache_control'] == "1"){?>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<?php } ?>
	<?php if ($options['pragma_cache_control'] == "1"){?>
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<?php } 
	if ($options['cache_must_revalidate'] == "1"){
	header('Cache-Control: no-cache, no-store, must-revalidate');
	} // HTTP 1.1.
	if ($options['send_pragma_nocache'] == "1"){
	header('Pragma: no-cache');
	} // HTTP 1.0.
	if ($options['send_cache_expires'] == "1"){
	header('Expires: 0');
	} // Proxies.
	//nocache_headers();
}
add_filter( 'wp_head' , 'stop_the_cache_madness' );
?>