<?php

declare(strict_types=1);

namespace Test;

class SampleFixture implements FixtureInterface
{
    public const CURRENCY_ID_EUR = 1;
    public const CURRENCY_CODE_EUR = 'EUR';
    public const CURRENCY_ID_USD = 2;
    public const CURRENCY_CODE_USD = 'USD';
    public const CURRENCY_ID_BTC = 3;
    public const CURRENCY_CODE_BTC = 'BTC';

    public static function getTableName(): string
    {
        return 'currency';
    }

    public static function getData(): array
    {
        return [
            [
                'id' => self::CURRENCY_ID_EUR,
                'code' => self::CURRENCY_CODE_EUR,
            ],
            [
                'id' => self::CURRENCY_ID_USD,
                'code' => self::CURRENCY_CODE_USD,
            ],
            [
                'id' => self::CURRENCY_ID_BTC,
                'code' => self::CURRENCY_CODE_BTC,
            ],
        ];
    }

    public static function getRelatedFixtures(): array
    {
        return [];
    }
}
