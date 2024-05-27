<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/personal');
});
Route::get('return-report-pdf/{id}', [PdfController::class, 'returnReportPdf'])->name('return-report.pdf');
Route::get('quality-control-report-pdf/{id}', [PdfController::class, 'qualityControlReportPdf'])->name('quality-control-report.pdf');