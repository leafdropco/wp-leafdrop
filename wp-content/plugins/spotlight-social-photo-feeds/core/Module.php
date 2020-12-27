<?php

namespace RebelCode\Spotlight\Instagram;

use Dhii\Modular\Module\ModuleInterface;
use Interop\Container\ServiceProviderInterface;

/**
 * Padding layer for modules, implementing the service provider interface to avoid implementing the setup method.
 *
 * @since 0.1
 */
abstract class Module implements ModuleInterface, ServiceProviderInterface
{
    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function setup() : ServiceProviderInterface
    {
        return $this;
    }
}
