<?php
class Utils{
    
    static function parseRegion($current_region){
        switch ($current_region) {
                case "mayotte":
                    $region = "MAYOTTE";
                    break;

                case "grandEst":
                   $region = "GRAND-EST";
                    break;

                case "Normandie":
                    $region = "NORMANDIE";
                    break;

                case "nouvelleAquitaine":
                    $region = "NOUVELLE-AQUITAINE";
                    break;

                case "occitanie":
                    $region = "OCCITANIE";
                    break;

                case "auvergneRhoneAlpes":
                    $region = "AUVERGNE-RHÔNES-ALPES";
                    break;

                case "bourgogneFrancheComte":
                    $region = "BOURGOGNE-FRANCHE-COMTE";
                    break;

                case "bretagne":
                    $region = "BRETAGNE";
                    break;

                case "centreValLoire":
                    $region = "CENTRE-VAL-DE-LOIRE";
                    break;

                case "corse":
                    $region = "CORSE";
                    break;

                case "Guadeloupe":
                    $region = "GUADELOUPE";
                    break;

                case "Guadeloupe":
                    $region = "GUADELOUPE";
                    break;

                case "ileDeFrance":
                    $region = "ILE-DE-FRANCE";
                    break;

                case "hautDeFrance":
                    $region = "HAUTS-DE-FRANCE";
                    break;

                 case "paysLoire":
                    $region = "PAYS-DE-LA-LOIRE";
                    break;

                  case "guyane":
                    $region = "GUYANE";
                    break;

                  case "paca":
                    $region = "PROVENCE-ALPES-CÔTE D'AZUR";
                    break;  

                   case "reunion":
                    $region = "REUNION";
                    break; 

                  case "martinique":
                    $region = "MARTINIQUE";
                    break;
                  default:
                        $region = false;
            }
        
        return $region;
        
    }
    
    
    
    
    
}



?>