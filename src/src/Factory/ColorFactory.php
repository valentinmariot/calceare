<?php

namespace App\Factory;

use App\Entity\Color;
use App\Repository\ColorRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Color>
 *
 * @method static Color|Proxy createOne(array $attributes = [])
 * @method static Color[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Color[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Color|Proxy find(object|array|mixed $criteria)
 * @method static Color|Proxy findOrCreate(array $attributes)
 * @method static Color|Proxy first(string $sortedField = 'id')
 * @method static Color|Proxy last(string $sortedField = 'id')
 * @method static Color|Proxy random(array $attributes = [])
 * @method static Color|Proxy randomOrCreate(array $attributes = [])
 * @method static Color[]|Proxy[] all()
 * @method static Color[]|Proxy[] findBy(array $attributes)
 * @method static Color[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Color[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ColorRepository|RepositoryProxy repository()
 * @method Color|Proxy create(array|callable $attributes = [])
 */
final class ColorFactory extends ModelFactory
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
            'product_color' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Color $color): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Color::class;
    }
}
