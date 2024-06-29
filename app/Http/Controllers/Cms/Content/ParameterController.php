<?php

namespace App\Http\Controllers\Cms\Content;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class ParameterController extends AuthController
{
    private $target = 'cms.content.parameter';

    public function json()
    {
        $parameter = Parameter::query();

        return Datatables::of($parameter)
        ->addColumn('display', function ($row) {
            return $row->status_parameter == "i" ?
            "<a ".(preg_match('/ico/i', $row->nilai_parameter) ? '#' : "href=\"".asset('images')."/".$row->nilai_parameter."\" data-toggle=\"lightbox\"")." data-title=\"Parameter\" data-footer=\"".$row->nama_parameter."\">
					<img src=\"".asset('images')."/".$row->nilai_parameter."\" class=\"user-img-radious-style\" height=\"25\">
				</a>" :
            $row->nilai_parameter;
        })
        ->addColumn('button', function ($row) {
            $button = "";
            if($this->edit || $this->delete) {
                $button.= "<div class=\"btn-group dropright\">
					<button class=\"btn btn-sm btn-icon btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
						<i class=\"fas fa-ellipsis-v\"></i> 
					</button>
					<div class=\"dropdown-menu dropright\">";
                if($this->edit) {
                    $button.= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#form\" data-backdrop=\"static\"><i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
                }
                if($this->delete) {
                    $button.= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\"><i class=\"fas fa-trash\"></i> Hapus Data</a>";
                }
                $button.= "</div>
				</div>";
            }
            return $button;
        })
        ->filter(function ($query) {
            if (request()->has('filter')) {
                $filter = explode(',', rtrim(request('filter'), ','));
            }

            if (request()->has('keyword')) {
                if(strlen($filter[0]) < 1) {
                    $query->where('nama_parameter', 'like', "%" . request('keyword') . "%")
                    ->orWhere('nilai_parameter', 'like', "%" . request('keyword') . "%");
                }

                if(in_array("0", $filter)) {
                    $query->where('nama_parameter', 'like', "%" . request('keyword') . "%");
                }
                if(in_array("1", $filter)) {
                    $query->where('nilai_parameter', 'like', "%" . request('keyword') . "%");
                }
            }
        })
        ->rawColumns(['display', 'button'])
        ->toJson();
    }

    public function index()
    {
        $filter = array("Parameter", "Value");
        $data = array_merge(ClassMenu::view($this->target), array('filter' => $filter));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','left'),
        'data' => array('button', 'nama_parameter', 'display'),
        'nosort' => array(0,1),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','left'),
            'data' => array('nama_parameter', 'display'),
            'nosort' => array(0),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            [
				'nama_parameter' => 'unique:app_parameter,nama_parameter,'.$request->id, 
				'file_parameter' => 'image|mimes:jpeg,png,jpg,gif,svg,ico|max:12288'
			],
            [
				'nama_parameter.unique' => 'Proses gagal, parameter '.strtoupper($request->nama_parameter).' sudah ada.', 
				'file_parameter.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
				'file_parameter.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        if ($request->hasfile('file_parameter')) {
            $request->file('file_parameter')->move(public_path('images'), $request->nilai_parameter);
        }

        $parameter = $new ? new Parameter() : Parameter::find($request->id);
        $parameter->nama_parameter = $request->nama_parameter;
        $parameter->nilai_parameter = $request->nilai_parameter;
        if($new) {
            $parameter->created_by = Session::get('uid');
        }
        $parameter->updated_by = Session::get('uid');

        if($new) {
            $parameter->save();
        } else {
            $parameter->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $parameter = Parameter::find($request->dt);
        $parameter->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
