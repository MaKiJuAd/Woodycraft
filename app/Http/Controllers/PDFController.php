<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use function Laravel\Prompts\password;
use function Pest\Laravel\get;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::get();
        $data = [
            'title' => 'WELCOME',
            'date' =>date('d/m/Y'),
            'users' => $users,
        ];
        $pdf = PDF::loadView('myPDF',$data);
        return $pdf->download('fichier.pdf');
    }
}
