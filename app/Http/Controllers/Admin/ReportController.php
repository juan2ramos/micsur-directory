<?php

namespace Directory\Http\Controllers\Admin;

use Directory\Entities\Country;
use Directory\Http\Controllers\Controller;
use Directory\Entities\Client;
use Illuminate\Http\Request;

use Directory\Http\Requests;
use Jenssegers\Date\Date;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    function usersExcel()
    {

        $date = Date::now()->format('l j F H:i:s');

        Excel::create('reporte' . $date, function ($excel) {

            $clients = Client::with('user', 'sectors')->get();

            $excel->sheet('reporte', function ($sheet) use ($clients) {
                $i = 1;
                $sheet->appendRow(0, [
                    'Nombre',
                    'Apellido',
                    'Número de identificación',
                    'País',
                    'Dirección',
                    'Empresa',
                    'Sector',
                    'Actividad',
                    'Dirección',
                    'Sitio web',
                    'Teléfono móvi',
                    'Teléfono fijo',
                    'Ruta imagen'
                ]);
                foreach ($clients as $client) {

                    $sectorName = "";
                    foreach ($client->sectors as $sector) {
                        $sectorName .= $sector->name . ',';
                    }

                    $mobile = ($client->mobile)?implode("", $client->mobile):'';
                    $phone = ($client->mobile)?implode("", $client->phone):'';
                    $sheet->appendRow($i, [
                        $client->user->name,
                        $client->user['last-name'],
                        $client->user['identification-number'],
                        Country::find($client->country)->name,
                        $client->address,
                        $client->company,
                        $sectorName,
                        $client->activities,
                        $client->address,
                        $client->website,
                        $mobile,
                        $phone,
                        $client->user['image-profile'],
                    ]);

                    $i++;
                }
            });
        })->export('xls');
    }
}
