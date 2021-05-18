<?php

namespace XLite\Module\Impulse\Wishlist\View\WishlistLink;

/**
 * Add to compare widget
 *
 * @ListChild (list="layout.header.right", weight="200")
 */

class WishlistLink extends \XLite\View\AView
{
    protected function isAuth()
    {
        return \XLite\Core\Auth::getInstance()->getProfile();
    }

    protected function getDefaultTemplate()
    {
        return $this->getDir() . '/header.right.twig';
    }

    protected function getDir()
    {
        return 'modules/Impulse/Wishlist/header';
    }
}
