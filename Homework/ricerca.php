<?php

header('Content-Type: application/json');
$query=urlencode($_GET['q']);
$key='0a9bbad37fmsh410b05fd2973ffep1550f2jsn6548d730b76a';
$host= "imdb8.p.rapidapi.com";

$ch = curl_init();

curl_setopt_array($ch, [
	CURLOPT_URL => 'https://imdb8.p.rapidapi.com/auto-complete?q='.$query,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: imdb8.p.rapidapi.com",
        "x-rapidapi-key: $key"
    ],
]);

$data = curl_exec($ch);
curl_close($ch);
echo $data;
?>