<?php
/**
 * Retrieves and creates the wp-config.php file.
 *
 * The permissions for the base directory must allow for writing files in order
 * for the wp-config.php to be created using this page.
 *
 * @internal This file must be parsable by PHP4.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * We are installing.
 */
define('WP_INSTALLING', true);

/**
 * We are blissfully unaware of anything.
 */
define('WP_SETUP_CONFIG', true);

/**
 * Disable error reporting
 *
 * Set this to error_reporting( E_ALL ) or error_reporting( E_ALL | E_STRICT ) for debugging
 */
error_reporting(0);

/**#@+
 * These three defines are required to allow us to use require_wp_db() to load
 * the database class while being wp-content/db.php aware.
 * @ignore
 */
define('ABSPATH', dirname(dirname(__FILE__)).'/');
define('WPINC', 'wp-includes');
define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
define('WP_DEBUG', false);
/**#@-*/

require(ABSPATH . WPINC . '/load.php');
require(ABSPATH . WPINC . '/version.php');

// Check for the required PHP version and for the MySQL extension or a database drop-in.
wp_check_php_mysql_versions();

require_once(ABSPATH . WPINC . '/functions.php');

// Also loads plugin.php, l10n.php, pomo/mo.php (all required by setup-config.php)
wp_load_translations_early();

// Turn register_globals off.
wp_unregister_GLOBALS();

// Standardize $_SERVER variables across setups.
wp_fix_server_vars();

require_once(ABSPATH . WPINC . '/compat.php');
require_once(ABSPATH . WPINC . '/class-wp-error.php');
require_once(ABSPATH . WPINC . '/formatting.php');

// Add magic quotes and set up $_REQUEST ( $_GET + $_POST )
wp_magic_quotes();

// Support wp-config-sample.php one level up, for the develop repo.
if ( file_exists( ABSPATH . 'wp-config-sample.php' ) )
	$config_file = file( ABSPATH . 'wp-config-sample.php' );
elseif ( file_exists( dirname( ABSPATH ) . '/wp-config-sample.php' ) )
	$config_file = file( dirname( ABSPATH ) . '/wp-config-sample.php' );
else
	wp_die( __( 'Sorry, I need a wp-config-sample.php file to work from. Please re-upload this file from your WordPress installation.' ) );

// Check if wp-config.php has been created
if ( file_exists( ABSPATH . 'wp-config.php' ) )
	wp_die( '<p>' . sprintf( __( "The file 'wp-config.php' already exists. If you need to reset any of the configuration items in this file, please delete it first. You may try <a href='%s'>installing now</a>." ), 'install.php' ) . '</p>' );

// Check if wp-config.php exists above the root directory but is not part of another install
if ( file_exists(ABSPATH . '../wp-config.php' ) && ! file_exists( ABSPATH . '../wp-settings.php' ) )
	wp_die( '<p>' . sprintf( __( "The file 'wp-config.php' already exists one level above your WordPress installation. If you need to reset any of the configuration items in this file, please delete it first. You may try <a href='install.php'>installing now</a>."), 'install.php' ) . '</p>' );

$step = isset( $_GET['step'] ) ? (int) $_GET['step'] : 0;

/**
 * Display setup wp-config.php file header.
 *
 * @ignore
 * @since 2.3.0
 */
function setup_config_display_header() {
	global $wp_version;

	header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"<?php if ( is_rtl() ) echo ' dir="rtl"'; ?>>
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php _e( 'WordPress &rsaquo; Setup Configuration File' ); ?></title>
<link rel="stylesheet" href="css/install.css?ver=<?php echo preg_replace( '/[^0-9a-z\.-]/i', '', $wp_version ); ?>" type="text/css" />
<link rel="stylesheet" href="../wp-includes/css/buttons.css?ver=<?php echo preg_replace( '/[^0-9a-z\.-]/i', '', $wp_version ); ?>" type="text/css" />

</head>
<body class="wp-core-ui<?php if ( is_rtl() ) echo ' rtl'; ?>">
<h1 id="logo"><a href="<?php esc_attr_e( 'https://wordpress.org/' ); ?>"><?php _e( 'WordPress' ); ?></a></h1>
<?php
} // end function setup_config_display_header();

