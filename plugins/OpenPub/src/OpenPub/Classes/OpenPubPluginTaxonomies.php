<?php

namespace KISS\OpenPub\Classes;

use KISS\OpenPub\Foundation\Plugin;

class OpenPubPluginTaxonomies
{
    /** @var Plugin */
    protected $plugin;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
    }

}
