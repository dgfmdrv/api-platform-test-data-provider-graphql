<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\DashboardStat;
use App\Entity\Trabajo;

class DashboardStatProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getCollection(string $resourceClass, string $operationName = null)
    {
        //  $this->doctrine->getRepository(Trabajo::class)->findOneBy(array("id"=>1))

        $stats = new DashboardStat(
            new \DateTime(),
            1000,
            [$this->doctrine->getRepository(Trabajo::class)->findOneBy(array("id"=>1))]
        );
        $stats2 = new DashboardStat(
            new \DateTime(),
            222,
            []
        );

        // $this->trabajoRepository->findOneBy(array('id'=>1))

        return [$stats, $stats2];
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === DashboardStat::class;
    }
}
