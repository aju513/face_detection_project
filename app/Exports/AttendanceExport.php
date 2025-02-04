<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromQuery, WithMapping, WithHeadings
{

    private $query;

    public function __construct($query)
    {
        $this->query = $query;

    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {

        return [
            'Name',
            'Date',
            'Day',
            'Time'
        ];
    }

    public function map($row): array
    {
        // dd($row);
        return [
            $row->studentSubject?->student->name,
            $row->created_at,
            \Carbon\Carbon::parse($row->created_at)->diffInDays(now()),
            \Carbon\Carbon::parse($row->created_at)->format('H:i:s')
        ];
    }
}
