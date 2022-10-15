<?php

namespace KISS\OpenPub\Classes;

use KISS\OpenPub\Foundation\Plugin;

class OpenPubPluginPostTypes
{
    /** @var Plugin */
    protected $plugin;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
    }


}
