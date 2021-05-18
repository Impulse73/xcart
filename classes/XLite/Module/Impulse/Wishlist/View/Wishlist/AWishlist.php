<?php
// vim: set ts=4 sw=4 sts=4 et:

namespace XLite\Module\Impulse\Wishlist\View\Wishlist;

/**
 * Add to compare widget
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
     * Get User Id
     *
     * @param integer $productId Product id
     *
     * @return boolean
     */
    public function getUserId()
    {
        $uid = \XLite\Core\Auth::getInstance()->getProfile()->getProfileId();
        return $uid;
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
     * Is empty
     *
     * @return boolean
     */
    protected function isEmptyList()
    {
        return 0 === \XLite\Module\XC\ProductComparison\Core\Data::getInstance()->getProductsCount();
    }

    protected function isAuth()
    {
        return \XLite\Core\Auth::getInstance()->getProfile();
    }

}
