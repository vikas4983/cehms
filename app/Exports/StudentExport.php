<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $students;
    public function __construct($students)
    {
        $this->students = $students;
    }

    public function collection()
    {
        return $this->students;
    }
    public function map($student): array
    {
        return [$student->name, $student->email, $student->dob, $student->practitioner_registration, $student->mobile, $student->gender, $student->qualification];
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Dob', 'Practitioner Registration', 'Mobile Number', 'Gender', 'Qualification'];
    }
}
