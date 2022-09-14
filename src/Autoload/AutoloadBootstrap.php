<?php

namespace Symbiotic\Autoload;

use Symbiotic\Container\DIContainerInterface;
use Symbiotic\Core\BootstrapInterface;

class AutoloadBootstrap implements BootstrapInterface
{
    /**
     * @notice This bootstrap should be the first in the bootstrappers array!
     *
     * @param DIContainerInterface $core
     *
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function bootstrap(DIContainerInterface $core): void
    {
        $config = $core->get('config');

        if ($config->has('autoloader')) {
            $autoloaderConfig = $config->get('autoloader');
        } else {
            $autoloaderConfig = [
                'scan_dirs' => [],
            ];
        }
        if (!isset($autoloaderConfig['storage_path'])) {
            $autoloaderConfig['storage_path'] = $core('cache_path_core');
        }
        Autoloader::register(
            $autoloaderConfig['prepend'] ?? false,
            $autoloaderConfig['scan_dirs'],
            $autoloaderConfig['storage_path']
        );
    }
}