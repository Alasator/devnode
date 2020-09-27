<?php

namespace App\Console\Commands;

use Google\Cloud\Translate\V2\TranslateClient;
use http\Client;
use http\QueryString;
use Illuminate\Console\Command;

class translate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $curl = curl_init();
        $source = 'ru';
        $target = 'en';
        $input = 'Исполняющий обязанности президента Беларуси Александр Лукашенко призвал руководство западных стран, которые его осуждают, не лезть в чужие дела, а заниматься своими.';
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://systran-systran-platform-for-language-processing-v1.p.rapidapi.com/translation/text/translate?' . \http_build_query([
                    'source' => $source,
                    'target' => $target,
                    'input' => $input,
                    ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'x-rapidapi-host: systran-systran-platform-for-language-processing-v1.p.rapidapi.com',
                'x-rapidapi-key: 259faf7fd9msh3c2c8f522f8ee6ap1fed1ajsn292a4081f7a3'
            ]
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        var_dump($response);
        curl_close($curl);


    }

}
