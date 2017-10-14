<?php
/**
 * Created by PhpStorm.
 * User: HaiTH
 * Date: 2017/10/14
 * Time: 15:43
 */

namespace App\Http\Controllers\Common\VO;


class VipOutVO
{
    public $lsVipLike = array(), $lsVipComment = array(), $lsVipShare = array(), $lsVipReact = array();

    /**
     * @return array
     */
    public function getLsVipReact()
    {
        return $this->lsVipReact;
    }

    /**
     * @param array $lsVipReact
     */
    public function setLsVipReact($lsVipReact)
    {
        $this->lsVipReact = $lsVipReact;
    }

    /**
     * @return array
     */
    public function getLsVipShare()
    {
        return $this->lsVipShare;
    }

    /**
     * @param array $lsVipShare
     */
    public function setLsVipShare($lsVipShare)
    {
        $this->lsVipShare = $lsVipShare;
    }

    /**
     * @return array
     */
    public function getLsVipComment()
    {
        return $this->lsVipComment;
    }

    /**
     * @param array $lsVipComment
     */
    public function setLsVipComment($lsVipComment)
    {
        $this->lsVipComment = $lsVipComment;
    }

    /**
     * @return array
     */
    public function getLsVipLike()
    {
        return $this->lsVipLike;
    }

    /**
     * @param array $lsVipLike
     */
    public function setLsVipLike($lsVipLike)
    {
        $this->lsVipLike = $lsVipLike;
    }
}