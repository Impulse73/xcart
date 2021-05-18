<?php

namespace XLite\Module\Impulse\Wishlist\Controller\Customer;

use XLite\Core\TopMessage;

class Wishlist extends \XLite\Controller\Customer\ACustomer
{
    /**
     * Controller parameters
     *
     * @var array
     */
    protected $params = ['target'];
    /**
     * Wishlist add
     *
     * @return void
     */
    protected function doActionAdd()
    {
        $pid = \XLite\Core\Request::getInstance()->product_id;
        $uid = \XLite\Core\Auth::getInstance()->getProfile()->getProfileId();
        $model = new \XLite\Module\Impulse\Wishlist\Model\Wishlist;

        $model->setUserId($uid);
        $model->setProductId($pid);

        \XLite\Core\Database::getEM()->persist($model);
        \XLite\Core\Database::getEM()->flush();

        TopMessage::addInfo('The product has been added to Wishlist');
    }

    /**
     * Delete product or clear wishlist
     *
     * @return void
     */
    protected function doActionDelete($pid = 0, $clear = false)
    {
        $pid = \XLite\Core\Request::getInstance()->product_id;
        $clear = \XLite\Core\Request::getInstance()->clear;
        $uid = \XLite\Core\Auth::getInstance()->getProfile()->getProfileId();
        if (!$clear) {
            $products = \XLite\Core\Database::getRepo('XLite\Module\Impulse\Wishlist\Model\Wishlist')
            ->findBy(
                array(
                    'user_id' => $uid,
                    'product_id' => $pid
                )
            );
        }
        else {
            $products = \XLite\Core\Database::getRepo('XLite\Module\Impulse\Wishlist\Model\Wishlist')
            ->findBy(array('user_id' => $uid));
        }
        foreach ($products as $product) {
            \XLite\Core\Database::getEM()->remove($product);
        }

        \XLite\Core\Database::getEM()->flush();

        TopMessage::addInfo('The product has been removed from Wishlist');
        if ($this->isAJAX()){
            //stub
        } else {
            $this->setReturnURL($this->buildURL('wishlist'));
            $this->setHardRedirect();
        }
    }
}
