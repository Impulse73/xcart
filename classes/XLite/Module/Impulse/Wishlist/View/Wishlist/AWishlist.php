<?php

namespace XLite\Module\Impulse\Wishlist\View\Wishlist;

/**
 * Add to wishlist widget
 */
abstract class AWishlist extends \XLite\View\Container
{
    /**
     * Product id
     *
     * @var string
     */
    protected $productId;

    /**
     * Register JS files
     *
     * @return array
     */
    public function getJSFiles()
    {
        $list   = parent::getJSFiles();
        $list[] = $this->getDir() . '/script.js';
        $list[] = 'modules/Impulse/Wishlist/script.js';

        return $list;
    }

    /**
     * Register CSS files
     *
     * @return array
     */
    public function getCSSFiles()
    {
        $list   = parent::getCSSFiles();
        $list[] = $this->getDir() . '/style.css';
        $list[] = 'modules/Impulse/Wishlist/style.css';

        return $list;
    }

    /**
     * Return default template
     *
     * @return string
     */
    protected function getDefaultTemplate()
    {
        return $this->getDir() . '/body.twig';
    }

    /**
     * Check user authorized
     *
     * @return array
     */
    protected function isAuth()
    {
        return \XLite\Core\Auth::getInstance()->getProfile();
    }

}
