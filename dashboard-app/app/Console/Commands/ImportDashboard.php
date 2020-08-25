<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class ImportDashboard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard:import {orgId} {filePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Dashboards';

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
     * @return int
     */

    public function handle()
    {
        $filePath = $this->argument('filePath');
        $orgId = $this->argument('orgId');
        try {
            $header = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];
            $client = new Client([
                'base_uri' => env('GRAFANA_URL'),
                'auth' => [env('GRAFANA_USER'), env('GRAFANA_PASSWORD')],
                'headers' =>  $header
            ]);
            $response = $client->post('/api/dashboards/db', [
                'json' => [
                    "dashboard" => $filePath
                    ,
                    "folderId" => $orgId,
                    "overwrite" => false
                ]
            ])->getBody();
            $data = json_decode($response, true);
            return $data;
        } catch (\Throwable $th) {
        }

    }
}
