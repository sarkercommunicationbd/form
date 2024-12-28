<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Registration::select('id','full_name', 'email', 'phone', 'address', 'billing','nid','iptsp','reff','type', 'created_at', 'updated_at' )
            ->where('status' , null)
            ->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Phone',
            'Permanent Address',
            'Present Address',
            'NID',
            'IPTSP Number',
            'Marketing Manager',
            'Registration Type',
            'created_at',
            'updated_at',
        ];
    }
}



