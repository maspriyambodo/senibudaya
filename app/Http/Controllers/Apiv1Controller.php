<?php

namespace App\Http\Controllers;

use App\Classes\ClassData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Apiv1Controller extends Controller
{
    private $response = null;
    private $url = null;

    public function __construct(Request $request)
    {
        $this->url = env('APP_API');
        if(is_null($request->param_token) || $request->param_token != 'af7c667b9819378c0bddb3baede9525b')
            $this->response = '';
    }

    public function index(Request $request)
    {
        return is_null($this->response) ? 'ok' : $this->response;
    }
	
	public function propinsi(Request $request)
    {
        $json = Http::post($this->url.'apiv1/ajax/getApiProv');
        $data = $json->getBody()->getContents();

        return isset($data) && is_null($this->response) ? $data : $this->response;
    }

    public function kabupaten(Request $request)
    {
        if($request->param_prov) {
            $json = Http::asForm()->post($this->url.'apiv1/ajax/getApiKabko', [
				'x' => $request->param_prov,
            ]);
            $data = $json->getBody()->getContents();
        }

		return isset($data) && is_null($this->response) ? $data : $this->response;
    }

    public function shalat(Request $request)
    {
		if($request->param_prov && $request->param_kabko && $request->param_thn && $request->param_bln) {
            $json = Http::asForm()->post($this->url.'apiv1/ajax/getApiSholatbln', [
            'prov' => $request->param_prov,
            'kabko' => $request->param_kabko,
            'thn' => $request->param_thn,
            'bln' => $request->param_bln,
            ]);
            $data = $json->getBody()->getContents();
        }

        return isset($data) && is_null($this->response) ? $data : $this->response;
    }

    public function imsak(Request $request)
    {
        if($request->param_prov && $request->param_kabko && $request->param_thn) {
            $json = Http::asForm()->post($this->url.'apiv1/ajax/getApiimsakiyah', [
            'prov' => $request->param_prov,
            'kabko' => $request->param_kabko,
            'thn' => $request->param_thn,
            ]);
            $data = $json->getBody()->getContents();
        }

        return isset($data) && is_null($this->response) ? $data : $this->response;
    }
}
