<?php

declare(strict_types=1);

namespace Test;

use Doctrine\DBAL\Connection;

final class FixtureManager
{
    /** @var array<class-string<FixtureInterface>> */
    private array $loadedFixtures = [];

    public function __construct(
        private Connection $connection,
    ) {
    }

    /**
     * @param array<class-string<FixtureInterface>> $fixtures
     */
    public function loadFixtures(array $fixtures): void
    {
        $this->clearLoadedFixtures();
        foreach ($fixtures as $fixture) {
            $this->loadFixture($fixture);
        }
    }

    /**
     * @param class-string<FixtureInterface> $fixture
     */
    private function loadFixture(string $fixture): void
    {
        foreach ($fixture::getRelatedFixtures() as $relatedFixture) {
            $this->loadFixture($relatedFixture);
        }

        if (in_array($fixture, $this->loadedFixtures, true)) {
            return;
        }

        foreach ($fixture::getData() as $rowData) {
            $this->connection->insert(
                table: $fixture::getTableName(),
                data: $rowData,
            );
        }

        $this->loadedFixtures[] = $fixture;
    }

    private function clearLoadedFixtures(): void
    {
        $this->loadedFixtures = [];
    }
}
