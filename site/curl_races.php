<?php

for($i = 2000; $i < 2020; $i++)
{
    $curl = curl_init("https://ergast.com/api/f1/" . $i . "/results.json?limit=1000");
    
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data_course = curl_exec($curl);
    
    if($data_course === FALSE)
    {
        var_dump(curl_error($curl));
    }
    else
    {
        if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200)
        {
            file_put_contents("races_json/" . $i . "_races.json", $data_course);
        }
        
    }
    
    curl_close($curl);
}


