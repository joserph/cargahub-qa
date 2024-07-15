<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-size: 1em;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 1cm 1cm 1cm;
        }
        h1 {
            position: relative;
            /* width: 90%; */
            top: -30px;
            /* color: rgb(25, 25, 33); */
            background-color: #72BF6A;
            color: white;
            text-align: center;
            text-align: center;
            /* font-size: 20px; */
        }
        .text-center{
            text-align: center;
        }
        .img{
            position: relative;
            width: 10%;
            display: inline-block;
            height: 80px;
            max-width: 125px;
            margin: 10px;
            text-align: center;
            margin: 0 auto;
            top: -10px;
        }
        .table-cabecera{
            position: relative;
            top: -30px;
            display: inline-block;
            width: 89%;
        }
        .calificacion{
            position: relative;
            top: -30px;
            width: 10%;
            display: inline-block;
        }
        .text-large{
            font-size: 14px;
        }
        .text-large-xl{
            font-size: 20px;
        }
        .text-medium{
            font-size: 12px;
        }
        .text-small{
            font-size: 9px;
        }
        .text-small-sx{
            font-size: 6px;
        }
        .t-cabecera{
            width: 100%;
            margin: auto;
            border-collapse: collapse;
        }
        .text-right{
            text-align: right;
        }
        .table-progress {
            font-size: 20px;
            width: 100%;
            margin: auto;
            border-collapse: collapse;
        }
        .progress{
            position: absolute;
            width: 90%;
            top: 130px;
        }
        .progress-part-1{
            background-color: green;
            width: 20%;
            border: 1px solid black;
        }
        .progress-part-2{
            background-color: orange;
            width: 30%;
            border: 1px solid black;
        }
        .progress-part-3{
            background-color: red;
            width: 50%;
            border: 1px solid black;
        }
        .diseases-apariencia{
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 18%;
        }
        .diseases-flor{
            position: absolute;
            top: 150px;
            left: 182px;
            display: inline-block;
            width: 18%;
        }
        .diseases-sanidad{
            position: absolute;
            top: 150px;
            left: 614px;
            display: inline-block;
            width: 18%;
        }
        .diseases-tallos{
            position: absolute;
            top: 150px;
            left: 470px;
            display: inline-block;
            width: 18%;
        }
        .diseases-follaje{
            position: absolute;
            top: 150px;
            left: 326px;
            display: inline-block;
            width: 18%;
        }
        .diseases-empaque{
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 18%;
        }
        .table-enfermedades{
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            
            /* border: 1px solid black; */
        }
        .th-enfermedad{
            border: 1px solid black;
        }
        span{
            content: "\2713";
        }
        .check-icon{
            width: 8px;
            margin: auto;
            margin-left: 7px;
        }
        .check-icon-2{
            width: 12px;
            margin: auto;
            margin-left: 9px;
        }
        .check-icon-3{
            /* padding-top: 10px; */
            width: 20px;
            margin: auto;
            margin-left: 9px;
        }
        .x-icon{
            width: 7px;
            margin: auto;
            margin-left: 7px;
        }
        .capitalize{
            text-transform: capitalize;
        }
        .lowercase{
            text-transform: lowercase;
        }
        .uppercase{
            text-transform: uppercase;
        }
        .treinta{
            width: 30%;
        }
        .cincuenta{
            width: 50%;
        }
        .diez{
            width: 10%;
        }
        .azul{
            color: white;
            background-color: rgb(60, 60, 240);
        }
        .verde{
            background-color: rgb(2, 210, 2);
        }
        .verde-base{
            background-color: #72BF6A;
        }
        .rojo{
            background-color: rgb(192, 1, 1);
            /* content: url('../../../public/storage/icons/x-solid.svg'); */
        }
        .observacion{
            background-color: red;
            position: absolute;
            top: 360px;
            width: 45%;
            padding-left: 10px;
            padding-top: 5px;
        }
        .text-observacion{
            height: 20px;
            font-size: 12px;
            padding: 0;
            margin: 0;
            color: white;
        }
        .imagenes{
            position: absolute;
            top: 430px;
            width: 90%;
            border: 1px solid black;
            padding-top: 25px;
            padding-left: 5px;
            padding-bottom: 5px;
        }
        .foto{
            width: 19.4%;
            height: 100px;
            top: 10px;
        }
        .img_size{
            width: 60px;
        }
        footer {
            position: fixed;
            bottom: -10px;
            left: 0px;
            right: 0px;
            height: 50px;
            background-color: #18908d;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        .red-percent{
            background-color: red;
            /* padding: 5px; */
        }
        .yellow-percent{
            background-color: orange;
            /* padding: 5px; */
        }
        .green-percent{
            background-color: green;
            /* padding: 5px; */
        }
        .border-line{
            border: 1px solid black;
        }
        .border-line-1{
            border: 1px solid black;
            width: 15px;
        }
        .titulo-foto{
            position: absolute;
            top: 380px;
            text-align: center;
            background-color: #18908d;
            width: 91%;
            height: 50px;
            font-size: 18px;
            padding: 0;
            margin: 0;
        }
        .calificacion-size{
            width: 170px;
        }
    </style>
