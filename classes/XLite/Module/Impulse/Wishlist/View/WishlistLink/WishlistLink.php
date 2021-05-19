<?php

namespace XLite\Module\Impulse\Wishlist\View\WishlistLink;

/**
 * Add to compare widget
 *
 * @ListChild (list="layout.header.right", weight="200")
 */

class WishlistLink extends \XLite\View\AView
{
    /**
     * Check user authorized
     *
     * @return array
     */
    protected function isAuth()
    {
        return \XLite\Core\Auth::getInstance()->getProfile();
    }

    /**
     * Return default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return $this->getDir() . '/header.right.twig';
    }

    protected function getDir()
    {
        return 'modules/Impulse/Wishlist/header';
    }
}
