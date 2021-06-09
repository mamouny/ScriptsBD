<?php

namespace App\Http\Controllers;

use App\Models\Caissons;
use App\Models\Communes;
use App\Models\emplacements;
use App\Models\emplacements_caissons;
use App\Models\zones;
use Illuminate\Http\Request;

class TestController extends Controller
{
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


    public function insertEmplacements(){
        $file = public_path('testcaisson.csv');
        $data = $this->csvToArray($file);
        // dd($data[1]["COMMUNE"]);
        // $communeTz = "TZ";
            for ($i = 0; $i < count($data); $i ++)
            {
                if ($data[$i]["COMMUNE"] == "TZ") {

                    if($data[$i]["Zone"] == "TVZ 1")
                    {
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 1,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'description'=> ""
                        ]);
                        //insert caisson de type CB
                        if($data[$i]["CB"] != ""){
                            $nbCB = $data[$i]["CB"];
                            for ($j=0,$o=1; $j < $nbCB; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CB-".$i,
                                    'type_caisson_id'=> 1,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CS
                        if($data[$i]["CS"] != ""){
                            $nbCS = $data[$i]["CS"];
                            for ($j=0,$o=1; $j < $nbCS; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CS-".$i,
                                    'type_caisson_id'=> 2,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CT
                        if($data[$i]["CT"] != ""){
                            $nbCT = $data[$i]["CT"];
                            for ($j=0,$o=1; $j < $nbCT; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CT-".$i,
                                    'type_caisson_id'=> 3,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }
                    }
                    if($data[$i]["Zone"] == "TVZ 2")
                    {
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 2,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'description'=> ""
                        ]);
                        //insert caisson de type CB
                        if($data[$i]["CB"] != ""){
                            $nbCB = $data[$i]["CB"];
                            for ($j=0,$o=1; $j < $nbCB; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CB-".$i,
                                    'type_caisson_id'=> 1,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CS
                        if($data[$i]["CS"] != ""){
                            $nbCS = $data[$i]["CS"];
                            for ($j=0,$o=1; $j < $nbCS; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CS-".$i,
                                    'type_caisson_id'=> 2,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CT
                        if($data[$i]["CT"] != ""){
                            $nbCT = $data[$i]["CT"];
                            for ($j=0,$o=1; $j < $nbCT; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CT-".$i,
                                    'type_caisson_id'=> 3,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }
                    }
                    if($data[$i]["Zone"] == "TVZ 3")
                    {
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 3,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'description'=> ""
                        ]);

                        //insert caisson de type CB
                        if($data[$i]["CB"] != ""){
                            $nbCB = $data[$i]["CB"];
                            for ($j=0,$o=1; $j < $nbCB; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CB-".$i,
                                    'type_caisson_id'=> 1,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CS
                        if($data[$i]["CS"] != ""){
                            $nbCS = $data[$i]["CS"];
                            for ($j=0,$o=1; $j < $nbCS; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CS-".$i,
                                    'type_caisson_id'=> 2,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CT
                        if($data[$i]["CT"] != ""){
                            $nbCT = $data[$i]["CT"];
                            for ($j=0,$o=1; $j < $nbCT; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CT-".$i,
                                    'type_caisson_id'=> 3,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }
                    }
                    // User::firstOrCreate($data[$i]);
                 }
                 if ($data[$i]["COMMUNE"] == "SEBKHA") {
                    $emplacements = emplacements::create([
                        'code'=> $data[$i]["EMP"],
                        'libelle'=> $data[$i]["Nom emp fr"],
                        'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                        'zone_id'=> 6,
                        'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                        'etat'=> "",
                        'priorite_id'=> 1,
                        'description'=> ""                    
                    ]);
                    // User::firstOrCreate($data[$i]);
                    //insert caisson de type CB
                    if($data[$i]["CB"] != ""){
                        $nbCB = $data[$i]["CB"];
                        for ($j=0,$o=1; $j < $nbCB; $j++,$o++) { 
                            $caissons = Caissons::create([
                                'code'=> "CB-".$i,
                                'type_caisson_id'=> 1,
                                'date_acquisition'=> null,
                                'volume'=> null,
                                'cout_acquisition'=> null,
                            ]);
                            $emplacementcaissons = emplacements_caissons::create([
                                'emplacement_id'=> $emplacements->id,
                                'caisson_id'=> $caissons->id,
                                'ordre'=> $o,
                            ]);
                        }
                        
                    }

                    //insert caisson de type CS
                    if($data[$i]["CS"] != ""){
                        $nbCS = $data[$i]["CS"];
                        for ($j=0,$o=1; $j < $nbCS; $j++,$o++) { 
                            $caissons = Caissons::create([
                                'code'=> "CS-".$i,
                                'type_caisson_id'=> 2,
                                'date_acquisition'=> null,
                                'volume'=> null,
                                'cout_acquisition'=> null,
                            ]);
                            $emplacementcaissons = emplacements_caissons::create([
                                'emplacement_id'=> $emplacements->id,
                                'caisson_id'=> $caissons->id,
                                'ordre'=> $o,
                            ]);
                        }
                        
                    }

                    //insert caisson de type CT
                    if($data[$i]["CT"] != ""){
                        $nbCT = $data[$i]["CT"];
                        for ($j=0,$o=1; $j < $nbCT; $j++,$o++) { 
                            $caissons = Caissons::create([
                                'code'=> "CT-".$i,
                                'type_caisson_id'=> 3,
                                'date_acquisition'=> null,
                                'volume'=> null,
                                'cout_acquisition'=> null,
                            ]);
                            $emplacementcaissons = emplacements_caissons::create([
                                'emplacement_id'=> $emplacements->id,
                                'caisson_id'=> $caissons->id,
                                'ordre'=> $o,
                            ]);
                        }
                        
                    }
                 }
                 if ($data[$i]["COMMUNE"] == "KSAR") {
                    
                    if($data[$i]["Zone"] == "KSAR 1")
                    {
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 4,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'description'=> ""
                        ]);
                        
                        //insert caisson de type CB
                        if($data[$i]["CB"] != ""){
                            $nbCB = $data[$i]["CB"];
                            for ($j=0,$o=1; $j < $nbCB; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CB-".$i,
                                    'type_caisson_id'=> 1,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CS
                        if($data[$i]["CS"] != ""){
                            $nbCS = $data[$i]["CS"];
                            for ($j=0,$o=1; $j < $nbCS; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CS-".$i,
                                    'type_caisson_id'=> 2,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CT
                        if($data[$i]["CT"] != ""){
                            $nbCT = $data[$i]["CT"];
                            for ($j=0,$o=1; $j < $nbCT; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CT-".$i,
                                    'type_caisson_id'=> 3,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }
                    }
                    if($data[$i]["Zone"] == "KSAR 2")
                    {
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 5,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'description'=> ""
                        ]);
                        
                        //insert caisson de type CB
                        if($data[$i]["CB"] != ""){
                            $nbCB = $data[$i]["CB"];
                            for ($j=0,$o=1; $j < $nbCB; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CB-".$i,
                                    'type_caisson_id'=> 1,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CS
                        if($data[$i]["CS"] != ""){
                            $nbCS = $data[$i]["CS"];
                            for ($j=0,$o=1; $j < $nbCS; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CS-".$i,
                                    'type_caisson_id'=> 2,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                        //insert caisson de type CT
                        if($data[$i]["CT"] != ""){
                            $nbCT = $data[$i]["CT"];
                            for ($j=0,$o=1; $j < $nbCT; $j++,$o++) { 
                                $caissons = Caissons::create([
                                    'code'=> "CT-".$i,
                                    'type_caisson_id'=> 3,
                                    'date_acquisition'=> null,
                                    'volume'=> null,
                                    'cout_acquisition'=> null,
                                ]);
                                $emplacementcaissons = emplacements_caissons::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'caisson_id'=> $caissons->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        }

                    }
                    // User::firstOrCreate($data[$i]);
                 }

            }      
         return "ok";
    }


    public function insertAgents(){
        $file = public_path('testcaisson.csv');
        $data = $this->csvToArray($file);
    }
}
