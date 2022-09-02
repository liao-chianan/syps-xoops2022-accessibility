<?php
function adminer_object()
{
    // required to run any plugin
    require_once "./plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        require_once "./$filename";
    }

    $plugins = array(
        // specify enabled plugins here
        new AdminerTablesHistory,
        new FasterTablesFilter,
        new AdminerJsonPreview,
        new AdminerSimpleMenu,
        new AdminerDumpJson,
        new AdminerJsonColumn,
        new AdminerDumpArray,
    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
     */

    return new AdminerPlugin($plugins);
}

// require original Adminer or Adminer Editor
require "./adminer.php";
