<?php

namespace App\Exports;

use Generator;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Writer\XLSX\Options;
use OpenSpout\Writer\XLSX\Writer;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Writes an .xlsx download row by row with OpenSpout, so memory stays flat no matter how
 * many rows are exported. PhpSpreadsheet (maatwebsite/excel) keeps every cell in memory
 * and builds the whole sheet at once, which ran out of the 128M limit on the big logs.
 */
final class XlsxStream
{
    /** Rows sampled to size the columns (a cheap stand-in for ShouldAutoSize). */
    private const SAMPLE_ROWS = 500;

    private const MAX_COLUMN_WIDTH = 60;

    public static function download(StreamableExport $export, string $filename): BinaryFileResponse
    {
        $headings = $export->headings();
        $rows = (fn (): Generator => yield from $export->rows())();

        $sample = [];
        while ($rows->valid() && count($sample) < self::SAMPLE_ROWS) {
            $sample[] = self::cells($rows->current());
            $rows->next();
        }

        $options = new Options;
        foreach (self::columnWidths($headings, $sample) as $column => $width) {
            $options->setColumnWidth($width, $column);
        }

        $path = tempnam(sys_get_temp_dir(), 'xlsx');
        $writer = new Writer($options);
        $writer->openToFile($path);
        $writer->addRow(Row::fromValuesWithStyle($headings, new Style(fontBold: true)));

        foreach ($sample as $cells) {
            $writer->addRow(Row::fromValues($cells));
        }
        unset($sample);

        while ($rows->valid()) {
            $writer->addRow(Row::fromValues(self::cells($rows->current())));
            $rows->next();
        }

        $writer->close();

        return response()->download($path, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend();
    }

    /**
     * Numeric strings become numbers (as maatwebsite's default value binder did), except values
     * whose leading zero matters, such as phone numbers.
     */
    private static function cells(array $row): array
    {
        return array_map(function ($value) {
            if (! is_string($value) || ! is_numeric($value) || strlen($value) > 15) {
                return $value;
            }

            if (preg_match('/^-?0\d/', $value) || ! preg_match('/^-?\d*\.?\d+$/', $value)) {
                return $value;
            }

            return str_contains($value, '.') ? (float) $value : (int) $value;
        }, array_values($row));
    }

    /** @return array<int, float> 1-based column index => width */
    private static function columnWidths(array $headings, array $sample): array
    {
        $widths = [];
        foreach (array_values($headings) as $i => $heading) {
            $longest = mb_strlen((string) $heading);
            foreach ($sample as $cells) {
                $longest = max($longest, mb_strlen((string) ($cells[$i] ?? '')));
            }
            $widths[$i + 1] = min(self::MAX_COLUMN_WIDTH, $longest + 2);
        }

        return $widths;
    }
}
