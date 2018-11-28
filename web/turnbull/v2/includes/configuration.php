<?php
/**
 * @file configuration.php
 * Definitions, quality assurance and other.
 */

// Error Reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

// Definitions
define("ROOT_FOLDER", "http://" . $_SERVER["HTTP_HOST"] . "/turnbull/v2/");

// Import
require_once "application.php";
require_once "renderer.php";
require_once "searcher.php";
require_once "poem.php";

$application = new Application();
