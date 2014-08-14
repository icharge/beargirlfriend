<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'beargirlfriend');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1234');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't:6#`&Ou d6Qqc:ByZ=+5>|<#<F}ws_X`9%I?iF8#VCv|HnHw-f0|dIBB)jj9`a8');
define('SECURE_AUTH_KEY',  'F|Uy-!o-wD{uuzqqf+++C-=vO-f%xL})29Zkm.lMNQ9A-$2T%-tR6KhBe&o0N>+a');
define('LOGGED_IN_KEY',    '&-x>Q9DLl-lr5dC.xs4xn(DR4G-|1]Y4W`do[iZ)n*XdxdoeU>W1 F8|V]*K M^>');
define('NONCE_KEY',        'Jp|S)Z,fRCi:6+x^cAl~YZ(+nsi-WTf+<Y]-7W=++Yt+d4*^yFwr%*Hz mT9y!y_');
define('AUTH_SALT',        'LY+Uh@qi@Iu}b#Z.bPjWmB>T3pPP-Y%T|JQPIZSwl)^5XMq5*p6(3o$$KS:$(ivR');
define('SECURE_AUTH_SALT', 'uGx!nT8g?+ &b}Sl/tI<;c;xBVHSBY^d{7E~3e):3/y?~pBT9-1-:w<:Wx{|+[b#');
define('LOGGED_IN_SALT',   'rH$FxTI-r!$Z>:EN)N:H@p&Qk^w7s@}7_YaAOQu.VRHTf`;AVK$k;5qB.tFm14Yn');
define('NONCE_SALT',       '5G#M1z16!ep hb-x!6Knt~P)|{ST7>1dg1YO hf-Ll*p/$e`V-&nCqt=9X6i/+wk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'th');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
