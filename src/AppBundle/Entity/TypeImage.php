<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 08/11/2017
 * Time: 15:02
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Type image
 *
 * @ORM\Table(name="type_image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeImageRepository")
 */
class TypeImage
{

    /**
     * @var int
     *
     * @ORM\Column(name="id_type_image", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idTypeImage;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_type_image", type="string", length=255)
     */
    private $libelleTypeImage;



    /**
     * Get idTypeImage
     *
     * @return integer
     */
    public function getIdTypeImage()
    {
        return $this->idTypeImage;
    }

    /**
     * Set libelleTypeImage
     *
     * @param string $libelleTypeImage
     *
     * @return TypeImage
     */
    public function setLibelleTypeImage($libelleTypeImage)
    {
        $this->libelleTypeImage = $libelleTypeImage;

        return $this;
    }

    /**
     * Get libelleTypeImage
     *
     * @return string
     */
    public function getLibelleTypeImage()
    {
        return $this->libelleTypeImage;
    }
}
