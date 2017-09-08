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
define('DB_NAME', 'aventourblog');

/** MySQL database username */
define('DB_USER', 'aventourblog');

/** MySQL database password */
define('DB_PASSWORD', 'couvou123?');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ':8V4#Yy1v#K;h`C;2oMrg}J-=p>:fA%yVS-~c+mN-bUa=E@b_{r_DkWIdunowO%d');
define('SECURE_AUTH_KEY',  'Qm,#<A;oyX.5`fW?5Ge{OFGrj;A!i`c;Rk`]?[ @29~@37PD*Y@R$; SYo*f`7Q?');
define('LOGGED_IN_KEY',    'zuPBGpKyaEbOv}(!sAY!7(|DyY)/UV(m1BIeza+Zf_G2s|Tv8P%`m`8HS)S?~#<3');
define('NONCE_KEY',        'U,4MV97BoL%Aq.y;s@emYoFT!Ogfe?E|Aj4J~:8k,u)c,f[` ^Q&%+A*Vh1kL,S5');
define('AUTH_SALT',        '+0w{X;7Qc~Av=I<oT#jmt#C:T@l&56|/lEMXe0!|&T&?/T9qv7{]:3mJ#U5ue~gJ');
define('SECURE_AUTH_SALT', '@c$GnUYMu<cQ~w/yF8.{^d*&LIwsf$[5 _{f vbL-?:|BE? }lqtNxzw#:9UC j0');
define('LOGGED_IN_SALT',   'S& :=DsCmGV9FtDI0judA8n)N8%xTBdO1)UuQ&|<yt<S0sStcSDwf!mM(4W_^wu7');
define('NONCE_SALT',       '1=aDu*2|=55Zm,xxGIL},~gQj(nAv/R}ebj)tbhYt;~7M=7_z?j:3D7E7IvVU:x:');

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
