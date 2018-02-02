<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use App\Group;
use App\File;

class FilesController extends Controller
{
    public function index() {

    }

    public function create(Group $group) {

        return view('files.form', compact('group'));
    }

    public function download(Client $client, Group $group, File $file) {

        $client->setDefaultOption('verify', false);
        $response = $client->post('https://content.dropboxapi.com/2/files/download', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('DROPBOX_API_KEY', 'null'),
                'Dropbox-API-Arg' => '{"path":"/' . $group->id . '/' . $file->name . '"}'
            ]
        ]);

        Storage::put($group->id . '/' . $file->name, $response->getBody());

        return response()->download($group->id . '/' . $file->name)->deleteFileAfterSend(true);
    }

    /**
     * method POST
     * @param Client $client
     * @param Group $group
     * @param File $file
     */
    public function upload(Client $client, Group $group, File $file) {

        $client->setDefaultOption('verify', false);
        $response = $client->post('https://content.dropboxapi.com/2/files/upload', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('DROPBOX_API_KEY', 'null'),
                'Content-Type' => 'application/octet-stream',
                'Dropbox-API-Arg' => '{"path":"/' . $group->id . '/' . $file->name . '"}'
            ]
        ]);

        return $response->getBody();
    }

    public function delete(Client $client, Group $group, File $file) {

        $client->setDefaultOption('verify', false);
        $response = $client->post('https://api.dropboxapi.com/2/files/delete_v2', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('DROPBOX_API_KEY', 'null'),
                'Content-Type' => 'application/json',
            ],
            'body' => '{"path":"/' . $group->id . '/' . $file->name . '"}'
        ]);

        return $response->getBody();
    }
}
