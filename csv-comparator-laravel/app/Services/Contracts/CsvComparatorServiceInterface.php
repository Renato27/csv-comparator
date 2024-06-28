<?php

namespace App\Services\Contracts;

interface CsvComparatorServiceInterface
{

    public function setFiles(string $oldFilePath, string $newFilePath): CsvComparatorServiceInterface;

    public function getDifferences(): array;
}
