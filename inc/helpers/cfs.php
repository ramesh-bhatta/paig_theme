<?php
function getCFSValue($name)
{
    if (function_exists("CFS")) {
        return CFS()->get($name);
    } else {
        return "";
    }
}

function getCustomThemeValue($name,$default_value="")
{
    return !empty(get_theme_mod($name)) ? get_theme_mod($name) : $default_value;
}