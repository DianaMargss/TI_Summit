<?php
namespace Hurrytimer;

/**
 * Fired during plugin activation
 *
 * @link       http://nabillemsieh.com
 * @since      1.0.0
 *
 * @package    Hurrytimer
 * @subpackage Hurrytimer/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Hurrytimer
 * @subpackage Hurrytimer/includes
 * @author     Nabil Lemsieh <contact@nabillemsieh.com>
 */
class Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        Upgrade::getInstance()->createTables();

        add_option('hurrytimer_db_version', HURRYT_DB_VERSION);
        add_option(HURRYT_OPTION_VERSION_KEY, HURRYT_VERSION);

    }

}
