<?php
/**
 * The base configuration for WordPress
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 */

define( 'DB_NAME', 'unused' );
define( 'DB_USER', 'unused' );
define( 'DB_PASSWORD', 'unused' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 */
define( 'AUTH_KEY',         'b,A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH0#j{D:u7E]h%2p$g@x1q&M[r^T*k_e#z' );
define( 'SECURE_AUTH_KEY',  'c+d_K5#E@x!p1yL:u$z*m]J2^h&q8wS:lS_A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH' );
define( 'LOGGED_IN_KEY',    'f,Q&M[r^T*k_e#z-A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH0#j{D:u7E]h%2p$g@x1' );
define( 'NONCE_KEY',        'h+d_K5#E@x!p1yL:u$z*m]J2^h&q8wS:lS_A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH' );
define( 'AUTH_SALT',        'j,A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH0#j{D:u7E]h%2p$g@x1q&M[r^T*k_e#z' );
define( 'SECURE_AUTH_SALT', 'k+d_K5#E@x!p1yL:u$z*m]J2^h&q8wS:lS_A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH' );
define( 'LOGGED_IN_SALT',   'l,Q&M[r^T*k_e#z-A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH0#j{D:u7E]h%2p$g@x1' );
define( 'NONCE_SALT',       'n+d_K5#E@x!p1yL:u$z*m]J2^h&q8wS:lS_A(]9s&Yc.O/W^s?lS2!K5R/yL|6vH' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

// Explicitly define SQLite DB constants
define( 'DB_DIR', __DIR__ . '/wp-content/database' );
define( 'DB_FILE', '.ht.sqlite' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
