<?PHP

// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {

    //create new top-level menu
    add_menu_page('$NAME', 'theme setting', 'administrator', __FILE__, 'callback' , 'abcd' );

    //call register settings function
    add_action( 'admin_init', 'register_my_cool_plugin_settings' );
}


function register_my_cool_plugin_settings() {
    //register our settings
    register_setting( 'my-cool-plugin-settings-group', 'new_option_name' );
}

function callback() {
    ?>
    <div class="wrap">
        <h2>Your Plugin Name</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
            <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">New Option Name</th>
                    <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Some Other Option</th>
                    <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Options, Etc.</th>
                    <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>
<?PHP  } ?>