<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Content;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class BannerController extends AuthController
{
    private $target = 'cms.information.banner';

    public function json()
    {
        $banner = Banner::query();

        return Datatables::of($banner)
        ->addColumn('display', function ($row) {
            return $row->status_banner == "t" ?
            "<span class=\"badge badge-success w-100\">Aktif</span>" :
            "<span class=\"badge badge-light-dark  w-100\">Tidak Aktif</span>";
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
        ->addColumn('image', function ($row) {
            $image_banner = public_path('images/banner/'.$row->image_banner);
            return (!empty($row->image_banner) && File::exists($image_banner)) ? "
				<a href=\"".asset('images/banner')."/".$row->image_banner."\" data-toggle=\"lightbox\" data-title=\"".$row->nama_banner."\" data-footer=\"<div class='w-100'>".$row->keterangan_banner."</div>\">
					<img src=\"".asset('images/banner')."/".$row->image_banner."\" style=\"width:75px;\">
				</a>" : "";
        }, 1)
        ->filter(function ($query) {
            if (request()->has('keyword')) {
                $query->where('nama_banner', 'like', "%" . request('keyword') . "%")
                ->orWhere('keterangan_banner', 'like', "%" . request('keyword') . "%");
            }
        })
        ->order(function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->rawColumns(['display', 'button', 'image'])
        ->toJson();
    }

    public function index()
    {
        $data = array_merge(ClassMenu::view($this->target), array('filter' => array()));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','center','center'),
        'data' => array('button', 'nama_banner', 'image', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','center','center'),
            'data' => array('nama_banner', 'image', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $banner = Banner::where('id', $request->id)->first();
        if(!isset($banner)) {
            $banner = new Banner();
            $banner->id = 0;
            $banner->status_banner = 't';
            $banner->mode_banner = 'Add Banner';
        } else {
            $banner->mode_banner = 'Edit Banner';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $banner),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $this->validate(
            $request,
            ['image_banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
            [
				'image_banner.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
				'image_banner.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
			]
        );

        $data = Banner::select('image_banner')->where('id', $request->id)->first();
        $image_banner = isset($data) ? $data->image_banner : '';
        if ($request->hasfile('image_banner')) {
            $banner_temp = public_path('images/banner/'.$image_banner);
            if(File::exists($banner_temp)) {
                File::delete($banner_temp);
            }

            $image = $request->file('image_banner');
            $image_banner = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/banner/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_banner);
        }

        $banner = $new ? new Banner() : Banner::find($request->id);
        $banner->nama_banner = $request->nama_banner;
        $banner->keterangan_banner = $request->keterangan_banner;
        $banner->image_banner = $image_banner;
        $banner->status_banner = $request->status_banner == "on" ? "t" : "f";
        if($new) {
            $banner->created_by = Session::get('uid');
        }
        $banner->updated_by = Session::get('uid');

        if($new) {
            $banner->save();
        } else {
            $banner->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $banner = Banner::find($request->dt);
        $image_banner = public_path('images/banner/'.$banner->image_banner);
        if(File::exists($image_banner)) {
            File::delete($image_banner);
        }
        $banner->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
