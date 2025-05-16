<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '*o+J},+*31c4g3ejUK $4h(S)a{|Ob2c~4:FNKbPE(! +kc+&t@mFh~f5kXu]!3P' );
define( 'SECURE_AUTH_KEY',  'ry.>09 Q>1C40RJCq:Tc{;3BD@Y7`R)isY% FkcG9_w)4)hGU36Mc*92EFoK*#1>' );
define( 'LOGGED_IN_KEY',    'R#^rzoAHsmac%37IxA^)WTLT5eFF?pN%VLbZ*?7WG<do#M}rj;mKdz51aKf14@sX' );
define( 'NONCE_KEY',        'u%@|;dJxQQA`&$rihDq7BEDd?ebnv@v~xH;J&`v%t@n6VU3A|E486$1{ul,;~YA@' );
define( 'AUTH_SALT',        '&o-Sy}V:{8NJ>D^hojBNPlFZ,J@N_<8K<hDyT$aKd. YrGW+Yo&AtnedNQ&Fzm:N' );
define( 'SECURE_AUTH_SALT', 'H9ivB &AgTwNfQwG>~,B;BW4kZ(~[P|2DG;w#]qXX=gY/|}F]GU75$*QEx3sz0X#' );
define( 'LOGGED_IN_SALT',   '{wC.@:Rq=H0:#..{!)eY2K}sB84#^]n6Kyoi*``<Zh9YxW?k&@]o^^#qR4Roja!P' );
define( 'NONCE_SALT',       't(#`DM%L,|2RB:!D,Sisc!/#}]a>&&y$Ehfg,.Z5@-@_sl]U4^kZ},h-HIuQB`I,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define('DISALLOW_FILE_EDIT', false);

/* Add any custom values between this line and the "stop editing" line. */




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
