<?php
/*
 * The Console App
 * @author Amr Gamal <amr.gamal878@gmail.com>
 */
require_once './EnvReader.php';
require_once './Repository.php';
require_once './OutputInterface.php';
require_once './OutputHtml.php';
require_once './ConsoleApp.php';

$app = new ConsoleApp(new Repository());

$app->run();