</head>
<body>
    <h1 class="text-center text-large-xl">Control de Calidad {{ $myCompany->tradename }}</h1>
    <section>
        <article class="img">
            <img class="img_size" src="{{ public_path('storage/'. $myCompany->image_url) }}" alt="">
        </article>
        <article class="table-cabecera">
            <table class="t-cabecera">
                <tr>
                    <td class="text-small text-right"><strong>FINCA:</strong></td>
                    <td class="text-small">{{ $returnReportItem->farm->name }}</td>
                    <td class="text-small text-right"><strong>DIA DE  INSPECCION:</strong></td>
                    <td class="text-small">{{ date('d-m-Y', strtotime($returnReport->date)) }}</td>
                    <td class="border-line text-small text-center progress-part-1 calificacion-size" colspan="2"><strong>100% Excelente</strong></td>
                </tr>
                <tr>
                    <td class="text-small text-right"><strong>CLIENTE:</strong></td>
                    <td class="text-small">{{ $returnReportItem->dialing->name }}</td>
                    <td class="text-small text-right"><strong>PRODUCTO:</strong></td>
                    <td class="text-small">{{ $returnReportItem->product->name }}</td>
                    <td class="border-line text-small text-center progress-part-2" colspan="2"><strong>95-91% Muy bueno</strong></td>
                </tr>
                <tr>
                    <td class="text-small text-right"><strong>DESTINO:</strong></td>
                    <td class="text-small">{{ $returnReport->country->name }}</td>
                    <td class="text-small text-right"><strong>VARIEDAD:</strong></td>
                    <td class="text-small">{{ $returnReportItem->variety->name }}</td>
                    <td class="border-line text-small text-center progress-part-3" colspan="2"><strong>90-80% Devolucion finca</strong></td>
                </tr>
                <tr>
                    <td class="text-small text-right"><strong>AGENCIA DE CARGA:</strong></td>
                    <td class="text-small">{{ $returnReport->logistic->name }}</td>
                    <td class="text-small text-right"><strong>EMPAQUE:</strong></td>
                    <td class="text-small">{{ $returnReportItem->packing }}</td>
                    <td class="border-line-1 text-small text-center" rowspan="2"><strong>%</strong></td>
                    @if ($returnReportItem->qualification >= 96)
                    <td class="border-line text-small text-center green-percent">
                        <strong>
                            <span>{{ $returnReportItem->qualification }}%</span>
                        </strong>
                    </td>
                    @elseif($returnReportItem->qualification >= 91 && $returnReportItem->qualification <= 95)
                    <td class="border-line text-small text-center yellow-percent">
                        <strong>
                            <span>{{ $returnReportItem->qualification }}%</span>
                        </strong>
                    </td>
                    @else
                    <td class="border-line text-small text-center red-percent">
                        <strong>
                            <span>{{ $returnReportItem->qualification }}%</span>
                        </strong>
                    </td>
                    @endif
                </tr>
                <tr>
                    <td class="text-small text-right"><strong>HAWB:</strong></td>
                    <td class="text-small">{{ $returnReportItem->hawb }}</td>
                    <td class="text-small text-right"><strong>INSPECTED BY:</strong></td>
                    <td class="text-small">{{ $myCompany->tradename }}</td>
                    <td class="border-line text-small text-center"><strong>Calificacion Finca</strong></td>
                </tr>
            </table>
        </article>
    </section>
    <section class="progress">
        <table class="table-progress">
            <th class="">
                <td class="text-center text-large verde-base">
                    <img class="check-icon-2" src="{{ public_path('storage/icons/sign.png') }}" alt="">
                    {{ $myCompany->email }}
                </td>
                <td class="text-center text-large verde-base">Componentes de control de calidad</td>
                <td class="text-center text-large verde-base">
                    <img class="check-icon-2" src="{{ public_path('storage/icons/phone.png') }}" alt="">
                    {{ $myCompany->phone }}
                </td>
            </th>
        </table>
    </section>
    <section class="diseases-empaque">
        <table class="table-enfermedades">
            <tr class="verde-base">
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad cincuenta">EMPAQUE</th>
            </tr>
            @foreach ($diseasesEmpaque as $item)
                <tr>
                    <td class="text-small-sx th-enfermedad text-center
                        @if ($item->return_report_items_diseases == '[]')
                            verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                        
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    {{ $disease->percentage }}
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx">{{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </section>
    {{-- <section class="diseases-apariencia">
        <table class="table-enfermedades">
            <tr class="azul">
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad cincuenta">APARIENCIA</th>
            </tr>
            @foreach ($diseasesApariencia as $item)
                <tr>
                    <td class="text-small-sx th-enfermedad
                            @if ($item->return_report_items_diseases == '[]')
                            verde
                            @else
                                @foreach ($item->return_report_items_diseases as $disease)
                                    @if ($disease->return_report_item_id == $returnReportItem->id)
                                        rojo
                                    @else
                                        verde
                                    @endif
                                @endforeach
                            @endif
                        ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    {{ $disease->percentage }}
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx">{{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </section> --}}
    <section class="diseases-flor">
        <table class="table-enfermedades">
            <tr class="verde-base">
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad cincuenta">FLORES</th>
            </tr>
            @foreach ($diseasesFlor as $item)
                <tr>
                    <td class="text-small-sx th-enfermedad text-center
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    {{ $disease->percentage }}
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx">{{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="diseases-follaje">
        <table class="table-enfermedades">
            <tr class="verde-base">
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad cincuenta">FOLLAJE</th>
            </tr>
            @foreach ($diseasesFollaje as $item)
                <tr>
                    <td class="text-small-sx th-enfermedad text-center
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    {{ $disease->percentage }}
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx">{{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="diseases-tallos">
        <table class="table-enfermedades">
            <tr class="verde-base">
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad cincuenta">TALLOS</th>
            </tr>
            @foreach ($diseasesTallos as $item)
                <tr>
                    <td class="text-small-sx th-enfermedad text-center
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                {{ $disease->percentage }}
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx">{{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="diseases-sanidad">
        <table class="table-enfermedades">
            <tr class="verde-base">
                <th class="text-small th-enfermedad diez">%</th>
                <th class="text-small th-enfermedad cincuenta">ENFERMEDAD</th>
            </tr>
            @foreach ($diseasesEnfermedades as $item)
                <tr>
                    <td class="text-small-sx th-enfermedad text-center
                        @if ($item->return_report_items_diseases == '[]')
                        verde
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    rojo
                                @else
                                    verde
                                @endif
                            @endforeach
                        @endif
                    ">
                        @if ($item->return_report_items_diseases == '[]')
                            <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                        @else
                            @foreach ($item->return_report_items_diseases as $disease)
                                @if ($disease->return_report_item_id == $returnReportItem->id)
                                    {{ $disease->percentage }}
                                @else
                                    <img class="check-icon" src="{{ public_path('storage/icons/check-solid.svg') }}" alt="">
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="text-small-sx">{{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </section>
    @if ($returnReport->type_report == 'devolucion')
    <section class="observacion">
        <p class="text-observacion uppercase">Observaciones: {{ $returnReportItem->piece }} {{ $returnReportItem->type_piece }} en devolucion</p>
    </section>
    @endif
    
    <section class="titulo-foto">
        <p class="text-center">
            <img class="check-icon-3" src="{{ public_path('storage/icons/camera.png') }}" alt="">
            Respaldo fotografico
        </p>
    </section>
    <section class="imagenes">
        @if ($arrayImages)
            @foreach ($arrayImages as $item)
                <img class="foto" src="{{ public_path('storage/'. $item) }}" alt="">
            @endforeach
        @endif
    </section>
    <footer class="text-center">
        Copyright © <?php echo date("Y");?> - {{ $myCompany->name }}
    </footer>
</body>
</html>