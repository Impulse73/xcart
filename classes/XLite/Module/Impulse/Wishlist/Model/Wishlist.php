<?php

namespace XLite\Module\Impulse\Wishlist\Model;

/**
 *  Wishlist
 *
 * @Entity
 * @Table  (name="products_wishlist")
 */
class Wishlist extends \XLite\Model\AEntity
{
    /**
     * Wishlist ID
     *
     * @var integer
     *
     * @Id
     * @GeneratedValue (strategy="AUTO")
     * @Column         (type="integer", options={ "unsigned": true })
     */
    protected $id;

    /**
     * Product ID
     *
     * @var integer
     *
     * @Column (type="integer")
     */
    protected $product_id = 0;

    /**
     * User ID
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
     * get Product ID
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set User ID
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
}
