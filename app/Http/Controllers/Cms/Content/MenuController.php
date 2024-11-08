<?php

namespace App\Http\Controllers\Cms\Content;

use App\Http\Controllers\Cms\AuthController;
use App\Classes\ClassMenu;
use App\Models\Kategori;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use DataTables;
use Image;

class MenuController extends AuthController
{
    private $target = 'cms.content.menu';

    public function json()
{
    // Fetch content with necessary joins
    $content = Content::select('dta_content.*')
        ->leftJoin('dta_content as dta_induk', 'dta_induk.id', '=', 'dta_content.induk_content')
        ->leftJoin('dta_content as dta_parent', 'dta_parent.id', '=', 'dta_induk.induk_content')
        ->orderByRaw($this->getOrderByRawClause());

    return Datatables::of($content)
        ->addColumn('display', fn($row) => $this->getDisplayBadge($row->status_content))
        ->addColumn('name', fn($row) => $this->getIndentedName($row))
        ->addColumn('button', fn($row) => $this->getActionButtons($row))
        ->filter(fn($query) => $this->applyKeywordFilter($query))
        ->rawColumns(['display', 'name', 'button'])
        ->toJson();
}

private function getOrderByRawClause()
{
    return "concat(
        length(case when dta_content.level_content = 1 then dta_content.urutan_content else 
            case when dta_content.level_content = 2 then dta_induk.urutan_content else dta_parent.urutan_content end
        end),
        case when dta_content.level_content = 1 then dta_content.urutan_content else 
            case when dta_content.level_content = 2 then dta_induk.urutan_content else dta_parent.urutan_content end
        end,
        length(case when dta_content.level_content = 1 then 0 else 
            case when dta_content.level_content = 2 then dta_content.urutan_content else dta_induk.urutan_content end
        end),
        case when dta_content.level_content = 1 then 0 else 
            case when dta_content.level_content = 2 then dta_content.urutan_content else dta_induk.urutan_content end
        end,
        length(case when dta_content.level_content = 1 then 0 else 
            case when dta_content.level_content = 2 then 0 else dta_content.urutan_content end
        end),
        case when dta_content.level_content = 1 then 0 else 
            case when dta_content.level_content = 2 then 0 else dta_content.urutan_content end
        end
    )";
}

private function getDisplayBadge($status)
{
    return $status === "t" 
        ? "<span class=\"badge badge-success w-100\">Aktif</span>" 
        : "<span class=\"badge badge-light-dark w-100\">Tidak Aktif</span>";
}

private function getIndentedName($row)
{
    $padding = $row->level_content > 2 ? 'pl-4' : 'pl-2';
    return "<span class=\"{$padding}\">{$row->nama_content}</span>";
}

private function getActionButtons($row)
{
    if (!$this->edit && !$this->delete) {
        return '';
    }

    $buttons = "<div class=\"btn-group dropright\">
        <button class=\"btn btn-sm btn-icon btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
            <i class=\"fas fa-ellipsis-v\"></i>
        </button>
        <div class=\"dropdown-menu dropright\">";

    if ($this->edit) {
        $buttons .= "<a id=\"edit\" class=\"dropdown-item has-icon\" href=\"" . url('/' . $this->page . '/edit/' . $row->id) . "\">
            <i class=\"fas fa-pencil-alt\"></i> Ubah Data</a>";
    }

    if ($this->delete) {
        $buttons .= "<a id=\"del\" class=\"dropdown-item has-icon\" href=\"#\" data-toggle=\"modal\" data-target=\"#delete\">
            <i class=\"fas fa-trash\"></i> Hapus Data</a>";
    }

    $buttons .= "</div></div>";

    return $buttons;
}

