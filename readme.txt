=== Simple Cache Killer ===
Contributors: jcummings1974
Donate link: https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=ud1KMFDaos3i-N3a6-LEQZrU9LBGJ-ObM6eY4LhHUz7cNKCLzSJyy_yZBMu&dispatch=5885d80a13c0db1f8e263663d3faee8d6cdb53fcfca2b5941339e576d7e42259
Author URI: http://www.jcummings.net
Plugin URI: http://wordpress.org/plugins/simple-cache-killer/
Tags: cache, caching, meta http-equiv, cache-control, pragma no-cache
Requires at least: 3.0.1
Tested up to: 4.0
Stable tag: /trunk/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows users to specify that requests to their content not be cached in any way, easily from within the Wordpress admin.

== Description ==

** For Multisite/Network Users ** 

I wrote this plugin because of several situations I've run in to running a multisite network where I'll want to include 
caching for Wordpress sites in most cases, but might need to exclude one of the sites on the network from that caching.

By activating this plugin and checking the different caching options, requests to that sites pages/posts can be instructed
not to cache site content without disrupting the caching strategy in place for other sites.

** For single site installations **

This plugin will still be useful for single site installations where the site administrator may not have access to the web server
to specify the types of HTTP caching headers that are returned on each request.  By allowing you to specify and rewrite the HTTP caching
headers at the site level, you'll no longer need access to the web server in order to make sure visitors are always served fresh
content.

**Bug Reports or Feature Requests**
https://trello.com/b/zLViVgjx

**Follow me on Twitter**
https://twitter.com/jcummings1974

== Installation ==

This plugin was built specifically for multisite networks, but should work on any Wordpress site.  The obvious benefit though, will be when you're hosting multiple Wordpress sites from a single installation/server and need to adjust the caching instructions sent by just one site.


1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Visit the `SCK Settings` section of your settings menu to set the types of instructions you want to use.

== Frequently Asked Questions ==

= What types of caching instructions does this plugin support? =

There are two `sections` of the settings screen, an HTML META tag section, and an HTTP Headers section. 
 
Once activated, you can choose to include the following instructions in your request responses:

1. META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE"
2. META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE"
3. Pragma: no-cache (HTTP header)
4. Cache-Conrol: no-cache, no-store, must-revalidate (HTTP header)
5. Expires: 0 (HTTP header)

= Which type should I use? =

The different caching options are provided individually in the event that you run in to problems with one
specific type of caching, but for the most predictable results, turn them all on.

== Upgrade Notice ==

== Screenshots ==

== Changelog ==

= 1.0.2 =
* Wordpress 4.0 Compatibility release

= 1.0.1 =

* Minor bug fixes.
* Improved instructions in the Wordpress admin.
* Inclusion of reference information outlining the different types of caching supported. 

= 1.0 =

* Initial release