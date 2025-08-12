<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Sample data with possible UTF-8 characters
        $title = "Laravel PDF Export Example – नमस्ते 👋";
        $description = "This PDF was generated using DomPDF in Laravel.";
        $date = date('Y-m-d');

        // Ensure proper encoding
        $data = [
            'title' => mb_convert_encoding($title, 'UTF-8', 'UTF-8'),
            'description' => mb_convert_encoding($description, 'UTF-8', 'UTF-8'),
            'date' => $date,
        ];

        // Load the view and generate PDF
        $pdf = Pdf::loadView('pdf_template', $data);

        // Download the file
        return $pdf->download('sample.pdf');
    }
}
