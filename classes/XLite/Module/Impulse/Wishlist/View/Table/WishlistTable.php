<?php

namespace XLite\Module\Impulse\Wishlist\View\Table;

/**
 * Main
 *
 * @ListChild (list="center")
 */
class WishlistTable extends \XLite\View\ItemsList\Product\Customer\ACustomer
{
    /**
     * Return list of allowed targets
     *
     * @return array
     */
    public static function getAllowedTargets()
    {
        $list = parent::getAllowedTargets();
        $list[] = 'wishlist';

        return $list;
    }

    /**
     * Register JS files
     *
     * @return array
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();
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
        $list = parent::getCSSFiles();
        $list[] = 'modules/Impulse/Wishlist/Page/WishlistTable/style.css';
        return $list;
    }

    /**
    * Get product ids from wishlist for user
    *
    * @return array
    */
    protected function getProducts()
    {
        $products = \XLite\Core\Database::getRepo('XLite\Module\Impulse\Wishlist\Model\Wishlist')->findBy(
            array(
               'user_id' => \XLite\Core\Auth::getInstance()->getProfile()->getProfileId()
            )
        );
        $result = [];
        foreach ($products as $product){
            $result[] = $product->getProductId();
        }
        return $result;
    }

    /**
    * Get pager class
    *
    * @return string
    */
    protected function getPagerClass()
    {
        return 'XLite\Module\Impulse\Wishlist\View\Pager\Wishlist\Product';
    }

    /**
    * Get products data
    *
    * @param \XLite\Core\CommonCell $cnd       Search condition
    * @param boolean                $countOnly Return items list or only its size OPTIONAL
    *
    * @return array
    */
    protected function getData(\XLite\Core\CommonCell $cnd, $countOnly = false)
    {
        $cnd->{\XLite\Model\Repo\Product::P_PRODUCT_IDS} = $this->getProducts();
        return $cnd->{\XLite\Model\Repo\Product::P_PRODUCT_IDS}
            ? \XLite\Core\Database::getRepo('\XLite\Model\Product')->search($cnd, $countOnly)
            : NULL;
    }
}