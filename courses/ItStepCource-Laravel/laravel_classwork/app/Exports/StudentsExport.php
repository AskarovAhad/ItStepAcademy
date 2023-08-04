<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

//  Column widths
use Maatwebsite\Excel\Concerns\WithColumnWidths;
// Custom start cell
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

// Adding a single drawing
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


// Подключения модели StudentsModel
use App\Models\StudentsModel;

class StudentsExport implements FromCollection,
                                WithHeadings, // Headings
                                WithColumnWidths, //  Column widths
                                WithCustomStartCell, // Custom start cell
                                WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return StudentsModel::select('name', 'surname', 'age', 'address')->get();
    }


    // Загаловки
    public function headings(): array
    {
        return [
            'name',
            'surname',
            'age',
            'address'
        ];
    }

    //  Column widths
    public function columnWidths(): array
    {
        return [
            'A' => 15, //name
            'B' => 15, //surname
            'C' => 8, //age
            'D' => 60, // address
        ];
    }

    // Custom start cell
    public function startCell(): string
    {
        return 'A10';
    }



    //Adding a single drawing
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/itsteps_logo.jpg'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B2');

        return $drawing;
    }


}
