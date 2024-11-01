<?php
add_action('admin_init', 'sck_options_init' );
add_action('admin_menu', 'sck_options_add_page');
function sck_options_init(){
    register_setting( 'sck_options', 'sck', 'sck_validate' );
}

function sck_options_add_page() {
	add_options_page('Simple Cache Killer Options', 'SCK Options', 'manage_options', 'sck', 'sck_options_do_page');
}

function sck_validate($input){
	$input['meta_cache_control']= $input['meta_cache_control'];
	$input['pragma_cache_control']= $input['pragma_cache_control'];
	$input['cache_must_revalidate']= $input['cache_must_revalidate'];
	$input['send_pragma_nocache']= $input['send_pragma_nocache'];
	$input['send_cache_expires']= $input['send_cache_expires'];
	
	return $input;
}

function sck_options_do_page(){
	?>
	<div class="wrap">
        <h2>Simple Cache Killer</h2>
        <form method="post" action="options.php">
            <?php settings_fields('sck_options'); ?>
            <?php $options = get_option('sck'); ?>
            <hr>
            <h3>HTML Meta tag caching</h3>
            <small>Check the box beside the type of caching instructions you'd like to send with each request</small><br><br>
            <small>You can control each type of caching instruction individually, but if you want to make certain that your pages aren't cached,<br> checking each of the options below is best, as it covers the widest range of caching scenarios.</small><br><br>
            <table class="form-table">
                <tr valign="top"><th scope="row">CACHE-CONTROL CONTENT="NO-CACHE"</th>
                    <td><input name="sck[meta_cache_control]" type="checkbox" value="1" <?php checked('1', $options['meta_cache_control']); ?> /></td><td><small><em>What does this do?</em><br>This meta tag is used specifically by IE to tell the browser<br> that this content may not be cached. 
                     <a href="http://www.metatags.org/meta_http_equiv_cache_control" target="_blank">More info</a></small>
</td>
                </tr>
                <tr valign="top"><th scope="row">PRAGMA CONTENT="NO-CACHE"</th>
                    <td><input name="sck[pragma_cache_control]" type="checkbox" value="1" <?php checked('1', $options['pragma_cache_control']); ?> /></td><td><small><em>What does this do?</em><br>The same as CACHE-CONTROL CONTENT="NO-CACHE",<br> provided for backwards compatibility with HTTP/1.0.</small></td>
                </tr>
            </table>
            <hr>
            <h3>HTTP Header Instructions</h3>   
            <table class="form-table">
                <tr valign="top"><th scope="row">no-cache, no-store, must-revalidate</th>
                    <td><input name="sck[cache_must_revalidate]" type="checkbox" value="1" <?php checked('1', $options['cache_must_revalidate']); ?> /></td><td><small><em>What does this do?</em><br>An HTTP header that tells even caches configured<br> to explicitly serve stale content that they must get a new copy.  
                     <a href="http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.9.1" target="_blank">More info</a></small>
                </tr>
                <tr valign="top"><th scope="row">Pragma: no-cache</th>
                    <td><input name="sck[send_pragma_nocache]" type="checkbox" value="1" <?php checked('1', $options['send_pragma_nocache']); ?> /></td><td><small><em>What does this do?</em><br>The same no-cache, no-store, must-revalidate above,<br> provided for backwards compatibility with HTTP/1.0.</small></td>
                </tr>
                <tr valign="top"><th scope="row">Expires: 0</th>
                	<td><input name="sck[send_cache_expires]" type="checkbox" value="1" <?php checked('1', $options['send_cache_expires']); ?> /></td><td><small><em>What does this do?</em><br>An HTTP header that tells clients that,<br> immediately after being served the content<br> should be considered stale<br> forcing a new request.  <a href="http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.21" target="_blank">More info</a></small></td>
            </table>     
            <hr>       
            <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
    </div>
<?php	
}
?>