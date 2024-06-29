<?php

namespace App\Http\Controllers\Cms\Information;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Content;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class VideosController extends AuthController
{
    private $target = 'cms.information.videos';

    public function json()
    {
        $video = Video::query();

        return Datatables::of($video)
        ->addColumn('display', function ($row) {
            return $row->status_video == "t" ?
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
        ->addColumn('video', function ($row) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $row->url_video, $match);
            $id_video = $match[1];
            return " <a href=\"".$row->url_video."\" title=\"".$row->url_video."\" data-toggle=\"lightbox\" data-gallery=\"youtubevideos\">
					<img src=\"https://img.youtube.com/vi/".$id_video."/default.jpg\" style=\"width:75px;\">
				</a>";
        }, 1)
        ->filter(function ($query) {
            if (request()->has('kategori')) {
                $query->where('id_content', request('kategori'));
            }

            if (request()->has('keyword')) {
                $query->where('nama_video', 'like', "%" . request('keyword') . "%");
            }
        })
        ->order(function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->rawColumns(['display', 'button', 'video'])
        ->toJson();
    }

    public function index()
    {
        $kategori = Content::where('status_content', 't')->where('id_kategori', 6)->orderBy('induk_content')->orderBy('urutan_content')->get();
        $data = array_merge(ClassMenu::view($this->target), array('kategori' => $kategori), array('filter' => array()));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','left','center'),
        'data' => array('button', 'nama_video', 'video', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','left','center'),
            'data' => array('nama_video', 'video', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $video = Video::where('id', $request->id)->first();
        if(!isset($video)) {
            $video = new Video();
            $video->id = 0;
            $video->status_video = 't';
            $video->mode_video = 'Add Video';
        } else {
            $video->mode_video = 'Edit Video';
        }

        $data = array_merge(
            ClassMenu::view($this->target),
            array('data' => $video),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $video = $new ? new Video() : Video::find($request->id);
        $video->id_content = $request->id_content;
        $video->nama_video = $request->nama_video;
        $video->keterangan_video = $request->keterangan_video;
        $video->url_video = $request->url_video;
        $video->status_video = $request->status_video == "on" ? "t" : "f";
        if($new) {
            $video->created_by = Session::get('uid');
        }
        $video->updated_by = Session::get('uid');

        if($new) {
            $video->save();
        } else {
            $video->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $video = Video::find($request->dt);
        $video->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
