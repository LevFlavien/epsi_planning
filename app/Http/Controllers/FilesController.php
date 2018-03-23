<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use App\Group;
use App\File;
use App\Homework;
use App\Http\Requests\FilesRequest;

class FilesController extends Controller
{

    public function form(Group $group, Homework $homework) {

        return view('files.form', compact(['group', 'homework']));
    }

    public function store(FilesRequest $request, Group $group, Homework $homework, Client $client) {

        $file = new File(['name' => $request['name']->getClientOriginalName(), 'homework_id' => $homework->id]);
        Storage::put($group->id . '/' . $file->name, $request['name']);
        $this->upload($client, $group, $file);
        $file->save();

        return redirect(route('files.form', compact(['group', 'homework'])));
    }

    public function create(Group $group, Homework $homework) {

        File::create(['name' => request('name'), 'id_homework' => $homework->id]);

        return view('files.form', compact('group'));
    }

    public function download(Client $client, Group $group, Homework $homework, File $file) {

        $client->setDefaultOption('verify', false);
        $response = $client->post('https://content.dropboxapi.com/2/files/download', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('DROPBOX_API_KEY', 'null'),
                'Dropbox-API-Arg' => '{"path":"/' . $group->id . '/' . $file->name . '"}'
            ]
        ]);

        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $file->name . '"',
        ];

        return response()->make($response->getBody(), 200, $headers);
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
                'Dropbox-API-Arg' => '{"path":"/' . $group->id . '/' . $file->name . '", "mode":{".tag":"overwrite"}}'
            ],
            'body' => file_get_contents(request('name'))

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
