<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 08/11/2017
 * Time: 14:59
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageRepository")
 */
class Image
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeImage")
     * @ORM\JoinColumn(name="id_type_image", referencedColumnName="id_type_image", nullable=false)
     */
    private $typeImage;

    /**
     * @var int $idImage
     *
     * @ORM\Column(name="id_image", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idImage;

    /**
     * @var string $urlImage
     *
     * @ORM\Column(name="url_image", type="string", length=255)
     */
    private $urlImage;

    /**
     * @var string $descriptionImage
     *
     * @ORM\Column(name="description_image", type="string", length=255)
     */
    private $descriptionImage;


    /**
     * @var string $gitHubUrl
     *
     * @ORM\Column(name="git_hub_url", type="string", length=255)
     */
    private $gitHubUrl;


    /**
     * Get idImage
     *
     * @return integer
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * Set urlImage
     *
     * @param string $urlImage
     *
     * @return Image
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * Get urlImage
     *
     * @return string
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }

    /**
     * Set descriptionImage
     *
     * @param string $descriptionImage
     *
     * @return Image
     */
    public function setDescriptionImage($descriptionImage)
    {
        $this->descriptionImage = $descriptionImage;

        return $this;
    }

    /**
     * Get descriptionImage
     *
     * @return string
     */
    public function getDescriptionImage()
    {
        return $this->descriptionImage;
    }

    /**
     * @return string
     */
    public function getGitHubUrl()
    {
        return $this->gitHubUrl;
    }

    /**
     * @param string $gitHubUrl
     */
    public function setGitHubUrl($gitHubUrl)
    {
        $this->gitHubUrl = $gitHubUrl;
    }




    /**
     * Set typeImage
     *
     * @param \AppBundle\Entity\TypeImage $typeImage
     *
     * @return Image
     */
    public function setTypeImage(\AppBundle\Entity\TypeImage $typeImage)
    {
        $this->typeImage = $typeImage;

        return $this;
    }

    /**
     * Get typeImage
     *
     * @return \AppBundle\Entity\TypeImage
     */
    public function getTypeImage()
    {
        return $this->typeImage;
    }
}
