<?php

/**
* This file contains definitions
*
* @package Config
*/
header("Content-type: text/html; charset=UTF-8");
error_reporting(E_ALL);


define("VERSION", "0.7.9.2");


define("SITE_UID", "MNJNTR");
define("SITE_NAME", "min-janitor");
define("SITE_URL", (isset($_SERVER["HTTPS"]) ? "https" : "http")."://".$_SERVER["SERVER_NAME"]);
define("SITE_EMAIL", "munkefrugt@gmail.com");

define("DEFAULT_PAGE_DESCRIPTION", "");
define("DEFAULT_PAGE_IMAGE", "/img/logo-large.png");

define("DEFAULT_LANGUAGE_ISO", "EN");
define("DEFAULT_COUNTRY_ISO", "DK");
define("DEFAULT_CURRENCY_ISO", "DKK");

define("SITE_LOGIN_URL",  "/janitor/admin/login");

define("SITE_SIGNUP", 1);
define("SITE_SIGNUP_URL", "/signup");

define("SITE_ITEMS", 1);

define("SITE_SHOP", 0);
define("SHOP_ORDER_NOTIFIES", "");

define("SITE_SUBSCRIPTIONS", 0);

define("SITE_MEMBERS", 0);

// send collection email after N rows
define("SITE_COLLECT_NOTIFICATIONS", 50);


// INSTALL MODE (DISABLES ALL SECURITY) – ONLY USE IN EMERGENCIES AND ONLY TEMPORARILY
// define("SITE_INSTALL", true);
