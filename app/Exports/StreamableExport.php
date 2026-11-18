<?php

namespace App\Exports;

/**
 * An export written with XlsxStream: a header row plus rows produced lazily (one at a time).
 */
interface StreamableExport
{
    public function headings(): array;

    /** @return iterable<array> */
    public function rows(): iterable;
}
