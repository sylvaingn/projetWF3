<?php

/** 
 * PLUGIN NAME: Mon Plugin
 */

function activateHook()
{
    error_log("plugin activé");
}

function deactivateHook()
{
    error_log("plugin désactivé");
}

function uninstallHook()
{
    error_log("plugin désinstallé");
}

register_activation_hook(__FILE__, activateHook());
register_deactivation_hook(__FILE__, deactivateHook());
register_uninstall_hook(__FILE__,uninstallHook());
