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
define('DB_NAME', 'hairdeco_shop');

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
define('AUTH_KEY',         'tP1;s8Mg8-f+yBs6{-[BX[dch8>_OlP#Gq+Bi(!K%:4]L929P&0+>W*7o(A3CZ{j');
define('SECURE_AUTH_KEY',  'KAV1E}>-9zk2,wIb&Pn^exj-&Vbo@|@<;hIdHON[Cx=S2V2DP B@PSa?gGeux|H:');
define('LOGGED_IN_KEY',    '<a2B6{65fF[V&*B!J3MKD2>ULH)+J);iudsFsu(Nn$f&Np(_-i.VLiI;KpbM?H`U');
define('NONCE_KEY',        'GYM@_nocEmN%XW_+Z,dSz<ndC6K+RV?-}mb46g9vg7f@j|R^uhjeHM-Z$ACb[;9+');
define('AUTH_SALT',        '9:!N-9|8EIT2@-@CVfR:XI/TL:cG>r+BYSFtH 5{z=H|FnVhBV#l1A8:HvY{4q,|');
define('SECURE_AUTH_SALT', 'J=AQ/,tct*AoB{5q-ANW[B,ph6h|!jo!- pT#J`?)wVF2X;h7;>f|?.U3`/_8%3|');
define('LOGGED_IN_SALT',   'O[&YnR<ZIXH(EP!jzg-|]uC[!^y9qK/% <cd;*gJxVl?wef+rq,d1{^|-|DMd+_/');
define('NONCE_SALT',       'o|da%aoM`<jBsBTtzAb/z>A|+9RWt;hqIE~c^<SaZD7<$YDP]xbu+?asK}9&FKm+');

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
