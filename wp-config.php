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
define( 'DB_NAME', 'ti_summit' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'B34W*Z;vm+YA?,fdEX`tf-u/,gSQehbv<HIx3.%=;m3))CGpbUu``ro0[nPH_6.@' );
define( 'SECURE_AUTH_KEY',  'jMbdHh:;HS.Y;Z0L@*82!X_G@Rl,*P2:+j8vbw@Tvb[L`f%^`n{[M7^<W+sz:`TN' );
define( 'LOGGED_IN_KEY',    'Jdk1vn-,5H3zvJ`AcvQ5#x~b)iZOwJgUBCcQT{SuDSuy`7l1+d-4@|7+3(>. s*,' );
define( 'NONCE_KEY',        're~S^dU[IpiN|,,z!5cDv3WEeW&`KZ.TL=KI =wJ>PTI? iD]Ec;<YjmEf`^(lE,' );
define( 'AUTH_SALT',        'pjLr?GBU#|dE1De8{/.8IMu;sci~ xYBGY4Y=Bt&Nf`Q*:haJ7>SM4te$fLWD~V^' );
define( 'SECURE_AUTH_SALT', '/kM__cD|zE+F%)mTs/{[e^M1 he4ajXk8hEx9tt !-*UkZw+B19D??Tsau?3H:S>' );
define( 'LOGGED_IN_SALT',   '^<:p,d8/AK<*~><IJQn5c((RxI[6c>]],dnm[@8AxJ69<i0_g^n}_}_kjDzT3V<l' );
define( 'NONCE_SALT',       'Tq9~PfUp_:V91>IP( `I-U?Y|A%#N`QF7x8s?w>V%96+K7JO5iScQF<wnVt-@]N0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tis_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
