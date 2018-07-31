<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'fqQJ6rWr7R');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Of!n._XfzXTAD&5oK}au6Hf6=a(E(T5H?4(nF{l1vJ6KC=}H_;c!2|S/XP&%3wvW');
define('SECURE_AUTH_KEY',  '=81}kOX#BGzI/Nl<kO5l];m={TrsMxm2p%nB<19mwW,|a`b|^_|(r)?CJO7+#}+m');
define('LOGGED_IN_KEY',    '~K]JW]y #vo-[.)}~OCJ{4^J^6m`ew6p|Okb3xT3L!/1jwR%KyX^^#OH24EUQXoh');
define('NONCE_KEY',        'vB2Fph:3&^J%M|]a`_/.8%!]j/dA>FX7=?&%V&j7ye]3VX`y{sgBy|M:cZ%c(mE_');
define('AUTH_SALT',        '}p:O>Az&I]mlObkom}_EE/&L2sF79OE,$av,@B_[ZRWpHe[P<[w@E81LW$vaIDJ]');
define('SECURE_AUTH_SALT', 'NB5RRAe_vCzAx~J[?3;2Kuji?,Fb0S+9wSMN.gJMd[s04yuNDs&n@Q/++]O8TDi@');
define('LOGGED_IN_SALT',   'E;Qa%::G<0^}IX$XM0Mn){,$9tyf$Vc=3lE;ytTvIaT-U^C8Mzy:8g1>.H?!xyEo');
define('NONCE_SALT',       '[G2x>$AZ@;>YnW;}-F*jdAnJ.vRPH2<VOaDc(GeIqbo.yjh4F{G/|-tmm#*S0e>_');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'fqQJ6rWr7Rwp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
