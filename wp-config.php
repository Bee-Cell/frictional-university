<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_frictional_university');

/** MySQL database username */
define('DB_USER', 'xplosion_72');

/** MySQL database password */
define('DB_PASSWORD', '0YnNvpn8yroXZwsX');

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
define('AUTH_KEY',         'R7 x3*z<+XEO{XT=843--w| k+w1aIz+;y8c}?xS+W:^fmJ!~Xnq(,z1E8P&$(oc');
define('SECURE_AUTH_KEY',  'RX2UT}>&Vmj]NvpEQl=UUdx@_#FV@#7|2_:*/FvT*:HZhE3f#X!,s%u5z.}}06%e');
define('LOGGED_IN_KEY',    'hEHh?N Wg8K_$6:G-UmrP^odTs@fvgmc>F!T]vW~v!15@Z<UN^bC`+>LU8n/*F%@');
define('NONCE_KEY',        'wmElAJmN*1d+G1+/h04GUE4C|_,BJ@eofw3cs7sC.yqc_>y*hARB/NudM tFtC6{');
define('AUTH_SALT',        's3u_feIX!D.U+)ZApYGX]KIEy+moBN?!oN3afi%_?#}L-26RR{X{g3r^M`$Fz-W^');
define('SECURE_AUTH_SALT', '#9#=+I}/C_!F|X_R2(A^obYFR82Z:W+|%^4(kk;|}Xe#Ch]?Y^!kij(0mq|cy4BI');
define('LOGGED_IN_SALT',   'W+Z3=SM/3M9hy#`:_7f+Ka8!cOH6`:@,)^>-|adk+n#yz|aQ;F3),7~O9AI/+r+&');
define('NONCE_SALT',       'VRlpl^- 3+-7g#2i/(2#/bQ9[SGmT{V}Nm.`y~DhC!C5>WK=4EVQ ffZEDZH&1Mr');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dbs';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
