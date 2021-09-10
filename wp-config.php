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

if (strstr($_SERVER['SERVER_NAME'], 'giles-county-fire-rescue.local')) {
	/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
} else {
	/** The name of the database for WordPress */
define( 'DB_NAME', 'thereeq1_GCFR' );

/** MySQL database username */
define( 'DB_USER', 'thereeq1_GCFR' );

/** MySQL database password */
define( 'DB_PASSWORD', 'appleknee87' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
}



/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xFWfzMsS1Wf0RqlqhBblDNld2MTA/NrukmZQiH6YC4/z8AMGoc0W3LBDhq4XlLqdJDRqCeH3WiL7+SKo/2gYmw==');
define('SECURE_AUTH_KEY',  'DtcJ15IuXBZkub4PQa6X7FeQXoGr9s/h0wix6ZHa+a21nJ0SZnb7mq/7l9SR9Sug0QZ1/7+bkfclqPSH+IjD3Q==');
define('LOGGED_IN_KEY',    'a+mj8eA3ucPoJIXu/Yzu4FApF6Tw8TDZ4KZ5MEzHLTDDa0eCu5DJ70IEQ4TZ1WiXtXq+n4rOJzmAvWvMyuI24A==');
define('NONCE_KEY',        'll/CmYYdai4fBRWmgHiHUMwYNe1V6PZLqpnsdfyhS3iXn16MqPoELFGm0sisOpxxFJB+FHUEB9wTJEgCHvKeEA==');
define('AUTH_SALT',        'ALaAQENmYYRjaYSfM9Fh1Bc8QkJhZMPetwXTSDeBVB7HHhEXA9NfQnmtvrKuejbHBZu7qZ820f4eJiaKjyAWNw==');
define('SECURE_AUTH_SALT', 'b+MUaNEIeqHJH5Y1sEUFQMbOalV6FWQ55zdYbPPXTuNtg57a65HDkHbpf1AfaYt3pcxEY1N144D4eQG9xs03+A==');
define('LOGGED_IN_SALT',   '8v9Te3pHkDyzM0hb6UVbDL1yg02lNJmtGcO2sxhTRFER22J7V3gV0LU56iKrICfzMigOJAeVklSN312BOleDkw==');
define('NONCE_SALT',       'N9k3LrMS+4UywSb/kOkGKf7kL9g/Vv+mkHDTR1gtBRq+RalM415mHLd9Vu7Eo/2s8HrwHG1VyTbdj0lVzOs3oA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
