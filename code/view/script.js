


/*// Google Maps Geocoder
$geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";

$arrAddresses = Address::LoadAll(); // Notre collection d'objets Address

foreach ($arrAddresses as $address) {

        if (strlen($address->Lat) == 0 && strlen($address->Lng) == 0) {
                
            $adresse = $address->Rue;
            $adresse .= ', '.$address->CodePostal;
            $adresse .= ', '.$address->Ville;

            // Requête envoyée à l'API Geocoding
            $query = sprintf($geocoder, urlencode(utf8_encode($adresse)));

            $result = json_decode(file_get_contents($query));
            $json = $result->results[0];

            $adress->Lat = (string) $json->geometry->location->lat;
            $adress->Lng = (string) $json->geometry->location->lng;
            $adress->Save();

         }
}*/