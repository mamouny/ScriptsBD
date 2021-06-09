<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Types_caissons;
use App\Models\Types_vehicules;

use App\Models\Communes;
use App\Models\Data;
use App\Models\User;
=======
use App\Models\Communes;
use App\Models\emplacements;
use App\Models\Fonctions;
use App\Models\Types_caissons;
use App\Models\Types_vehicules;
use App\Models\User;
use App\Models\zones;
>>>>>>> refs/remotes/origin/master
use Illuminate\Http\Request;

class TestController extends Controller
{
<<<<<<< HEAD
    public function index(){
        $types_vehicules = Types_vehicules::all();
        $types_caissons = Types_caissons::all();
        $data = Data::all();
        dd($data);

    }

=======
        public function index(){
            $types_vehicules = Types_vehicules::all();
            $types_caissons = Types_caissons::all();
>>>>>>> refs/remotes/origin/master

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
<<<<<<< HEAD

            $customerArr = $this->csvToArray($file);
            // for ($i = 0; $i < count($customerArr); $i ++)
            // {
            //     User::firstOrCreate($customerArr[$i]);
            // }

            //dd($customerArr);
=======
            $data = $this->csvToArray($file);

            // dd($data[1]["COMMUNE"]);
            $communeTz = Communes::all();

            // $commune = Communes::where('libelle',"=",$communeTz)->get();
            // $zones = zones::where('commune_id','=',$commune->id)->get();

            dd($communeTz);
            // if ($data[1]["COMMUNE"] == "TZ") {

            // }

            // for ($i = 0; $i < count($data); $i ++)
            // {

            //     // User::firstOrCreate($data[$i]);
            // }
            // dd($data);
>>>>>>> refs/remotes/origin/master

        }

}
