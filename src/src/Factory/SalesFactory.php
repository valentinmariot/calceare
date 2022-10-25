<?php

namespace App\Factory;

use App\Entity\Sales;
use App\Repository\SalesRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Sales>
 *
 * @method static Sales|Proxy createOne(array $attributes = [])
 * @method static Sales[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Sales[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Sales|Proxy find(object|array|mixed $criteria)
 * @method static Sales|Proxy findOrCreate(array $attributes)
 * @method static Sales|Proxy first(string $sortedField = 'id')
 * @method static Sales|Proxy last(string $sortedField = 'id')
 * @method static Sales|Proxy random(array $attributes = [])
 * @method static Sales|Proxy randomOrCreate(array $attributes = [])
 * @method static Sales[]|Proxy[] all()
 * @method static Sales[]|Proxy[] findBy(array $attributes)
 * @method static Sales[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Sales[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SalesRepository|RepositoryProxy repository()
 * @method Sales|Proxy create(array|callable $attributes = [])
 */
final class SalesFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Sales $sales): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Sales::class;
    }
}
