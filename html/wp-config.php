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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'exampledb' );

/** Database username */
define( 'DB_USER', 'exampleuser' );

/** Database password */
define( 'DB_PASSWORD', 'examplepass' );

/** Database hostname */
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ':_epermk~]_o`kg-Jx&2A#N<6N]mTxP#;k6b3Q@vAkmxd9 )T@Ids?K&n}Q?Ya6g' );
define( 'SECURE_AUTH_KEY',   '7LAvTZ9lzQdl,Haw<hm.5#BN{#KS5~LkhB~5XM3 =<BdFsDYZTDtor]6f&^DjD4D' );
define( 'LOGGED_IN_KEY',     '[I2?W$9iO3T%go[FNF.P4>X:8F})|J!)wp3dqf&>adodjZNF~]J@6n@%>G.o}!5=' );
define( 'NONCE_KEY',         'yHy+5_}_gMD;&=Bu{3NiU<l}WcmKU!@D&73q8gVU=)N`[1`HpH]gT#h;~{}$WUi}' );
define( 'AUTH_SALT',         'o}d!ILzq_a/Ut-ZJN$>DVHdK11P4n2pm_`*Nf|7T;@]Ck`J!Mubo!i;Fd^tG%0yc' );
define( 'SECURE_AUTH_SALT',  'pgsIN}JSY?qaU[3j9P7Eqvpw(KnQ&oy[u{#Y)3Lb9t@~%36GpJg.&BR3*bA}*0eY' );
define( 'LOGGED_IN_SALT',    '7r`fdJmtJQ$%>E_=pltWi/*Mv07?:r^&d/r>}u/+ixl@9:=.,mDk9Aohf}IrR3;%' );
define( 'NONCE_SALT',        'Kb-KkA;G+@82Q(kTdl;]`<Y-N*IguT*I6SPIKly3o<2EMm#M2S;HbNF447YU1jd#' );
define( 'WP_CACHE_KEY_SALT', 't}&F:6?3D1WOh^*{d !9Yp1Oak(*&5f^F^<5ty[&x2~xq^Zw&5P/<w> 3f.+z* (' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
