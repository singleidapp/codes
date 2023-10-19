<?php /*
*
*Template Name: location missing by sid 
*
*/ 
 
 ?>
 
 <?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://single.id/location/search',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "query": {
    "field": [
      {
        "chain_identifier": {
          "$eq": "supreme_parradise"
        }
      }
    ]
  },
  "options": {
    "offset": 0,
    "limit": 100000
  }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization:####
  ),
));

$response = curl_exec($curl);

curl_close($curl);
 
$data = json_decode($response);



// Check if decoding was successful
if ($data !== null) {
    // Access the "status" property and display it
	
	//echo "<pre>";    print_r($data->data->results);    echo "</pre>";
	
	$seenNames = array(); // To keep track of seen names
    $data= $data->data->results;
	
	
	
    foreach ($data as $item) {
		
         
        // Access the "tracking" array for each item
        foreach ($item->tracking as $trackingData) {
            // Print the "identifiers" array using print_r
           // print_r($trackingData->identifiers);
			$name = $trackingData->identifiers;
			if (in_array($name, $seenNames)) {
			// print_r($name);

			} else {
			$seenNames[] = $name;
			}
			
        }
         
    }
	
	$givenArray = [
    121708, 181671, 163734, 357146, 377086, 355997, 356187, 356698, 157394, 377051,
    377050, 298129, 1136856, 24979, 356006, 356007, 209382, 356047, 356055, 377150,
    373782, 57959, 70705, 119949, 179657, 179845, 272715, 284840, 277696, 298130,
    268271, 264478, 277631, 274054, 284837, 277630, 298125, 284835, 168926, 268182,
    284839, 11950, 57961, 373863, 356469, 376934, 355953, 356369, 209440, 356139,
    356134, 530287, 1112537, 1112540, 1112538, 1112542, 1112498, 1112495, 1112485,
    1112477, 1112460, 1109335, 1102158, 1102334, 1102257, 1102366, 1102201, 1102193,
    1102182, 1102174, 1102170, 1102154, 1102150, 1102376, 1102383, 1102386, 1102345,
    1102349, 1102327, 1102319, 1102312, 1102305, 1102298, 1102292, 1102286, 1102277,
    1102356, 1102269, 1102265, 1102260, 1102254, 1102247, 1102240, 1102232, 1102224,
    1102217, 1102209, 1112541, 1112539, 1112536, 1112502, 1112496, 1112482, 1112472,
    1112464, 1112454, 1102362, 1102341, 1102352, 1102244, 1102205, 1102197, 1102190,
    1102186, 1102178, 1102369, 1102166, 1102162, 1102372, 1102379, 1102390, 1102338,
    1102330, 1102322, 1102316, 1102309, 1102302, 1102294, 1102288, 1102282, 1102279,
    1102274, 1102271, 1102266, 1102358, 1102259, 1102252, 1102249, 1102241, 1102236,
    1102228, 1102221, 1102213, 50729, 209230, 373923, 274055, 824447, 1180284, 1180285,
    1180286, 1180287, 1180288, 1180289, 1180290
];
  
echo '<br>';	
 $pradeep = array();
foreach ($seenNames as $p){
	$pradeep[] = $p[2];
	 
} 
$array1 = $givenArray;
$array2 = $pradeep;

// Find values in $array1 that are not in $array2
$notInArray2 = array_diff($array1, $array2);

// Find values in $array2 that are not in $array1
$notInArray1 = array_diff($array2, $array1);

// Output the results
echo "Values in array1 but not in array2: ";
print_r($notInArray2);

 
 


     
} else {
    // Handle JSON parsing error
    echo "Failed to parse JSON data";
}
?>
 

 