switch($step) {
	case 0:
		setup_config_display_header();
?>

<p><?php _e( 'ยินดีต้อนรับสู่เวิร์ดเพรส ก่อนที่จะเริ่ม  เราต้องการข้อมูลบางอย่างบนฐานข้อมูล คูณจะต้องมีข้อมูลต่อไปนี้ก่อนจะเริ่มทำการติดตั้ง' ) ?></p>
<ol>
	<li><?php _e( 'ชื่อฐานข้อมูล' ); ?></li>
	<li><?php _e( 'ชื่อผู้ใช้ฐานข้อมูล' ); ?></li>
	<li><?php _e( 'รหัสผ่านฐานข้อมูล' ); ?></li>
	<li><?php _e( 'โฮสท์ฐานข้อมูล' ); ?></li>
	<li><?php _e( 'คำนำหน้าตาราง (ถ้าคุณต้องการใช้งานเวิร์ดเพรสมากกว่าหนึ่งในฐานข้อมูลเดียวกัน)' ); ?></li>
</ol>
<p><strong><?php _e( "ถ้ามีเหตุผลใดที่ทำให้การสร้างไฟล์อัตโนมัติใช้งานไม่ได้  ไม่ต้องกังวล  สิ่งที่ต้องทำคือใส่ข้อมูลฐานข้อมูลลงในไฟล์ตั้งค่า  คุณอาจจะเปิดไฟล์ <code>wp-config-sample.php</code> ในโปรแกรมแก้ไขข้อความ(notepad หรือโปรแกรมอื่น ๆ)  ใส่ข้อมูลของคุณแล้วบันทึกเป็นไฟล์ชื่อ <code>wp-config.php</code>" ); ?></strong></p>
<p><?php _e( "โดยปกติแล้ว  ค่าต่าง ๆ นี้จะมีให้คุณโดยเว็บโฮสท์ของคุณ  ถ้าคุณไม่มีข้อมูลเหล่านี้  ให้คุณติดต่อโฮสท์ของคุณก่อนดำเนินการต่อ ถ้าคุณพร้อมแล้ว&hellip;" ); ?></p>

<p class="step"><a href="setup-config.php?step=1<?php if ( isset( $_GET['noapi'] ) ) echo '&amp;noapi'; ?>" class="button button-large"><?php _e( 'Let&#8217;s go!' ); ?></a></p>
<?php
	break;

	case 1:
		setup_config_display_header();
	?>
<form method="post" action="setup-config.php?step=2">
	<p><?php _e( "ก่อนที่คุณจะใส่ข้อมูลเชื่อมต่อฐานข้อมูลด้านล่าง  ถ้าคุณไม่แน่ใจ  กรุณาติดต่อโฮสท์ของคุณ" ); ?></p>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="dbname"><?php _e( 'ชื่อฐานข้อมูล' ); ?></label></th>
			<td><input name="dbname" id="dbname" type="text" size="25" value="wordpress" /></td>
			<td><?php _e( 'ชื่อฐานข้อมูลที่คุณต้องการใช้สำหรับการติดตั้งเวิร์ดเพรส' ); ?></td>
		</tr>
		<tr>
			<th scope="row"><label for="uname"><?php _e( 'ชื่อผู้ใช้' ); ?></label></th>
			<td><input name="uname" id="uname" type="text" size="25" value="<?php echo htmlspecialchars( _x( 'username', 'example username' ), ENT_QUOTES ); ?>" /></td>
			<td><?php _e( 'ชื่อผู้ใช้ MySQL ของคุณ' ); ?></td>
		</tr>
		<tr>
			<th scope="row"><label for="pwd"><?php _e( 'รหัสผ่าน' ); ?></label></th>
			<td><input name="pwd" id="pwd" type="text" size="25" value="<?php echo htmlspecialchars( _x( 'password', 'example password' ), ENT_QUOTES ); ?>" /></td>
			<td><?php _e( '&hellip;และรหัสผ่าน MySQL ของคุณ' ); ?></td>
		</tr>
		<tr>
			<th scope="row"><label for="dbhost"><?php _e( 'โฮสท์ฐานข้อมูล' ); ?></label></th>
			<td><input name="dbhost" id="dbhost" type="text" size="25" value="localhost" /></td>
			<td><?php _e( 'คุณควรจะได้ข้อมูลนี้จากโฮสท์ของคุณ  ถ้าคำว่า <code>localhost</code> ไม่สามารถใช้งานได้' ); ?></td>
		</tr>
		<tr>
			<th scope="row"><label for="prefix"><?php _e( 'คำนำหน้าตาราง' ); ?></label></th>
			<td><input name="prefix" id="prefix" type="text" value="wp_" size="25" /></td>
			<td><?php _e( 'ถ้าคุณต้องการติดตั้งเวิร์ดเพรสหลายที่บนฐานข้อมูลเดียว  โปรดเปลี่ยนคำนำหน้านี้' ); ?></td>
		</tr>
	</table>
	<?php if ( isset( $_GET['noapi'] ) ) { ?><input name="noapi" type="hidden" value="1" /><?php } ?>
	<p class="step"><input name="submit" type="submit" value="<?php echo htmlspecialchars( __( 'ติดตั้ง' ), ENT_QUOTES ); ?>" class="button button-large" /></p>
</form>
<?php
	break;

	case 2:
	foreach ( array( 'dbname', 'uname', 'pwd', 'dbhost', 'prefix' ) as $key )
		$$key = trim( wp_unslash( $_POST[ $key ] ) );

	$tryagain_link = '</p><p class="step"><a href="setup-config.php?step=1" onclick="javascript:history.go(-1);return false;" class="button button-large">' . __( 'ลองอีกครั้ง' ) . '</a>';

	if ( empty( $prefix ) )
		wp_die( __( '<strong>ผิดพลาด</strong>: "คำนำหน้าตาราง" ต้องไม่ว่างเปล่า' . $tryagain_link ) );

	// Validate $prefix: it can only contain letters, numbers and underscores.
	if ( preg_match( '|[^a-z0-9_]|i', $prefix ) )
		wp_die( __( '<strong>ผิดพลาด</strong>: "คำนำหน้าตาราง" ต้องเป็นตัวเลข ตัวอักษรและขีดเส้นใต้เท่านั้น' . $tryagain_link ) );

	// Test the db connection.
	/**#@+
	 * @ignore
	 */
	define('DB_NAME', $dbname);
	define('DB_USER', $uname);
	define('DB_PASSWORD', $pwd);
	define('DB_HOST', $dbhost);
	/**#@-*/

	// We'll fail here if the values are no good.
	require_wp_db();
	if ( ! empty( $wpdb->error ) )
		wp_die( $wpdb->error->get_error_message() . $tryagain_link );

	// Fetch or generate keys and salts.
	$no_api = isset( $_POST['noapi'] );
	if ( ! $no_api ) {
		require_once( ABSPATH . WPINC . '/class-http.php' );
		require_once( ABSPATH . WPINC . '/http.php' );
		/**#@+
		 * @ignore
		 */
		function get_bloginfo() {
			return wp_guess_url();
		}
		/**#@-*/
		$secret_keys = wp_remote_get( 'https://api.wordpress.org/secret-key/1.1/salt/' );
	}

	if ( $no_api || is_wp_error( $secret_keys ) ) {
		$secret_keys = array();
		require_once( ABSPATH . WPINC . '/pluggable.php' );
		for ( $i = 0; $i < 8; $i++ ) {
			$secret_keys[] = wp_generate_password( 64, true, true );
		}
	} else {
		$secret_keys = explode( "\n", wp_remote_retrieve_body( $secret_keys ) );
		foreach ( $secret_keys as $k => $v ) {
			$secret_keys[$k] = substr( $v, 28, 64 );
		}
	}

	$key = 0;
	// Not a PHP5-style by-reference foreach, as this file must be parseable by PHP4.
	foreach ( $config_file as $line_num => $line ) {
		if ( '$table_prefix  =' == substr( $line, 0, 16 ) ) {
			$config_file[ $line_num ] = '$table_prefix  = \'' . addcslashes( $prefix, "\\'" ) . "';\r\n";
			continue;
		}

		if ( ! preg_match( '/^define\(\'([A-Z_]+)\',([ ]+)/', $line, $match ) )
			continue;

		$constant = $match[1];
		$padding  = $match[2];

		switch ( $constant ) {
			case 'DB_NAME'     :
			case 'DB_USER'     :
			case 'DB_PASSWORD' :
			case 'DB_HOST'     :
				$config_file[ $line_num ] = "define('" . $constant . "'," . $padding . "'" . addcslashes( constant( $constant ), "\\'" ) . "');\r\n";
				break;
			case 'AUTH_KEY'         :
			case 'SECURE_AUTH_KEY'  :
			case 'LOGGED_IN_KEY'    :
			case 'NONCE_KEY'        :
			case 'AUTH_SALT'        :
			case 'SECURE_AUTH_SALT' :
			case 'LOGGED_IN_SALT'   :
			case 'NONCE_SALT'       :
				$config_file[ $line_num ] = "define('" . $constant . "'," . $padding . "'" . $secret_keys[$key++] . "');\r\n";
				break;
		}
	}
	unset( $line );

	if ( ! is_writable(ABSPATH) ) :
		setup_config_display_header();
?>
<p><?php _e( "ขอโทษด้วย  แต่เราไม่สามารถสร้างไฟล์ <code>wp-config.php</code>" ); ?></p>
<p><?php _e( 'คุณสามารถสร้างไฟล์ <code>wp-config.php</code> ด้วยตัวเองและใส่ข้อความเหล่านี้ลงในไฟล์' ); ?></p>
<textarea id="wp-config" cols="98" rows="15" class="code" readonly="readonly"><?php
		foreach( $config_file as $line ) {
			echo htmlentities($line, ENT_COMPAT, 'UTF-8');
		}
?></textarea>
<p><?php _e( 'หลังจากคุณทำเสร็จแล้ว  ให้กด &#8220;ทำการติดตั้ง&#8221;' ); ?></p>
<p class="step"><a href="install.php" class="button button-large"><?php _e( 'ทำการติดตั้ง' ); ?></a></p>
<script>
(function(){
var el=document.getElementById('wp-config');
el.focus();
el.select();
})();
</script>
<?php
	else :
		// If this file doesn't exist, then we are using the wp-config-sample.php
		// file one level up, which is for the develop repo.
		if ( file_exists( ABSPATH . 'wp-config-sample.php' ) )
			$path_to_wp_config = ABSPATH . 'wp-config.php';
		else
			$path_to_wp_config = dirname( ABSPATH ) . '/wp-config.php';

		$handle = fopen( $path_to_wp_config, 'w' );
		foreach( $config_file as $line ) {
			fwrite( $handle, $line );
		}
		fclose( $handle );
		chmod( $path_to_wp_config, 0666 );
		setup_config_display_header();
?>
<p><?php _e( "ทุกอย่างถูกต้องแล้ว  คุณผ่านขั้นตอนการติดตั้งนี้แล้ว  เวิร์ดเพรสสามารถเชื่อมกับฐานข้อมูลของคุณ  ถ้าคุณพร้อม  ก็ได้เวลา&hellip;" ); ?></p>

<p class="step"><a href="install.php" class="button button-large"><?php _e( 'ทำการติดตั้ง' ); ?></a></p>
<?php
	endif;
	break;
}
?>
</body>
</html>
