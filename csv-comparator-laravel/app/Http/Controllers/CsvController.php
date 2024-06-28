<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvRequest;
use App\Services\Contracts\CsvComparatorServiceInterface;

class CsvController extends Controller
{
    private $csvComparator;

    public function __construct(CsvComparatorServiceInterface $csvComparator)
    {
        $this->csvComparator = $csvComparator;
    }

    public function index()
    {
        return view('csv.index');
    }

    public function compare(CsvRequest $request)
    {
        $oldFile = $request->file('old_file')->getRealPath();
        $newFile = $request->file('new_file')->getRealPath();

        $differences = $this->csvComparator->setFiles($oldFile, $newFile)->getDifferences();

        return view('csv.results', compact('differences'));
    }
}
