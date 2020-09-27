<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\build_query;
use Illuminate\Http\Request;
use Google\Cloud\Translate\V2\TranslateClient;

class TranslateController extends Controller
{


	/**
	 *
	 * @param Request $request
	 * @return mixed
	 */
	public function translate()
	{


        $translate = new TranslateClient([
            'key' => 'alert-tine-151208'
        ]);

        $result = $translate->translate('Hello world!', [
            'target' => 'fr'
        ]);

        var_dump($result);


/*
		$apiResponse = \json_decode($response, true);

		return response()->json($apiResponse);*/
	}


}

