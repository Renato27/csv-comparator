<?php

class CsvComparator
{
    private $oldData;
    private $newData;

    public function __construct($oldFilePath, $newFilePath)
    {
        $this->oldData = $this->csvToArray($oldFilePath);
        $this->newData = $this->csvToArray($newFilePath);
    }

    private function csvToArray($filePath)
    {
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file, 0, ';');
        $data = [];

        while ($row = fgetcsv($file, 0, ';')) {
            $row = array_slice($row, 0, count($header));
            $data[] = array_combine($header, $row);
        }

        fclose($file);
        return $data;
    }

    public function getDifferences()
    {
        $oldDataMap = $this->mapData($this->oldData);
        $newDataMap = $this->mapData($this->newData);

        $identical = [];
        $updated = [];
        $added = [];

        foreach ($newDataMap as $key => $newRow) {
            if (!isset($oldDataMap[$key])) {
                $added[] = [
                    'new' => ['index' => $newRow['index'], 'data' => $newRow['data']]
                ];
            } elseif ($this->rowsEqual($newRow['data'], $oldDataMap[$key]['data'])) {
                $identical[] = [
                    'old' => ['index' => $oldDataMap[$key]['index'], 'data' => $oldDataMap[$key]['data']],
                    'new' => ['index' => $newRow['index'], 'data' => $newRow['data']]
                ];
            } else {
                $updated[] = [
                    'old' => ['index' => $oldDataMap[$key]['index'], 'data' => $oldDataMap[$key]['data']],
                    'new' => ['index' => $newRow['index'], 'data' => $newRow['data']]
                ];
            }
        }

        return [
            'identical' => $identical,
            'updated' => $updated,
            'added' => $added,
        ];
    }

    private function mapData(array $data)
    {
        $mappedData = [];
        foreach ($data as $index => $row) {
            $key = $this->generateKey($row);
            $mappedData[$key] = ['index' => $index + 1, 'data' => $row];
        }
        return $mappedData;
    }

    private function generateKey(array $row)
    {
        return $row['pdf_file_name'] . '_' . $row['cnpj'] . '_' . $row['balance_date'];
    }

    private function rowsEqual(array $row1, array $row2)
    {
        return $this->hashRow($row1) === $this->hashRow($row2);
    }

    private function hashRow(array $row)
    {
        $filteredRow = array_diff_key($row, array_flip(['pdf_file_name', 'cnpj', 'balance_date']));
        return md5(serialize($filteredRow));
    }
}
?>
