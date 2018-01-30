<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Group;
use App\Configuration;

class GetToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amiral:communicate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send current token to amiral and try to get new token';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $configuration = Configuration::all()->first();

        if ($configuration) {
            $address = $configuration->amiral_address;
        } else {
            $this->error("L'adresse de l'amiral n'est pas définie dans la configuration du satellite.");
            return;
        }

        $this->info('Récupération du token actuel...');

        $client = new Client();
        $token = Group::all()->first();

        $this->info('Envoi du token actuel...');

        try {
            $request = $client->get($address . $token);
        } catch (RequestException $e) {
            echo $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }

            $token = Group::all()->first();

            if ($token) {
                $tokenDate = $token->updated_at;
                $currentDate = new \DateTime();
            }

            // TODO Si ça fait 1h30, quitte la flotte.
            if (false) {
                $this->info('Timeout. Départ de la flotte...');
                $configuration = Configuration::all()->first();
                $configuration->active = false;
                $configuration->save();
            }

            return 'ok';
        }

        $responseCode = $request->getStatusCode();

        // TODO code erreur ?

        $token = unserialize($request->getbody())[0];

        Group::destroy();
        Group::create('token');

        // Récupération token configuration amiral.
    }
}
