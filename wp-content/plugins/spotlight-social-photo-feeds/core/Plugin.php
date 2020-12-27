<?php

namespace RebelCode\Spotlight\Instagram;

use Dhii\Modular\Module\Exception\ModuleExceptionInterface;
use Dhii\Modular\Module\ModuleInterface;
use Psr\Container\ContainerInterface;
use RebelCode\Spotlight\Instagram\Di\Container;
use RebelCode\Spotlight\Instagram\Modules\Dev\DevModule;
use RebelCode\Spotlight\Instagram\Utils\Arrays;

/**
 * The plugin class.
 *
 * @since 0.1
 */
class Plugin implements ContainerInterface
{
    /**
     * @since 0.1
     *
     * @var string
     */
    protected $pluginFile;

    /**
     * @since 0.2
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @since 0.2
     *
     * @var ModuleInterface
     */
    protected $coreModule;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param string $pluginFile The path to the plugin file.
     */
    public function __construct(string $pluginFile)
    {
        $this->pluginFile = $pluginFile;
        // Create the core module
        $this->coreModule = new CoreModule($pluginFile, $this->loadModules());
        // Create the container
        $this->container = new Container('sl-insta',
            $this->coreModule->getFactories(),
            $this->coreModule->getExtensions()
        );
    }

    /**
     * @inheritDoc
     *
     * @since 0.3.2
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * @inheritDoc
     *
     * @since 0.3.2
     */
    public function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * Loads the modules.
     *
     * @since 0.2
     */
    protected function loadModules()
    {
        $modules = require dirname($this->pluginFile) . '/modules.php';

        if (defined('SL_INSTA_DEV') && SL_INSTA_DEV) {
            $modules['dev'] = new DevModule();
        }

        return Arrays::map($modules, function ($module, $key) {
            return new PrefixingModule("$key/", $module);
        });
    }

    /**
     * Runs the plugin.
     *
     * @since 0.2
     *
     * @throws ModuleExceptionInterface If a module encounters an error while running.
     */
    public function run()
    {
        $this->coreModule->run($this->container);
    }
}
