<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\CategoriesOurCollection;
use App\Models\OurCollection;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $main_our_collection_1 = OurCollection::where('status', 1)
            ->where('status_approval', 2)
            ->latest()
            ->first();
        $main_our_collection_2 = OurCollection::where('status', 1)
            ->where('status_approval', 2)
            ->latest()
            ->skip(1)
            ->take(2)
            ->get();
        $categories_our_collection = CategoriesOurCollection::where('status', 1)->orderBy('urutan')->get();
        $total_our_collections = OurCollection::where('status', 1)->where('status_approval', 2)->count();
        $total_audio = OurCollection::where('status', 1)->where('status_approval', 2)->where('id_category', 1)->count();
        $total_video = OurCollection::where('status', 1)->where('status_approval', 2)->where('id_category', 2)->count();
        $total_photo = OurCollection::where('status', 1)->where('status_approval', 2)->where('id_category', 3)->count();
        $total_document = OurCollection::where('status', 1)->where('status_approval', 2)->where('id_category', 4)->count();
        $dta_our_collection = OurCollection::where('status', 1)
                  ->where('status_approval', 2)
                  ->latest()
                  ->skip(3)
                  ->take(3)
                  ->get();

        return view('landing.pages.home', compact('categories_our_collection', 'total_our_collections', 'total_audio', 'total_video', 'total_photo', 'total_document', 'main_our_collection_1', 'main_our_collection_2', 'dta_our_collection'));
    }

    public function show_collections(Request $request, $slug)
    {
        if ($slug == 'all') {
            $categories_our_collection = (object) [
                        'nama' => 'Semua Koleksi',
                        'slug' => 'all',
                        'urutan' => 1
            ];
            $query = OurCollection::select('dta_our_collections.*')
                    ->where([
                ['status', '=', 1],
                ['status_approval', '=', 2]
            ]);
        } else {
            $categories_our_collection = CategoriesOurCollection::where('status', 1)->where('slug', $slug)->firstOrFail();
            $query = OurCollection::select('dta_our_collections.*')
                    ->where([
                ['status', '=', 1],
                ['status_approval', '=', 2],
                ['id_category', '=', $categories_our_collection->id]
            ]);
        }
        if ($request->has('search')) {
            $search = $request->search;
            $filter = $request->filter;

            switch ($filter) {
                case 'Judul':
                    $query->where('nama', 'like', "%$search%");
                    break;
                case 'Pencipta':
                    $query->where('pencipta', 'like', "%$search%");
                    break;
                case 'Kota/Kab':
                    $query->join('mt_kabupaten', 'dta_our_collections.kd_kabkota', '=', 'mt_kabupaten.id_kabupaten')
                          ->where('mt_kabupaten.nama', 'like', "%$search%");
                    break;
                case 'Provinsi':
                    $query->join('mt_provinsi', 'dta_our_collections.kd_prov', '=', 'mt_provinsi.id_provinsi')
                          ->where('mt_provinsi.nama', 'like', "%$search%");
                    break;
                case 'Tahun':
                    $query->whereYear('dta_our_collections.created_at', $search);
                    break;
                default:
                    $query->where('dta_our_collections.nama', 'like', "%$search%");
            }
        }

        $our_collections = $query->paginate(12);
        return view('landing.pages.our-collections.lists', compact('our_collections', 'categories_our_collection'));
    }

    public function show_collection_detail($slug)
    {
        $our_collection = OurCollection::where('slug', $slug)->firstOrFail();
        $category = CategoriesOurCollection::findOrFail($our_collection->id_category);
        $random_collections = OurCollection::where('id', '!=', $our_collection->id)
                                           ->inRandomOrder()
                                           ->take(4)
                                           ->get();

        return view('landing.pages.our-collections.show-detail', compact('our_collection', 'category', 'random_collections'));
    }

    public function peta_sebaran()
    {
        $exec = DB::table('dta_our_collections')
            ->select(
                'mt_provinsi.id_provinsi',
                'mt_provinsi.nama',
                'mt_provinsi.latitude',
                'mt_provinsi.longitude',
                DB::raw('COUNT(dta_our_collections.id) AS total')
            )
            ->join('mt_provinsi', 'mt_provinsi.id_provinsi', '=', 'dta_our_collections.kd_prov')
            ->where('dta_our_collections.status_approval', 2)
            ->where('dta_our_collections.status', 1)
            ->where('mt_provinsi.id_provinsi', '!=', 0)
            ->groupBy('mt_provinsi.id_provinsi')
            ->get();

        $data = [];
        $data['type'] = 'FeatureCollection';

        foreach ($exec as $item) {
            $data['features'][] = [
                'type' => 'Feature',
                'properties' => [
                    'id_provinsi' => $item->id_provinsi,
                    'Provinsi' => $item->nama,
                    'total' => $item->total,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $item->latitude,
                        $item->longitude,
                    ],
                ],
            ];
        }

        return response()->json($data, 200);
    }

    public function search(Request $request)
    {
        $q = $request->q;

        $query = OurCollection::select('dta_our_collections.*')->where('status', 1);

        if ($q) {
            $query->where(function ($query) use ($q) {
                $query->where('dta_our_collections.nama', 'like', "%$q%")
                    ->orWhere('dta_our_collections.pencipta', 'like', "%$q%")
                    ->orWhere('dta_our_collections.kd_kabkota', 'like', "%$q%")
                    ->orWhere('dta_our_collections.kd_prov', 'like', "%$q%");
            });
        }

        $our_collections = $query->paginate(12);

        return view('landing.pages.our-collections.lists-all', compact('our_collections'));
    }
}
