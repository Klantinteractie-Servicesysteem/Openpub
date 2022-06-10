<?php

namespace KISS\OpenPub\Foundation;

class Plugin
{
    /**
     * Path to the root of the plugin.
     *
     * @var string $rootPath
     */
    protected $rootPath;

    public function __construct(string $rootPath)
    {
        $this->rootPath = $rootPath;
    }

    /**
     * Boot plugin classes.
     *
     * @return void
     */
    public function boot(): void
    {
        new \KISS\OpenPub\Classes\OpenPubPluginShortcodes($this);
        new \KISS\OpenPub\Classes\OpenPubPluginPostTypes($this);
        new \KISS\OpenPub\Classes\OpenPubPluginTaxonomies($this);
        new \KISS\OpenPub\Classes\OpenPubPluginAdminSettings();
    }

    /**
     * Return root path of plugin.
     *
     * @return string
     */
    public function getRootPath(): string
    {
        return $this->rootPath;
    }
}
