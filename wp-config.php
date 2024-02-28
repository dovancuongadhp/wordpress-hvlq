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
define( 'DB_NAME', 'hvlq_wp' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', '1' );

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
define( 'AUTH_KEY',         'XomWP==_b,MN@l(^hCO3g{H]_pqed4t5hl9K2iYpnr+uP?N9d-bT,|z?<zab^Y;d' );
define( 'SECURE_AUTH_KEY',  'C>s_$]}apR}c,WF,*VioXDM_/|y2(-i`Rd|)Te5>}+9iRq)(&z`yNsN-p,!-Ly/<' );
define( 'LOGGED_IN_KEY',    'y39^SF0OBK&{QN8FtWs`dxti&b_WGq==B`+LqjH-E/xyy{@]<0hStYB>y3k6h,L^' );
define( 'NONCE_KEY',        '4(2J.Vs(SkF`L9 #n?0k,hR$z%$JQ07i+i/0j^9?P,tgP!ohS5oM=F^PVSpHXMiO' );
define( 'AUTH_SALT',        'uwK94#& Jha4  T5K]`gk6T>x;4Y0UCzPC.V>)]rN<MWa{fc+E!wZ)l>rNy&V$]V' );
define( 'SECURE_AUTH_SALT', '/}rdW+=v{cK&vW=x%U@%d|<QwHM[![8WP12-$3Ohp_7=3}N{pE|-{G$<vP]F{Ne?' );
define( 'LOGGED_IN_SALT',   'Vpa86uwhf%IOC/Yln9c8[{CEOi9O,2VE DwtC,Ap?D8Qa+Tqh@t9C:p@uTcg_bZW' );
define( 'NONCE_SALT',       'hrXSM~bO_j;(;:_:RDdN+*z/D09dh);;k0 #y=Sojx)_Vq=?~9{FwN-;L>1DllA;' );

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
