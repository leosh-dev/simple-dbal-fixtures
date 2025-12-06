<?php

declare(strict_types=1);

namespace Test;

interface FixtureInterface
{
    public static function getTableName(): string;

    /**
     * @return array<array-key, array<string, mixed>>
     */
    public static function getData(): array;

    /**
     * @return array<array-key, class-string<FixtureInterface>>
     */
    public static function getRelatedFixtures(): array;
}
