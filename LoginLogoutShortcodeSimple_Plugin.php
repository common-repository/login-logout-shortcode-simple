<?php
include_once('LoginLogoutShortcodeSimple_LifeCycle.php');
class LoginLogoutShortcodeSimple_Plugin extends LoginLogoutShortcodeSimple_LifeCycle {

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'UsersCanRegister' => array(__('Allow new users to subscribe? Also go to Admin Menu> Preferences> General> Members; and check Anyone can register:', 'login-logout-shortcode-simple'), 'no', 'yes'),
			'CanSeeSpecialData' => array(__('Types of users who access protected content. Example: administrator, editor, author, contributor, subscriber, anyone. (values separated by commas):', 'compra-direta-pag-seguro-boleto-pro'),
              ),
			  'PageRedirect' => array(__('After logging in redirect to a page:', 'compra-direta-pag-seguro-boleto-pro'),
              ),
        );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'Login Logout Shortcode Simple';
    }

    protected function getMainPluginFileName() {
        return 'login-logout-shortcode-simple.php';
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function InstallDatabaseTablesLoginLogoutShortcodeSimple() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
	include_once( LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR .'pages/create-login-logout-shortcode-simple-login-page.php');
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTablesLoginLogoutShortcodeSimple() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
	include_once( LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR .'pages/uninstall-login-logout-shortcode-simple-login-page.php');
    }


    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
    public function upgrade() {
    }

    public function addActionsAndFilters() {

        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));

        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        }


        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37


        // Adding scripts & styles to all pages
        // Examples:
        //        wp_enqueue_script('jquery');
        //        wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));


        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39
		
	include_once( LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR .'shortcodes/only.php');
	$sc = new LoginLogoutShortcodeSimpleOnly();
	$sc->register('login-logout-shortcode-simple');
	
	include_once( LOGIN_LOGOUT_SHORTCODE_SIMPLE_DIR .'shortcodes/login-logout-shortcode-simple-login-page.php');
	$sc = new LoginLogoutShortcodeSimpleLoginPage();
	$sc->register('login-logout-shortcode-simple-login-page');
	
        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41

    }


}
