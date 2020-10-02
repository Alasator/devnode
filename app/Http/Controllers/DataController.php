<?php


namespace App\Http\Controllers;


class DataController extends Controller
{
    public function getPageById(array $params)
    {
        $data = $params; // Data::where('page_uid', $params['page_uid'])->first();

        return $data;
    }

    public function create(array $params)
    {
        $data = $params; // DataCreate::create($params);

        return $data;
    }

}