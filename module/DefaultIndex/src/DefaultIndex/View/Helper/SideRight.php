<?php

namespace DefaultIndex\View\Helper;

use Zend\View\Helper\AbstractHelper;

class SideRight extends AbstractHelper
{
    public function __invoke()
    {
        return sprintf('Hello, World from %s', __NAMESPACE__);
    }
}
