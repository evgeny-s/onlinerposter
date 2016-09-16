<?php

namespace DataBundle;

use DataBundle\DependencyInjection\DataBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DataBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new DataBundleExtension();
    }
}
