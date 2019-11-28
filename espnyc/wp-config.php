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
define('DB_NAME', 'hairdeco_escort');

/** MySQL database username */
define('DB_USER', 'hairdeco_web');

/** MySQL database password */
define('DB_PASSWORD', 'missnice55255');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '-,C<.GEganLQXv$>(O+-JIp<cU[I6Bo&bkdhe$ZD^9bwJzcs&03lt0|[-TV&XUJl');
define('SECURE_AUTH_KEY',  '}%(*m>eCE7-L-D:iL,vG|CcF1wQmz7dDMO.{W|E*Jul#e G#yA9Un3:(A;gWoB|{');
define('LOGGED_IN_KEY',    '?2W+;]H*RW?uhhr12?zA8-:~{1=Ll|s[64D-nDPvUlVO55.*.+N%|xC%P-/qkgC#');
define('NONCE_KEY',        '%w)]C$~mOo[7b!9j6Mtg=4,PR,A}>)j,M&R&3~&Yuk*0+FfN*g?lALKG%F;EV[o=');
define('AUTH_SALT',        'lp7K7d3,Ie[tv**{Y*)8-^nj*=ynpS<kB2Z:hm`/-%{#d;-diI%ELvk$z+OA10*N');
define('SECURE_AUTH_SALT', '|]Fzr#[I/%7^hRdu~sxl8*GXsAIKHD-=o|E+{YubA>ORuO-m&={P}ROJ 3DH-{7y');
define('LOGGED_IN_SALT',   '?$.<aK^._LU,@=`z,Y2W3>;[r76>IxL1B&m5CrYJ+yL~1^>_$* ^+(<_-`D-1@I*');
define('NONCE_SALT',       'm LQk4]!3u4A3>1X:?P}hOp-Yd_tUOqEU^{)kvX23:Pdr1i|i+f]6s-OiwSlM4}P');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
