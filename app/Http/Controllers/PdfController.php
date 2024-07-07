<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{
    public function CrearReporte(User $user){

       
        $pdf = Pdf::loadView('example')->setPaper('A4', 'landscape');
        return $pdf->download('example.pdf');
    }
}
