<?php
include 'autoload.php';

use Classes\Rate\RateProps;
use Classes\Rate\Rate;

class Main
{

    const BR = '<br />';

    private $sep = "\n";

    public function __construct()
    {
        if (php_sapi_name() !== 'cli')
        {
            $this->sep = Main::BR;
        }
    }

    public function process()
    {
        echo "Here some rates...", $this->sep;

        // только для демонстрации, в реальности так не надо делать.
        foreach (RateProps::Pairs as $pair) {

            $rate = new Rate($pair);

            echo $pair, " - ", $rate->get(), $this->sep;
        }

        echo "Finish.", $this->sep;
    }
}

$main = new Main();

$main->process();

?>