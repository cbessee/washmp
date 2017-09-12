<?php
namespace UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MESAUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
