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
define('DB_NAME', 'anya');

/** MySQL database username */
define('DB_USER', 'anya');

/** MySQL database password */
define('DB_PASSWORD', 'b4gl4dy');

/** MySQL hostname */
define('DB_HOST', 'beckton.telehouse.groovytrain.com');

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
define('AUTH_KEY',         ',~<HJ]{VP3Fl_6Yv<Gh7e`h[=lws#6y==}J|G9_@*nbQM}t6KXaF#S G,Gh.6:G9');
define('SECURE_AUTH_KEY',  '`UW42Uw!q{ba=v 7zt{BgjTQ.E@Dl*L4tK1]d_1Ifd<Jskrto%oIy!^Iyf>}*t~/');
define('LOGGED_IN_KEY',    'QF~K%(`U5ZYdA[XnEuhU o{<5Ne!B(~CI~HWL8q)`,[;k$NJPeR(j(RFgxW,~9GO');
define('NONCE_KEY',        'pU>Ry|Vc8Gm6;rlpl!7x`q>ato$eBLK*(u}iO=(tBG ^#6QQz|EXPI=-W}r%p2&o');
define('AUTH_SALT',        'g+nX#6Y,4GXt[h?O$k=Fqnb(kNLk.4s<IMg?FPB5-^=CCXe=9U+ECSj.w#4J`olU');
define('SECURE_AUTH_SALT', 'PkdzViqF@]96g*^GSNXz#6nLF2PN*%OC2!`)VUY72):LS]B-`<|FMzkmk1pJK-+ ');
define('LOGGED_IN_SALT',   'Xfze(^u))5@G^LP_-,si@d|4w5~4J,G{{Lnu{eXE$n=IXi+![f]&D:STV-RiWkV5');
define('NONCE_SALT',       'V(Ah6)RsIk+EAU[=Nza_6<C1NqlWcdanX:zmMvlOAhS;55a}83}kf=UO}{rP[;p0');

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
require_once(ABSPATH . 'wp-settings.php');
