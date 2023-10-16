<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\CutProducts;

class CutIntoProductsClear extends Component
{
    public $filia;
    public function clear()
    {
        $this->success = CutProducts::truncate();
        $this->dispatchBrowserEvent('Swal:modal', [
            'type' => 'success',
            'title' => 'Os cortes foram apagados!',
            'text' => 'Todos os cortes foram apagados com sucesso! (A&E)(P&F)',
        ]);
    }
    public function render()
    {
        return view('registros.cut-into-products-clear');
    }
    public function exportCSVPeF()
    {
       $fileName = 'cutProductsPeF.csv';
       $cutProductsPeF = CutProducts::where('filial', 1)->get();
    
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = array('EAN', 'Qty');
    
            $callback = function() use($cutProductsPeF, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($cutProductsPeF as $cutProducts) {
                    $row['EAN']  = $cutProducts->EAN;
                    $row['Qty']    = $cutProducts->Qty;
    
                    fputcsv($file, array($row['EAN'], $row['Qty']));
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }
        public function exportCSVAeE()
        {
           $fileName = 'CortesAeE.csv';
           $cutProductsPeF = CutProducts::where('filial', 2)->get();
        
                $headers = array(
                    "Content-type"        => "text/csv",
                    "Content-Disposition" => "attachment; filename=$fileName",
                    "Pragma"              => "no-cache",
                    "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                    "Expires"             => "0"
                );
        
                $columns = array('EAN', 'Qty');
        
                $callback = function() use($cutProductsPeF, $columns) {
                    $file = fopen('php://output', 'w');
                    fputcsv($file, $columns);
        
                    foreach ($cutProductsPeF as $cutProducts) {
                        $row['EAN']  = $cutProducts->EAN;
                        $row['Qty']    = $cutProducts->Qty;
        
                        fputcsv($file, array($row['EAN'], $row['Qty']));
                    }
        
                    fclose($file);
                };
        
                return response()->stream($callback, 200, $headers);
            }
}
