<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\MyCompany;
use App\Models\ReturnReport;
use App\Models\ReturnReportItem;
use App\Models\ReturnReportItemDisease;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function returnReportPdf($id)
    {
        $returnReport = ReturnReport::with('logistic')->with('client')->with('country')->with('returnReportItems')->find($id);
        $returnReportItems = ReturnReportItem::with('diseases')->where('return_report_id', $returnReport->id)->get();
        // dd($returnReport);
        $myCompany = MyCompany::first();
        $returnReportPdf = Pdf::loadView('pdfs.returnReport', compact(
            'returnReport', 'returnReportItems', 'myCompany'
        ));
        return $returnReportPdf->setPaper('a4', 'landscape')->stream();
        
        // dd($returnReport);
    }

    public function qualityControlReportPdf($id)
    {
        $returnReportItem = ReturnReportItem::with('farm')->find($id);
        $returnReport = ReturnReport::with('logistic')->with('client')->with('returnReportItems')->find($returnReportItem->return_report_id);
        $diseasesApariencia = Disease::with(array('return_report_items_diseases' => function($query) use ($id){
            $query->select()->where('return_report_item_id', $id);
        }))->where('type', 'Apariencia')->orderBy('name','asc')->get();
        $diseasesFlor = Disease::with(array('return_report_items_diseases' => function($query) use ($id){
            $query->select()->where('return_report_item_id', $id);
        }))->where('type', 'Flor')->orderBy('name','asc')->get();
        $diseasesSanidad = Disease::with(array('return_report_items_diseases' => function($query) use ($id){
            $query->select()->where('return_report_item_id', $id);
        }))->where('type', 'Sanidad')->orderBy('name','asc')->get();
        $diseasesEnfermedades = Disease::with(array('return_report_items_diseases' => function($query) use ($id){
            $query->select()->where('return_report_item_id', $id);
        }))->where('type', 'Enfermedades')->orderBy('name','asc')->get();
        $diseasesTallos = Disease::with(array('return_report_items_diseases' => function($query) use ($id){
            $query->select()->where('return_report_item_id', $id);
        }))->where('type', 'Tallos')->orderBy('name','asc')->get();
        $diseasesFollaje = Disease::with(array('return_report_items_diseases' => function($query) use ($id){
            $query->select()->where('return_report_item_id', $id);
        }))->where('type', 'Follaje')->orderBy('name','asc')->get();
        $diseasesEmpaque = Disease::with(array('return_report_items_diseases' => function($query) use ($id){
            $query->select()->where('return_report_item_id', $id);
        }))->where('type', 'Empaque')->orderBy('name','asc')->get();
        $images = ReturnReportItem::select('images')->orderBy('images', 'asc')->find($id);
        $arrayImages = array_reverse($images->images);
        $diseasesItems = ReturnReportItemDisease::with('disease')->with('returnReportItem')->where('return_report_item_id', $returnReportItem->id)->get();
        $myCompany = MyCompany::first();
        // dd($returnReport);

        $returnReportPdf = Pdf::loadView('pdfs.' . $myCompany->model_pdf . '.qualityControlReport', compact(
            'returnReportItem', 'returnReport', 'diseasesApariencia', 'diseasesFlor', 'diseasesSanidad', 'diseasesTallos',
            'diseasesFollaje', 'diseasesEmpaque', 'arrayImages', 'diseasesItems', 'myCompany', 'diseasesEnfermedades'
        ));
        return $returnReportPdf->stream();
    }
}
