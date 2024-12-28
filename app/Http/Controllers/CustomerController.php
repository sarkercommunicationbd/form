<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Exports\CustomerExportApprove;
use App\Exports\CustomerExportDecline;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function exportDataInExcel(Request $request)
    {
        if($request->type == 'xlsx'){

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        elseif($request->type == 'csv'){

            $fileExt = 'csv';
            $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        }
        elseif($request->type == 'xls'){

            $fileExt = 'xls';
            $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        }
        else{

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }


        $filename = "customers-".date('d-m-Y').".".$fileExt;
        return Excel::download(new CustomerExport, $filename, $exportFormat);
    }




    public function exportDataInExcelapprove(Request $request)
    {
        if($request->type == 'xlsx'){

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        elseif($request->type == 'csv'){

            $fileExt = 'csv';
            $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        }
        elseif($request->type == 'xls'){

            $fileExt = 'xls';
            $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        }
        else{

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }


        $filename = "customers-".date('d-m-Y').".".$fileExt;
        return Excel::download(new CustomerExportApprove, $filename, $exportFormat);
    }




    public function exportDataInExceldecline(Request $request)
    {
        if($request->type == 'xlsx'){

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        elseif($request->type == 'csv'){

            $fileExt = 'csv';
            $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        }
        elseif($request->type == 'xls'){

            $fileExt = 'xls';
            $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        }
        else{

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }


        $filename = "customers-".date('d-m-Y').".".$fileExt;
        return Excel::download(new CustomerExportDecline, $filename, $exportFormat);
    }
}
