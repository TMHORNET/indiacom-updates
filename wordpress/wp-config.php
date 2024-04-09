<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Indiacom' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'Sanchit@123' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2-F#%]t14$fe!6qL2C$H v|B2S4,_8qr/t$5aaF.-~oZX;y2 9t#dkeQcA+Q`!oc' );
define( 'SECURE_AUTH_KEY',  ' (wA[|@a+n?&HSdRB-jM5X=^C0%zU]pux:u9>LtzS3N4hV9$+5(8o0ya$pALbK=v' );
define( 'LOGGED_IN_KEY',    '~g~Q{866+hvypmYB[*>IQeX>8U,mq?c}XO&0-xr`7&CgA0.~s=>)FkcUsOg_HM-B' );
define( 'NONCE_KEY',        'nucGHpyCj#Q#bzGM^M8[,;#pKv7eKfqL(l#@TX+HVE#3i<`B1Mdn#^6<4A$tpO%Q' );
define( 'AUTH_SALT',        'XY?|d1vKB3ZGM9(Uv6+~!yrWRalCi!N_m_XQ]E{n21NG1u>#V0sYs&,?!@ruv9@b' );
define( 'SECURE_AUTH_SALT', '2=Cs(xs8g<5~d^9m;HQCga(g)_7m~Uu)d)| !ystW5Sq9A%!RVk(={I-m*-.l(ak' );
define( 'LOGGED_IN_SALT',   'mJ|;S@oBGOke9:Kc=T-w5W4Y}t%P}wCP025qTBF2E.,?2leBt.woAjeEp2hWDcBr' );
define( 'NONCE_SALT',       '&hV~nf4mHoASOH>6`D Je(G~@9&R^QnUqx..vQf6rv8Vr8vY=0CQoK~-|)]ik%qP' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
