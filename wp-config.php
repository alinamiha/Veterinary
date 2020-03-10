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
define('DB_NAME', 'maxpv_veterinary');

/** MySQL database username */
define('DB_USER', 'maxpv_veterinary');

/** MySQL database password */
define('DB_PASSWORD', 'V9t)K^p6c6');

/** MySQL hostname */
define('DB_HOST', 'maxpv.mysql.tools');

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
define('AUTH_KEY',         '4VOZO^NYovS11oWiupz4f*3KMDHLJ^J!wRs3y6NNXO8@O@uwTPKL&D2lWrWtMNKb');
define('SECURE_AUTH_KEY',  'kqQOg!4!C47L)Bc*q83qy^&o7g0(KQ7sCX^a81A1NdM#TJI8RXxH#KpUWC#WtB32');
define('LOGGED_IN_KEY',    'raV0pA2*0iekHpNpQ&^dOW^zUPXbpht#jIZZwR#6g5KnqQ^v3fr6sclt433F^ClD');
define('NONCE_KEY',        'h*LPqY3yFpQk6lKGb*WoKs^0E0Rt5M%p4Wwjl)NIMmaGS9ZqlTN5L##nUxKxFIsl');
define('AUTH_SALT',        '0N&ErnwJ1)gHXfqMUUE8R(Uiab(&GW7W0zPM2w(oq1(Z6#M*u3V0fyzh2*qlHOh0');
define('SECURE_AUTH_SALT', 'LtlV(OE8urn!y2C8CE@JW@kXQOwMjIU#H@AGtj1yVf5F&9SMmE8Q1OUkcyHQz97R');
define('LOGGED_IN_SALT',   'N*)6%0brA7YzbK13F#p0(hUweowoL(sAv3!4#dyTc)RlN%sF9mrSV3E#CgGrzqWA');
define('NONCE_SALT',       'BuHD3cD!&eq3zYZr%z41hcsVZFBzd8THQrKuChY#ICpc&t!r1oQt@YQoxFeWKUHI');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
