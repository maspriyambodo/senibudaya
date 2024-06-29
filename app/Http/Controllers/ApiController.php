<?php

namespace App\Http\Controllers;

use App\Classes\ClassData;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    private $response = null;
    private $url = null;

    public function __construct(Request $request)
    {
        $this->url = env('APP_API');
        if(is_null($request->token) || $request->token != 'v2y10N6aO6jvYfANhIBITpCxu8SLj9ijX9w42YFAkP4vIkli3ytNAakW') {
            $this->response = [
                "status" => 'error',
                "message" => 'invalid token',
                "code" => '99',
                "error" => true,
            ];
        }
    }

    public function index(Request $request)
    {
        $response = $this->response;
        if(is_null($response)) {
            $response = [
                "status" => 'success',
                "message" => 'welcome',
                "code" => '00',
                "error" => false,
            ];
        }

        return response()->json($response);
    }

    public function tahun(Request $request)
    {
        $json = Http::post($this->url.'apiv1/ajax/getTahunimsak');
        $data = $json->getBody()->getContents();
        $data = explode("</option><option value='", $data);

        $dta = array();
        foreach ($data as $val) {
            list($tahun, $value) = explode("' >", $val);
            $dta[preg_replace("/[^0-9]/", "", $tahun)] = strip_tags($value);
        }
        $data = json_decode(json_encode($dta), false);

        $response = $this->response;
        if(is_null($response)) {
            if(isset($data)) {
                $code = count((array)$data) > 0 ? '00' : '01';
                $message = count((array)$data) > 0 ? 'ok' : 'empty';

                $response = [
                    "status" => 'success',
                    "message" => $message,
                    "code" => $code,
                    "error" => false,
                    "data" => $data,
                ];
            } else {
                $response = [
                    "status" => 'error',
                    "message" => 'invalid parameter',
                    "code" => '99',
                    "error" => true,
                ];
            }
        }

        return response()->json($response);
    }

    public function propinsi(Request $request)
    {
        $json = Http::post($this->url.'apiv1/ajax/getApiProv');
        $data = $json->getBody()->getContents();
        $data = str_replace('provKode', 'id', $data);
        $data = str_replace('provNama', 'name', $data);
        $data = json_decode($data, false);

        $response = $this->response;
        if(isset($data)) {
            $code = count((array)$data) > 0 ? '00' : '01';
            $message = count((array)$data) > 0 ? 'ok' : 'empty';

            if(is_null($response)) {
                $response = [
                    "status" => 'success',
                    "message" => $message,
                    "code" => $code,
                    "error" => false,
                    "data" => $data,
                ];
            }
        } else {
            $response = [
                "status" => 'error',
                "message" => 'invalid parameter',
                "code" => '99',
                "error" => true,
            ];
        }

        return response()->json($response);
    }

    public function kabupaten(Request $request)
    {
        $response = $this->response;
        if($request->propinsi) {
            $json = Http::asForm()->post($this->url.'apiv1/ajax/getApiKabko', [
            'x' => $request->propinsi,
            ]);
            $data = $json->getBody()->getContents();
            $data = str_replace('kabkoKode', 'id', $data);
            $data = str_replace('kabkoNama', 'name', $data);
            $data = json_decode($data, false);
        }

        if(isset($data)) {
            $code = count((array)$data) > 0 ? '00' : '01';
            $message = count((array)$data) > 0 ? 'ok' : 'empty';

            if(is_null($response)) {
                $response = [
                    "status" => 'success',
                    "message" => $message,
                    "code" => $code,
                    "error" => false,
                    "data" => $data,
                ];
            }
        } else {
            $response = [
                "status" => 'error',
                "message" => 'invalid parameter',
                "code" => '99',
                "error" => true,
            ];
        }

        return response()->json($response);
    }

    public function shalat(Request $request)
    {
        $response = $this->response;
        if($request->propinsi && $request->kabupaten && $request->tahun && $request->bulan) {
            $json = Http::asForm()->post($this->url.'apiv1/ajax/getApiSholatbln', [
            'prov' => $request->propinsi,
            'kabko' => $request->kabupaten,
            'thn' => $request->tahun,
            'bln' => $request->bulan,
            ]);
            $data = $json->getBody()->getContents();
            $data = str_replace('prov', 'propinsi', $data);
            $data = str_replace('kabko', 'kabupaten', $data);
            $data = json_decode($data, false);
        }

        if(isset($data)) {
            $code = count((array)$data) > 0 ? '00' : '01';
            $message = count((array)$data) > 0 ? 'ok' : 'empty';

            if(is_null($response)) {
                $response = [
                    "status" => 'success',
                    "message" => $message,
                    "code" => $code,
                    "error" => false,
                    "data" => $data,
                ];
            }
        } else {
            $response = [
                "status" => 'error',
                "message" => 'invalid parameter',
                "code" => '99',
                "error" => true,
            ];
        }

        return response()->json($response);
    }

    public function imsakiyah(Request $request)
    {
        $response = $this->response;
        if($request->propinsi && $request->kabupaten && $request->tahun) {
            $json = Http::asForm()->post($this->url.'apiv1/ajax/getApiimsakiyah', [
            'prov' => $request->propinsi,
            'kabko' => $request->kabupaten,
            'thn' => $request->tahun,
            ]);
            $data = $json->getBody()->getContents();
            $data = str_replace('prov', 'propinsi', $data);
            $data = str_replace('kabko', 'kabupaten', $data);
            $data = json_decode($data, false);
        }

        if(isset($data)) {
            $code = count((array)$data) > 0 ? '00' : '01';
            $message = count((array)$data) > 0 ? 'ok' : 'empty';

            if(is_null($response)) {
                $response = [
                    "status" => 'success',
                    "message" => $message,
                    "code" => $code,
                    "error" => false,
                    "data" => $data,
                ];
            }
        } else {
            $response = [
                "status" => 'error',
                "message" => 'invalid parameter',
                "code" => '99',
                "error" => true,
            ];
        }

        return response()->json($response);
    }
	
	function berita(Request $request){
		$response = $this->response;
		
		$where = "status_berita = 't'";
		if(isset($request->tahun))
			$where.= " and year(created_at) = '".$request->tahun."'";
		if(isset($request->bulan))
			$where.= " and month(created_at) = '".$request->bulan."'";
		
		$berita = Berita::whereRaw($where)->orderBy('created_at', 'desc')->limit($request->limit)->get()->toArray();
		
		if(isset($berita)){
			$code = count((array)$berita) > 0 ? '00' : '01';
			$message = count((array)$berita) > 0 ? 'ok' : 'empty';
		
			if(is_null($response))
			$response = [
				"status" => 'success',
				"message" => $message,
				"code" => $code,
				"error" => false,
				"data" => $berita,
			];	
		}else{
			$response = [
				"status" => 'error',
				"message" => 'invalid parameter',
				"code" => '99',
				"error" => true,
			];	
		}
		
		return response()->json($response);
	}
}
