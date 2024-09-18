<?php

final class BackgroundRemover
{

    function removeBackground(string $originalPath = "", string $tmpPath = '')
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.slazzer.com/v2.0/remove_image_background');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,  http_build_query(array('source_image_file' => fopen($originalPath, 'r'))));

        $headers = array();
        $headers[] = 'Api-Key: 007e21c868294dbd948b9009cf26aa5b';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        var_dump($result);
        die();
    }

    function removeBackgroundPy(string $originalPath = "", string $tmpPath = '')
    {
        $command = escapeshellcmd('python lib/dis_removal_bg/index.py ' . escapeshellarg($originalPath) . " " . escapeshellarg($tmpPath));
        $output = shell_exec($command);
        echo $output;
    }
}
