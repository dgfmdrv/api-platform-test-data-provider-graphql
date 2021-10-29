<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use App\Repository\TrabajoRepository;

/**
 * @ORM\Entity(repositoryClass=TrabajoRepository::class)
 * @ORM\Table(name="trabajo")
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"trabajo:write"}},
 *      itemOperations={
 *          "get"={ "controller"=NotFoundAction::class, "read"=false, "output"=false },
 *      },
 *      collectionOperations={
 *      },
 *      graphql={
 *          "item_query",
 *          "collection_query"
 *      },
 *      attributes={
 *          "pagination_enabled"=false
 *      }
 * )
 */
class Trabajo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"read", "trabajo:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1024, nullable=false)
     * @Groups({"read", "trabajo:write"})
     * @Assert\Length(max=1024)
     * @Assert\NotBlank()
     */
    private $descripcion;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }


}
