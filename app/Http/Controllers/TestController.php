<?php

namespace App\Http\Controllers;

use App\Models\agents;
use App\Models\Caissons;
use App\Models\Communes;
use App\Models\emplacements;
use App\Models\emplacements_caissons;
use App\Models\itineraires;
use App\Models\itineraires_emplacements;
use App\Models\zones;
use Illuminate\Http\Request;

class TestController extends Controller
{
    
    function testing(){
        $i=0;
        $idItineraire = itineraires::where('libelle','IT-B'.($i+1))->first();
        if($idItineraire != null){
            dd($idItineraire->id);
        }
        else{
            return "mali";
        }
        
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


    public function insertEmplacements(){
        $file = public_path('testcaisson.csv');
        $data = $this->csvToArray($file);

            for ($i = 0; $i < count($data); $i++)
            {
                // commune TZ
                if ($data[$i]["COMMUNE"] == "TZ") 
                {
                    // Zone TVZ 1
                    if($data[$i]["Zone"] == "TVZ 1")
                    {
                        // insert emplacement
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 1,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'CT' => (int) $data[$i]["CT"],
                            'CB' => (int) $data[$i]["CB"],
                            'CS' => (int) $data[$i]["CS"],
                            'description'=> ""
                        ]);
                        
                        //insert itinéraire BT16 1
                        if($data[$i]["IT B 1"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-B1')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 1"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B1",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 1"],
                                ]);    
                            }

                        } // fin insert itinéraire BT16 1

                        //insert itinéraire BT16 2
                        if($data[$i]["IT B 2"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-B2')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 2"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B2",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 2"],
                                ]);    
                            }   
                        } //insert itinéraire BT16 2

                        //insert itinéraire BT16 3
                        if($data[$i]["IT B 3"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-B3')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 3"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B3",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 3"],
                                ]);    
                            }
                        } //insert itinéraire BT16 3

                        //insert itinéraire CS1 camion
                        if($data[$i]["IT CS 1"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-CS1')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 1"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS1",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 1"],
                                ]);    
                            }    
                        } //fin insert itinéraire CS 1

                        //insert itinéraire CS2 camion
                        if($data[$i]["IT CS 2"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-CS2')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 2"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS2",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 2"],
                                ]);    
                            }  
                        } //fin insert itinéraire CS 2

                        //insert itinéraire CS3 camion
                        if($data[$i]["IT CS 3"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-CS3')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 3"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS3",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 3"],
                                ]);    
                            }
                        } //fin insert itinéraire CS 3

                       /* //insert itinéraire Tricycle
                        if($data[$i]["IT CT 1"] != ""){
                            $nbITCT1 = $data[$i]["IT CT 1"] + $data[$i]["IT CT 2"] + $data[$i]["IT CT 3"]);
                            for ($j=0,$o=1; $j < $nbITCT; $j++,$o++) { 
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CT".$i,
                                    'libelle_ar'=> "",
                                    'type_itineraire_id'=> 3,
                                    'commune_id'=> 1,
                                ]);
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> $o,
                                ]);
                            }
                            
                        } */
                    } //fin insert zone 1

                    //insert zone 2
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
                            'CT' => (int) $data[$i]["CT"],
                            'CB' => (int) $data[$i]["CB"],
                            'CS' => (int) $data[$i]["CS"],
                            'description'=> ""
                        ]);

                        //insert itinéraire BT16 1
                        if($data[$i]["IT B 1"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-B1')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 1"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B1",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 1"],
                                ]);    
                            }

                        } //fin insert itinéraire ITB1 

                        //insert itinéraire BT16 2
                        if($data[$i]["IT B 2"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-B2')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 2"],
                                ]);   
                            }
                            else
                            {
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B2",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 2"],
                                ]);    
                            }      
                        } // fin insert itinéraire BT16 2

                        //insert itinéraire BT16 3
                        if($data[$i]["IT B 3"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-B3')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 3"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B3",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 3"],
                                ]);    
                            }

                            
                        }

                        //insert itinéraire CS1 camion
                        if($data[$i]["IT CS 1"] != "")
                        {
                            $idItineraire = itineraires::where('libelle','IT-CS1')->first();
                            if($idItineraire != null)
                            {
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 1"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS1",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 1"],
                                ]);    
                            }

                            
                        }

                        //insert itinéraire CS2 camion
                        if($data[$i]["IT CS 2"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-CS2')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 2"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS2",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 2"],
                                ]);    
                            }

                            
                        }

                        //insert itinéraire CS3 camion
                        if($data[$i]["IT CS 3"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-CS3')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 3"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS3",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 3"],
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
                            'CT' => (int) $data[$i]["CT"],
                            'CB' => (int) $data[$i]["CB"],
                            'CS' => (int) $data[$i]["CS"],
                            'description'=> ""
                        ]);
                        
                        //insert itinéraire BT16 1
                        if($data[$i]["IT B 1"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-B1')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 1"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B1",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 1"],
                                ]);    
                            }

                        }

                        //insert itinéraire BT16 2
                        if($data[$i]["IT B 2"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-B2')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 2"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B2",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 2"],
                                ]);    
                            }

                            
                        }

                        //insert itinéraire BT16 3
                        if($data[$i]["IT B 3"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-B3')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT B 3"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-B3",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire BT16 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT B 3"],
                                ]);    
                            }

                            
                        }

                        //insert itinéraire CS1 camion
                        if($data[$i]["IT CS 1"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-CS1')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 1"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS1",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 1"],
                                ]);    
                            }

                            
                        }

                        //insert itinéraire CS2 camion
                        if($data[$i]["IT CS 2"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-CS2')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 2"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS2",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 2"],
                                ]);    
                            }

                            
                        }

                        //insert itinéraire CS3 camion
                        if($data[$i]["IT CS 3"] != ""){
                            $idItineraire = itineraires::where('libelle','IT-CS3')->first();
                            if($idItineraire != null){
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $idItineraire->id,
                                    'ordre'=> (int) $data[$i]["IT CS 3"],
                                ]);   
                            }
                            else{
                                $itineraires = itineraires::create([
                                    'libelle'=> "IT-CS3",
                                    'libelle_ar'=> "",
                                ]);
                                //insert emplacement itinéraire camion 1
                                $itinerairesemplacements = itineraires_emplacements::create([
                                    'emplacement_id'=> $emplacements->id,
                                    'itineraire_id'=> $itineraires->id,
                                    'ordre'=> (int) $data[$i]["IT CS 3"],
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
                        'CT' => (int) $data[$i]["CT"],
                        'CB' => (int) $data[$i]["CB"],
                        'CS' => (int) $data[$i]["CS"],
                        'description'=> ""                    
                    ]);
                    
                    //insert itinéraire BT16 1
                    if($data[$i]["IT B 1"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B1')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 1"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B1",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 1"],
                            ]);    
                        }

                    }

                    //insert itinéraire BT16 2
                    if($data[$i]["IT B 2"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B2')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 2"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B2",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 2"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire BT16 3
                    if($data[$i]["IT B 3"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B3')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 3"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B3",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 3"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS1 camion
                    if($data[$i]["IT CS 1"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS1')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 1"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS1",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 1"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS2 camion
                    if($data[$i]["IT CS 2"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS2')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 2"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS2",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 2"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS3 camion
                    if($data[$i]["IT CS 3"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS3')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 3"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS3",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 3"],
                            ]);    
                        }    
                    }

                }
                if ($data[$i]["COMMUNE"] == "KSAR") {
                    
                    if($data[$i]["Zone"] == "KS1")
                    {
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 4,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'CT' => (int) $data[$i]["CT"],
                            'CB' => (int) $data[$i]["CB"],
                            'CS' => (int) $data[$i]["CS"],
                            'description'=> ""
                        ]);
                        //insert itinéraire BT16 1
                    //insert itinéraire BT16 1
                    if($data[$i]["IT B 1"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B1')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 1"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B1",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 1"],
                            ]);    
                        }

                    }

                    //insert itinéraire BT16 2
                    if($data[$i]["IT B 2"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B2')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 2"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B2",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 2"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire BT16 3
                    if($data[$i]["IT B 3"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B3')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 3"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B3",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 3"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS1 camion
                    if($data[$i]["IT CS 1"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS1')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 1"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS1",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 1"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS2 camion
                    if($data[$i]["IT CS 2"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS2')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 2"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS2",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 2"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS3 camion
                    if($data[$i]["IT CS 3"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS3')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 3"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS3",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 3"],
                            ]);    
                        }

                        
                    }
                        
                        
                    }
                    if($data[$i]["Zone"] == "KS2")
                    {
                        $emplacements = emplacements::create([
                            'code'=> $data[$i]["EMP"],
                            'libelle'=> $data[$i]["Nom emp fr"],
                            'libelle_ar'=> $data[$i]["Nom de l'emplacement"],
                            'zone_id'=> 5,
                            'coordonnees_gps'=> $data[$i]["Coordonnées GPS"],
                            'etat'=> "",
                            'priorite_id'=> 1,
                            'CT' => (int) $data[$i]["CT"],
                            'CB' => (int) $data[$i]["CB"],
                            'CS' => (int) $data[$i]["CS"],
                            'description'=> ""
                        ]);
                        
                    //insert itinéraire BT16 1
                    if($data[$i]["IT B 1"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B1')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 1"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B1",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 1"],
                            ]);    
                        }

                    }

                    //insert itinéraire BT16 2
                    if($data[$i]["IT B 2"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B2')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 2"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B2",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 2"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire BT16 3
                    if($data[$i]["IT B 3"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-B3')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT B 3"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-B3",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire BT16 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT B 3"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS1 camion
                    if($data[$i]["IT CS 1"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS1')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 1"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS1",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 1"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS2 camion
                    if($data[$i]["IT CS 2"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS2')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 2"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS2",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 2"],
                            ]);    
                        }

                        
                    }

                    //insert itinéraire CS3 camion
                    if($data[$i]["IT CS 3"] != ""){
                        $idItineraire = itineraires::where('libelle','IT-CS3')->first();
                        if($idItineraire != null){
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $idItineraire->id,
                                'ordre'=> (int) $data[$i]["IT CS 3"],
                            ]);   
                        }
                        else{
                            $itineraires = itineraires::create([
                                'libelle'=> "IT-CS3",
                                'libelle_ar'=> "",
                            ]);
                            //insert emplacement itinéraire camion 1
                            $itinerairesemplacements = itineraires_emplacements::create([
                                'emplacement_id'=> $emplacements->id,
                                'itineraire_id'=> $itineraires->id,
                                'ordre'=> (int) $data[$i]["IT CS 3"],
                            ]);    
                        }

                        
                    }
                        

                    }
                }

            }      
         return "ok";
    }


    public function insertAgents()
    {
        $file = public_path('Agents2.csv');
        $data = $this->csvToArray($file);
        //dd($data);
        for ($i = 0; $i < count($data); $i++)
        {
            if ($data[$i]["Fonction"] == "Chef d'equipe") 
            {
                $agents = agents::create([
                    'nom'=> $data[$i]["Nom & Prenom"],
                    'prenom'=> $data[$i]["Nom & Prenom"],
                    'genre'=> 'H',
                    'lieuN'=> '',
                    'etat_civil'=> "",
                    'telephone'=> (int) $data[$i]["Contact"],
                    'fonction_id' => 3,
                    'niveau' => $data[$i]["Niveau"],
                    'langues' => $data[$i]["Langue(s)"],
                    'categories' => "",
                ]);
            }
            // 
            if ($data[$i]["Fonction"] == "Rippeur") 
            {
                $agents = agents::create([
                    'nom'=> $data[$i]["Nom & Prenom"],
                    'prenom'=> $data[$i]["Nom & Prenom"],
                    'genre'=> 'H',
                    'lieuN'=> '',
                    'etat_civil'=> "",
                    'telephone'=> (int) $data[$i]["Contact"],
                    'fonction_id' => 4,
                    'niveau' => $data[$i]["Niveau"],
                    'langues' => $data[$i]["Langue(s)"],
                    'categories' => "",
                ]);
            }

            if ($data[$i]["Fonction"] == "Chauffeur") 
            {
                $agents = agents::create([
                    'nom'=> $data[$i]["Nom & Prenom"],
                    'prenom'=> $data[$i]["Nom & Prenom"],
                    'genre'=> 'H',
                    'lieuN'=> '',
                    'etat_civil'=> "",
                    'telephone'=> (int) $data[$i]["Contact"],
                    'fonction_id' => 1,
                    'niveau' => $data[$i]["Niveau"],
                    'langues' => $data[$i]["Langue(s)"],
                    'categories' => "",
                ]);
            }
        }
        return "ok agents";    
    }

}
