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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio_db' );

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
define( 'AUTH_KEY',         'bzf8!}[_3gV<c2sc4wIAf~e|(rD><,AlwO6D0T&}]n5X*${y?3x)[C!IF a)H%9}' );
define( 'SECURE_AUTH_KEY',  'I-=PZfMAW/%#&zKgl N5woOcp]@=iD?Z%q,W:p3(q6gbr`@NPCFZG%*; uVb>N%W' );
define( 'LOGGED_IN_KEY',    '`-|XWF(v0zf~ vbEg%M.ftu40T@9(f,RvRwTVTfr8|8$qT?pGoaEal!#/P=oe/Gf' );
define( 'NONCE_KEY',        'X0/?DSi%4`YKQ&TEkReh<tYz8^}{ILpF{4t-zEcC$%3?V/XwS]FgL)ywPrWV.4GK' );
define( 'AUTH_SALT',        'K^Zfqy==d[b][RTWqcaMPzAs!VKIh2{(%[if>`+G%%hw}, C?+QRur$YI7]<G&;~' );
define( 'SECURE_AUTH_SALT', 'TU5x4gRu}0h_a2.8|&D{.@~)e]{ |w@.e?*cl k},.}c0q7@<k+9@]+E2kjgEtAs' );
define( 'LOGGED_IN_SALT',   '.&R=OZVce!;=dWD1cI%mg)6Qc(`DXl_l9e&WF2Q-TLN3>;X}VC,~Zgi*LP{[JcDA' );
define( 'NONCE_SALT',       '%YfYbzlgNIT]4dlf1*YQNd}ds<@o];GKWjuvkzGh7+%A! `uOo,Gk!LQWW9 S+:6' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