private function applyKeywordFilter($query)
{
    if (request()->has('keyword')) {
        $query->where('dta_content.nama_content', 'like', "%" . request('keyword') . "%");
    }
}

    public function index()
    {
        $data = array_merge(ClassMenu::view($this->target), array('filter' => array()));

        $column = array(
        'id' => 'data',
        'align' => array('center','center','left','center','center'),
        'data' => array('button', 'name', 'urutan_content', 'display'),
        'nosort' => array(0,1,2,3,4),
        );
        if(!$data['edit'] && !$data['delete']) {
            $column = array(
            'id' => 'data',
            'align' => array('center','left','center','center'),
            'data' => array('name', 'urutan_content', 'display'),
            'nosort' => array(0,1,2,3),
            );
        }

        $data = array_merge($data, array('column' => $column));
        return view($this->target, $data);
    }

    public function form(Request $request)
    {
        $new = request()->segments()[1] == 'add' ? true : false;
        if($new) {
            $level = Content::where('id', $request->id)->pluck('level_content');
            $level_content = count($level) ? $level[0] : 0;

            $content = new Content();
            $content->id = 0;
            $content->induk_content = $request->id;
            $content->level_content = $level_content + 1;
            $content->urutan_content = Content::where('induk_content', $request->id)->max('urutan_content') + 1;
            $content->status_content = 't';
            $content->mode_content = 'Add Menu'.($request->id > 0 ? ' - '.Content::where('id', $request->id)->pluck('nama_content')[0] : '');
        } else {
            $content = Content::where('id', $request->id)->first();
            $content->mode_content = 'Edit Menu'.($content->induk_content > 0 ? ' - '.Content::where('id', $content->induk_content)->pluck('nama_content')[0] : '');
        }

        $kategori = Kategori::where('status_kategori', 't')->get();

        $data = array_merge(
            ClassMenu::view($this->target),
            array('kategori' => $kategori),
            array('data' => $content),
        );

        return view($this->target.'-form', $data);
    }

    public function store(Request $request)
    {
        $new = empty($request->id) ? true : false;
        ClassMenu::store($this, $new);

        $data = Content::select('icon_content')->where('id', $request->id)->first();
        $icon_content = isset($data) ? $data->icon_content : '';
        if ($request->hasfile('icon_content')) {
            $this->validate(
                $request,
                ['icon_content' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
                [
					'icon_content.image' => 'Proses gagal, File ICON harus berupa gambar.',
					'icon_content.max' => 'Proses gagal, Ukuran ICON tidak boleh lebih dari 12 MB.'
				]
            );

            $icon_temp = public_path('images/content/'.$icon_content);
            if(File::exists($icon_temp)) {
                File::delete($icon_temp);
            }

            $icon = $request->file('icon_content');
            $icon_content = 'ico_'.round(microtime(true) * 1000).'.'.$icon->getClientOriginalExtension();
            $path = public_path('images/content/');
			
			$width = $height = 800;
            $img_file = Image::make($icon->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$icon_content);
        }

        $data = Content::select('image_content')->where('id', $request->id)->first();
        $image_content = isset($data) ? $data->image_content : '';
        if ($request->hasfile('image_content')) {
            $this->validate(
                $request,
                ['image_content' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288'],
                [
					'image_content.image' => 'Proses gagal, File IMAGE harus berupa gambar.',
					'image_content.max' => 'Proses gagal, Ukuran IMAGE tidak boleh lebih dari 12 MB.'
				]
            );

            $image_temp = public_path('images/content/'.$image_content);
            if(File::exists($image_temp)) {
                File::delete($image_temp);
            }

            $image = $request->file('image_content');
            $image_content = 'img_'.round(microtime(true) * 1000).'.'.$image->getClientOriginalExtension();
            $path = public_path('images/content/');
			
			$width = $height = 800;
            $img_file = Image::make($image->getRealPath());
			$img_file->height() > $img_file->width() ? $width=null : $height=null;
			$img_file->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$image_content);
        }

        $content = $new ? new Content() : Content::find($request->id);
        $content->id_kategori = $request->id_kategori;
        $content->induk_content = $request->induk_content;
        $content->nama_content = $request->nama_content;
        $content->label_content = $request->label_content;
        $content->keterangan_content = $request->keterangan_content;
        $content->detail_content = $request->detail_content;
        $content->redirect_content = $request->redirect_content == "on" ? "t" : "f";
        $content->link_content = $request->link_content == "on" ? "t" : "f";
        $content->hide_content = $request->hide_content == "on" ? "t" : "f";
        $content->level_content = $request->level_content;
        $content->urutan_content = $request->urutan_content;
        $content->icon_content = $icon_content;
        $content->image_content = $image_content;
        $content->status_content = $request->status_content == "on" ? "t" : "f";
        if($new) {
            $content->created_by = Session::get('uid');
        }
        $content->updated_by = Session::get('uid');

        if($new) {
            $content->save();
        } else {
            $content->update();
        }

        $message = $new ? "Tambah data berhasil." : "Ubah data berhasil.";
        return redirect($this->page)->with('message', $message);
    }

    public function destroy(Request $request)
    {
        $content = Content::where('id', $request->dt)->orWhere('induk_content', $request->dt);
        $content->delete();

        return redirect($this->page)->with('message', "Hapus data berhasil.");
    }
}
