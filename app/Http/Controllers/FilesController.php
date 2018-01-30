<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FilesController extends Controller
{
    public function index() {

    }

    /**
     * method POST
     * @param Client $client
     * @param Group $group
     * @param File $file
     */
    public function store(Client $client, Group $group, File $file) {

        $client->setDefaultOption('verify', false);
        $reponse = $client->post('https://content.dropboxapi.com/2/files/upload', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('DROPBOX_API_KEY', 'null'),
                'Content-Type' => 'application/octet-stream',
                'Dropbox-API-Arg' => '{"path":"' . $group->id . '/' . $file->name . '"}'
            ]
        ]);

        return $reponse->getBody();
    }
}
