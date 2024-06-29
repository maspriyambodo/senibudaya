<?php

namespace App\Http\Controllers\Cms\Contact;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DataTables;

class ContactController extends AuthController
{
    private $target = 'cms.contact.contact';

    public function json()
    {
        $kontak = Kontak::query();

        return Datatables::of($kontak)
        ->editColumn('created_at', function ($data) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y H:i');
        })
        ->addColumn('button', function ($row) {
            $button = "";
            if($this->delete) {
                $button.= "<div class=\"btn-group dropright\">
					<button class=\"btn btn-sm btn-icon btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
						<i class=\"fas fa-ellipsis-v\"></i> 
					</button>
					<div class=\"dropdown-menu dropright\">
					<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#form\" data-backdrop=\"static\"><i class=\"fas fa-search\"></i> Detail Data</a>";
                if($this->delete) {
                    $button.= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Data</a>";
                }
                $button.= "</div>
				</div>";
            } else {
                $button.="<button id=\"detail\" class=\"btn btn-sm btn-icon btn-secondary\" type=\"button\" data-toggle=\"modal\" data-target=\"#form\" >
						<i class=\"fas fa-search\"></i> 
					</button>";
            }
            return $button;
        })
        ->filter(function ($query) {
            if (request()->has('filter')) {
                $filter = explode(',', rtrim(request('filter'), ','));
            }
            if (request()->has('keyword')) {
                if(strlen($filter[0]) < 1) {
                    $query->where(function ($data) {
                        $data->where('nama_kontak', 'like', "%" . request('keyword') . "%")
                        ->orWhere('email_kontak', 'like', "%" . request('keyword') . "%");
                    });
                }

                if(in_array("0", $filter)) {
                    $query->where('nama_kontak', 'like', "%" . request('keyword') . "%");
                }
                if(in_array("1", $filter)) {
                    $query->where('email_kontak', 'like', "%" . request('keyword') . "%");
                }
            }
        })
        ->rawColumns(['button'])
        ->toJson();
    }

    public function index()
    {
        $filter = array("Nama Lengkap", "Alamat Email");
        $data = array_merge(ClassMenu::view($this->target), array('filter' => $filter));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','left','center'),
        'order' => array("[3, 'asc']"),
        'data' => array('button', 'nama_kontak', 'email_kontak', 'created_at'),
        'nosort' => array(0,1),
        );

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function destroy(Request $request)
    {
        $kontak = Kontak::find($request->dt);
        $kontak->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
