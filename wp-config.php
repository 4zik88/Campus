<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'campusm_exlibrisgroup_co_3');

/** MySQL database username */
define('DB_USER', '3r3z2et6');

/** MySQL database password */
define('DB_PASSWORD', 'TSwmsrGJ');

/** MySQL hostname */
define('DB_HOST', 'mysql.campusm.exlibrisgroup.com');

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
define('AUTH_KEY',         'vb)y4G+pz^0""5KEI&z`9mO_Mo%n:Y@UI&_SUh3uO9*Wq"N*m8*O`3d)iwxL3LBa');
define('SECURE_AUTH_KEY',  '$x2h%Yg7#bRPG|x%T^@7:~#7fZfxFp$yTl&r#~VTGYL0Tq;oK^"$:Ut*l;Tbhzz4');
define('LOGGED_IN_KEY',    'ySwi$5:@ncOc!6Ik*_nCdej`@TUas`ILP|"|qEiCVF?5V!QG*QG4*zAv3WgNRq4s');
define('NONCE_KEY',        'NrGOk!:yi?s78;bGx5_CMG"NY8dV_ylTQ1gFy4mJBFC3h7K$b;q@(zZ/k@QjUKW6');
define('AUTH_SALT',        '7YkupleF$hwpFfW$vfi/L6@~7vNkxj2oaNr8J!1(kvI6;!No9%OtrV9T&s+/hR^9');
define('SECURE_AUTH_SALT', ')4B+RRK+Q|dwDyf;*W2uBfAE&RgemI|q+C4RDc|+t"SeNVW|$F6kv*VkKDjq$qBX');
define('LOGGED_IN_SALT',   'I752Mnhjv+Lx~0iqfMoTZTvtM*fkZBR/;jG/mA/S~brY(1"*b+hr$A:DhX+DB1!z');
define('NONCE_SALT',       '2A%pTEz^j8b"2IJd5)v%v6?G0:wEeiRHevdwb6sT~f;T&NRF2G2D|t&#i^_+e!ih');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_63avey_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
        define('JETPACK_STAGING_MODE', true);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
