<?php

namespace App\Http\Controllers;

use App\Models\Fonctions;
use App\Models\Types_caissons;
use App\Models\Types_vehicules;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
        public function index(){
            $types_vehicules = Types_vehicules::all();
            $types_caissons = Types_caissons::all();

        }

        function csvToArray($filename = '', $delimiter = ','){

            if (!file_exists($filename) || !is_readable($filename))
                return false;

            $header = null;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== false)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
                {
                    if (!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }

            return $data;
        }

        public function importCsv(){
            $file = public_path('testcaisson.csv');


            $customerArr = $this->csvToArray($file);

            // for ($i = 0; $i < count($customerArr); $i ++)
            // {
            //     if ($customerArr[i]  ==) {
            //         # code...
            //     }
            //     User::firstOrCreate($customerArr[$i]);
            // }

            dd($customerArr);
        }

}
