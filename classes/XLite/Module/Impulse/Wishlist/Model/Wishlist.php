<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * Copyright (c) 2011-present Qualiteam software Ltd. All rights reserved.
 * See https://www.x-cart.com/license-agreement.html for license details.
 */

namespace XLite\Module\Impulse\Wishlist\Model;

/**
 * Category quick flags
 *
 * @Entity
 * @Table  (name="products_wishlist")
 */
class Wishlist extends \XLite\Model\AEntity
{
    /**
     * Doctrine ID
     *
     * @var integer
     *
     * @Id
     * @GeneratedValue (strategy="AUTO")
     * @Column         (type="integer", options={ "unsigned": true })
     */
    protected $id;

    /**
     * Total number of subcategories
     *
     * @var integer
     *
     * @Column (type="integer")
     */
    protected $product_id = 0;

    /**
     * Number of enabled subcategories
     *
     * @var integer
     *
     * @Column (type="integer")
     */
    protected $user_id = 0;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Product Id
     *
     * @param integer $product_id
     * @return Wishlist
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;

    }

    /**
     * get Product Id
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set User Id
     *
     * @param integer $user_id
     * @return Wishlist
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;

    }

    /**
     * Get User Id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;

    }
    /**
     * Get Product model
     *
     * @return product
     */
    public function getProductInfo()
    {
        $product = \XLite\Core\Database::getRepo('XLite\Model\Product')->find($this->product_id);
        return $product;
    }
}
