<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Action\NotFoundAction;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      itemOperations={
 *          "get"={ "controller"=NotFoundAction::class, "read"=false, "output"=false },
 *      },
 *      collectionOperations={
 *          "get"
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
class DashboardStat
{
    
    /**
     * @Groups({"read"})
     */
    public $date;
    
    /**
     * @Groups({"read"})
     */
    public $totalVisitors;

    /**
     * The 5 most popular cheese listings from this date!
     * @var array<Trabajo>|Trabajo[]
     * @Groups({"read"})
     */
    public $mostPopularListings;

    /**
     * @ApiProperty(identifier=true)
     */
    public function getDateString(): string
    {
        return (new \DateTime('now', new \DateTimeZone('UTC')))->format(\DateTime::ISO8601);
    }

    public function __construct(\DateTimeInterface $date, int $totalVisitors, array $mostPopularListings)
    {
        $this->date = $date;
        $this->totalVisitors = $totalVisitors;
        $this->mostPopularListings = $mostPopularListings;
    }    
}
