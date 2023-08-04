<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'by?5id0MU&|`Sl192QdA~[Ou*#w<+!H1H@3P4gUE_3u2`),6ys^t>+fWy^h.}-Bk' );
define( 'SECURE_AUTH_KEY',  'GM]hL>UKbAEYbWtx(6yF`!DAl843*s^ncG7oll)]wlQ3XS3`=:K=2V%d5U~1^TqE' );
define( 'LOGGED_IN_KEY',    'uy:kP]#$z7%em:;K6f}~<tl@jDG1i~5]Xt|(-a`Q,y57 ~pu]4AJTQcFkDP8^T|c' );
define( 'NONCE_KEY',        'rBs-!==RyKl4P XE^*v~=R(=vO$t;G8VW`9Z.Vm;.it</~mmlU=:.MKTTMEVq7f^' );
define( 'AUTH_SALT',        'kUo.8IdYweru2LoS~Yq-XmnSm{P,@( ?s-OG.nMYyi!8>}}<$H!Z*Ge|>@8gD.Gk' );
define( 'SECURE_AUTH_SALT', 'F63k@cdCRBohLK9Ef9`D/6&5HC=<E,7`.A]H|9(dyb0wsJ, ;t]/t*$ZVB+.S!1z' );
define( 'LOGGED_IN_SALT',   'Ytp#4%W0f/!QfMe@3l;}u//pbxczQ/zi.:ng^xm(Nl@@ZF$sbm]ZSa3[=PYPi/RF' );
define( 'NONCE_SALT',       '_U-m``9/P|%R;*oqh1P5Om|y.qJ~T!+igBuv+PE&Bh=&dVs@eK,KTc)-vn M}4<j' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
