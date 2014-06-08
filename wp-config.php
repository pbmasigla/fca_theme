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

/** MySQL database username */

/** MySQL database password */

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
define('WPLANG', '');

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
define('FS_METHOD', 'direct');
define('AUTH_KEY',         'kof]fS|&X;&;F02;Q:o(B~f #B_|8PT^E%Dp8)/T +j+Je~?l!8tX%1sn-,,>VVm');
define('SECURE_AUTH_KEY',  'Y%H#R[=bcAXDzdlw:@Nff=B-:@YoU7cP{1NiK^<5Mr#h|VEr-V:x*_|X,M (`%5A');
define('LOGGED_IN_KEY',    '*e,bL8x1PLk9|VMZUf@2a+mfU-gjvC`Qpzj8|9L2OGzwt4MM4!![UKBtl}gb~Nzu');
define('NONCE_KEY',        'WJ2Q}(QPizQQ n^^]nT`8T}Dh46hz8g[O@|Y^=yKSlBuX0~U]N*(3|Ue>A7{{u+W');
define('AUTH_SALT',        'bX*Ug_v21nh:Nz|-0sj1KXmg#%t/Y>tUo~G<0fO!wsbLApfqe|>[H&lnCb-d;foi');
define('SECURE_AUTH_SALT', 'NbMB6y=((|tWY-3Rmf-h7|klL{6Th(k+-`qTJl$OVRGJ]5(Q}D!M3$f~~MQ} 8ow');
define('LOGGED_IN_SALT',   'P.RhO<S!7,-lP<>M`pJq9ZWPK}S[lu[GtIqFl}DMKMNwn?~%zi5G_L/K+9:*LR@p');
define('NONCE_SALT',       'T/IAOm;lhu1N!V@(CA_`0MM+U+!C .J7yehAqX+P/*00}3,R-+b;6OL{CN_]a5y)');
define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'yyOURRU6ip');
require_once(ABSPATH . 'wp-settings.php');
