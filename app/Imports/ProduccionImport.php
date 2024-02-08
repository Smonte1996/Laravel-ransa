<?php

namespace App\Imports;

use App\Models\Produccione;
use Concerns\SkipsOnError;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProduccionImport implements ToModel, WithHeadingRow
// Importable, WithHeadings, WithValidation
{
    use Importable;

    public $categoria_id;

    public function __construct($id)
    {
        $this->categoria_id = $id;
    }

    // public function headings(): array
    // {
    //     return [
    //         'name',
    //         'price',
    //         'description',
    //     ];
    // }

    // public function rules(): array
    // {
    //     return [
    //         'sku' => 'required',
    //         'descripcion' => 'required|numeric',
    //         'cantidad' => 'required',
    //     ];
    // }


    public function model(Array $row)
    {
        return new Produccione([
        'cabecera_id' => $this->categoria_id,
        'sku' => $row['sku'],
        'descripcion' => $row['descripcion'],
        'cantidad' => $row['cantidad'],
        'fecha' => $row['fecha'],
        'precio' => $row['precio'],
    ]);
        // Asigna el id de la categoría
    }
}
