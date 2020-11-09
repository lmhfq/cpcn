<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/9
 * Time: 下午4:43
 */

namespace Lmh\Cpcn\Entity;


class FileInfoEntity
{

    public $fleinfo_dtlno;

    public $fleinfo_bsity;

    public $fleinfo_fletheme;

    public $fleinfo_flemeo;

    public $fleinfo_flety;

    public $fleinfo_flenm;

    public $fleinfo_flepth;

    public $fleinfo_flecont;

    /**
     * @return mixed
     */
    public function getFleinfoDtlno()
    {
        return $this->fleinfo_dtlno;
    }

    /**
     * @param mixed $fleinfo_dtlno
     */
    public function setFleinfoDtlno($fleinfo_dtlno): void
    {
        $this->fleinfo_dtlno = $fleinfo_dtlno;
    }

    /**
     * @return mixed
     */
    public function getFleinfoBsity()
    {
        return $this->fleinfo_bsity;
    }

    /**
     * @param mixed $fleinfo_bsity
     */
    public function setFleinfoBsity($fleinfo_bsity): void
    {
        $this->fleinfo_bsity = $fleinfo_bsity;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFletheme()
    {
        return $this->fleinfo_fletheme;
    }

    /**
     * @param mixed $fleinfo_fletheme
     */
    public function setFleinfoFletheme($fleinfo_fletheme): void
    {
        $this->fleinfo_fletheme = $fleinfo_fletheme;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlemeo()
    {
        return $this->fleinfo_flemeo;
    }

    /**
     * @param mixed $fleinfo_flemeo
     */
    public function setFleinfoFlemeo($fleinfo_flemeo): void
    {
        $this->fleinfo_flemeo = $fleinfo_flemeo;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlety()
    {
        return $this->fleinfo_flety;
    }

    /**
     * @param mixed $fleinfo_flety
     */
    public function setFleinfoFlety($fleinfo_flety): void
    {
        $this->fleinfo_flety = $fleinfo_flety;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlenm()
    {
        return $this->fleinfo_flenm;
    }

    /**
     * @param mixed $fleinfo_flenm
     */
    public function setFleinfoFlenm($fleinfo_flenm): void
    {
        $this->fleinfo_flenm = $fleinfo_flenm;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlepth()
    {
        return $this->fleinfo_flepth;
    }

    /**
     * @param mixed $fleinfo_flepth
     */
    public function setFleinfoFlepth($fleinfo_flepth): void
    {
        $this->fleinfo_flepth = $fleinfo_flepth;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlecont()
    {
        return $this->fleinfo_flecont;
    }

    /**
     * @param mixed $fleinfo_flecont
     */
    public function setFleinfoFlecont($fleinfo_flecont): void
    {
        $this->fleinfo_flecont = $fleinfo_flecont;
    }


}