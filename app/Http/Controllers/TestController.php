<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Types_caissons;
use App\Models\Types_vehicules;
=======
use App\Models\Communes;
>>>>>>> 750d7a3917ed6fdc87938f1e34d57aaf135b069f
use Illuminate\Http\Request;

class TestController extends Controller
{
<<<<<<< HEAD
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
            $file = public_path('file/test.csv');

            $customerArr = $this->csvToArray($file);

            for ($i = 0; $i < count($customerArr); $i ++)
            {
                User::firstOrCreate($customerArr[$i]);
            }

            return 'Jobi done or what ever';
        }

=======
    function index(){
        $communes = Communes::all();
       return view('index',['communes'=> $communes]);
    }
>>>>>>> 750d7a3917ed6fdc87938f1e34d57aaf135b069f
}
