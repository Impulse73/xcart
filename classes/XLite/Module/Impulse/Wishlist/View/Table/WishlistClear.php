<?php

namespace XLite\Module\Impulse\Wishlist\View\Table;

/**
 * Main
 *
 * @ListChild (list="sidebar.first", weight="100")
 */
class WishlistClear extends \XLite\View\AView
{

    public static function getAllowedTargets()
    {
        $list = parent::getAllowedTargets();
        $list[] = 'wishlist';

        return $list;
    }

    protected function getDefaultTemplate()
    {
        return 'modules/Impulse/Wishlist/Page/WishlistTable/sidebar.twig';
    }


}
