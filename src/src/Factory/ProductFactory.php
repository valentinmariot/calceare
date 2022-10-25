<?php

namespace App\Factory;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Product>
 *
 * @method static Product|Proxy createOne(array $attributes = [])
 * @method static Product[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Product[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Product|Proxy find(object|array|mixed $criteria)
 * @method static Product|Proxy findOrCreate(array $attributes)
 * @method static Product|Proxy first(string $sortedField = 'id')
 * @method static Product|Proxy last(string $sortedField = 'id')
 * @method static Product|Proxy random(array $attributes = [])
 * @method static Product|Proxy randomOrCreate(array $attributes = [])
 * @method static Product[]|Proxy[] all()
 * @method static Product[]|Proxy[] findBy(array $attributes)
 * @method static Product[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Product[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ProductRepository|RepositoryProxy repository()
 * @method Product|Proxy create(array|callable $attributes = [])
 */
final class ProductFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->text(20),
            'date' => \DateTime::createFromFormat('Y-m-d', '2022-02-12'), // TODO add DATETIME ORM type manually
            'image' => 'https://static.sneakerdistrict.com/images2/Nike-Air-Force-1-07-Just-Do-It-White-Black-Total-Orange-81-800.jpg',
            'price' => self::faker()->randomFloat(),
            'size' => self::faker()->randomFloat(),
            'state' => 'TB',
            'brand' => self::faker()->text(10),
            'is_sold' => self::faker()->boolean(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Product $product): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Product::class;
    }
}
