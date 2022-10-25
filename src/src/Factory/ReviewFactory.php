<?php

namespace App\Factory;

use App\Entity\Review;
use App\Repository\ReviewRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Review>
 *
 * @method static Review|Proxy createOne(array $attributes = [])
 * @method static Review[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Review[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Review|Proxy find(object|array|mixed $criteria)
 * @method static Review|Proxy findOrCreate(array $attributes)
 * @method static Review|Proxy first(string $sortedField = 'id')
 * @method static Review|Proxy last(string $sortedField = 'id')
 * @method static Review|Proxy random(array $attributes = [])
 * @method static Review|Proxy randomOrCreate(array $attributes = [])
 * @method static Review[]|Proxy[] all()
 * @method static Review[]|Proxy[] findBy(array $attributes)
 * @method static Review[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Review[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ReviewRepository|RepositoryProxy repository()
 * @method Review|Proxy create(array|callable $attributes = [])
 */
final class ReviewFactory extends ModelFactory
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
            'note' => self::faker()->randomNumber(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Review $review): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Review::class;
    }
}
