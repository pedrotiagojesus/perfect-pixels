<?php

namespace App\System;

class BackgroundRemover
{

    public function removeBackground(string $originalPath = "", string $tmpPath = '')
    {

        $cmd = "backgroundremover -i " . $originalPath . " -o " . $tmpPath;
        shell_exec($cmd);
    }

    private function removalAi(string $originalPath = "", string $tmpPath = '', string $apiKey = "")
    {

        $request = new \HTTP_Request2();
        $request->setUrl('https://api.removal.ai/3.0/remove');
        $request->setMethod(\HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Rm-Token' => $apiKey
        ));
        $request->addPostParameter(array(
            'image_url' => $originalPath
        ));
        $request->addUpload('image_file', $tmpPath, $tmpPath, '<Content-Type Header>');
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            } else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase();
            }
        } catch (\HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
            echo $e->getCode();
        }
    }
}
