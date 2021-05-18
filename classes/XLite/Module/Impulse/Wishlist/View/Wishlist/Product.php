<?php
// vim: set ts=4 sw=4 sts=4 et:

namespace XLite\Module\Impulse\Wishlist\View\Wishlist;

/**
 * Add to compare widget
 *
 * @ListChild (list="product.details.page.info.form.buttons.cart-buttons", zone="customer", weight="120")
 * @ListChild (list="product.details.page.info.form.buttons-added.cart-buttons", zone="customer", weight="120")
 */
class Product extends \XLite\Module\Impulse\Wishlist\View\Wishlist\AWishlist
{
    /**
     * Get widget templates directory
     *
     * @return string
     */
    protected function getDir()
    {
        return 'modules/Impulse/Wishlist/product';
    }

    protected function isAdded($product_id)
    {
        $model = \XLite\Core\Database::getRepo('XLite\Module\Impulse\Wishlist\Model\Wishlist')->findBy(
            array(
               'user_id' => \XLite\Core\Auth::getInstance()->getProfile()->getProfileId(),
               'product_id' => $product_id
            )
        );
        return empty($model) ? 0 : 1 ;
    }
}
