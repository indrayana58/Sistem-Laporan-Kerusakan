<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapExport implements FromCollection, WithHeadings
{
    protected $laporans;

    public function __construct(Collection $laporans)
    {
        $this->laporans = $laporans;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->laporans;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nomor HP',
            'Nama Barang',
            'Lokasi',
            'Tanggal',
            'Keterangan',
        ];
    }
}
