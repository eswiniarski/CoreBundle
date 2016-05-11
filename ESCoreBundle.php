<?php

namespace ES\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Bundle\AsseticBundle\AsseticBundle;

class ESCoreBundle extends Bundle
{
    /**
     * This is a hack method which allows register dependency bundles semi automatically
     * usage in README
     *
     * @param $environment string - current environment e.g dev, test, prod
     * @return array of bundle's instances
     */
    public function registerBundles($environment) {
        $bundles = array(
            new AsseticBundle(),
        );

        if (in_array($environment, array('dev', 'test'))) {
            ;
        }

        $newBundles = array();
        foreach ($bundles as $bundle) {
            if (method_exists($bundle, 'registerBundles')) {
                $newBundles = array_merge($newBundles, $bundle->registerBundles($environment));
            }
        }
        $bundles = array_merge($bundles, $newBundles);

        return $bundles;
    }
}
