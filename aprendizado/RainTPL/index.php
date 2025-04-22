<?php

require_once("vendor/autoload.php");


Use Rain\Tpl;

$config = array(
    "tpl_dir" => "tpl/",
    "cache_dir" => "cache/"
);
Tpl::configure($config);

$tpl = new Tpl();

$tpl->assign("name", "Wesley");
$tpl->assign("version", PHP_VERSION);
$tpl->draw("index");

