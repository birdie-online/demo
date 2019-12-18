<?php
spl_autoload_register(function ($classname) {
    require_once str_replace("\\", "/", $classname) . ".php";
});
