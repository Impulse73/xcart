<?php

namespace XLite\Module\Impulse\Wishlist\View\Table;

/**
 * Main
 *
 * @ListChild (list="center")
 */
class WishlistTable extends \XLite\View\AView
{

    public static function getAllowedTargets()
    {
        $list = parent::getAllowedTargets();
        $list[] = 'wishlist';

        return $list;
    }

    public function getCSSFiles()
    {
        $list = parent::getCSSFiles();
        $list[] = 'modules/Impulse/Wishlist/Page/WishlistTable/style.css';

        return $list;
    }

    public function getJSFiles()
    {
        $list = parent::getJSFiles();
        $list[] = 'modules/Impulse/Wishlist/Page/WishlistTable/script.js';
        return $list;
    }

    protected function getDefaultTemplate()
    {
        return 'modules/Impulse/Wishlist/Page/WishlistTable/body.twig';
    }

    protected function getProducts( )
    {
        $products = \XLite\Core\Database::getRepo('XLite\Module\Impulse\Wishlist\Model\Wishlist')->findBy(
            array(
               'user_id' => \XLite\Core\Auth::getInstance()->getProfile()->getProfileId()
            )
        );
        return $products;
    }

}
