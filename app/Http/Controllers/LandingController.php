<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Parameter;
use App\Models\CategoriesOurCollection;
use App\Models\OurCollection;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index() {
        
        return view('landing.pages.home1');
    }
    
    public function home2() {
        $param = Parameter::data();
        $main_our_collection_1 = OurCollection::where('status', 1)
                ->where('status_approval', 2)
                ->where('slug', '!=', 'about-us')
                ->latest()
                ->first();
        $main_our_collection_2 = OurCollection::where('status', 1)
                ->where('status_approval', 2)
                ->latest()
                ->skip(1)
                ->take(2)
                ->get();
        $kategori = DB::table('dta_categories_our_collection')
                ->select('dta_categories_our_collection.id', 'dta_categories_our_collection.nama', DB::raw('COUNT(dta_our_collections.id) as total'))
                ->join('dta_our_collections', 'dta_categories_our_collection.id', '=', 'dta_our_collections.id_category')
                ->where([
                    ['dta_our_collections.status', 1],
                    ['dta_our_collections.status_approval', 2]
                ])
                ->groupBy('dta_categories_our_collection.id');

        $subkategori = DB::table('dta_categories_our_collection')
                ->select('dta_categories_our_collection.id', 'dta_categories_our_collection.nama', DB::raw('COUNT(dta_our_collections.id) as total'))
                ->join('dta_our_collections', 'dta_categories_our_collection.id', '=', 'dta_our_collections.sub_category')
                ->where([
                    ['dta_our_collections.status', 1],
                    ['dta_our_collections.status_approval', 2]
                ])
                ->groupBy('dta_categories_our_collection.id');

        $tot_collection = DB::table('dta_categories_our_collection')
                ->select(
                        'dta_categories_our_collection.nama',
                        DB::raw('IF(kategori.total IS NULL, 0, kategori.total) as total_kategori'),
                        DB::raw('IF(subkategori.total IS NULL, 0, subkategori.total) as total_subkategori')
                )
                ->leftJoinSub($kategori, 'kategori', function ($join) {
                    $join->on('dta_categories_our_collection.id', '=', 'kategori.id');
                })
                ->leftJoinSub($subkategori, 'subkategori', function ($join) {
                    $join->on('dta_categories_our_collection.id', '=', 'subkategori.id');
                })
                ->where('dta_categories_our_collection.status', 1)
                ->groupBy('dta_categories_our_collection.id')
                ->orderByDesc('total_kategori')
                ->orderByDesc('total_subkategori')
                ->get();
        $categories_our_collection = CategoriesOurCollection::where('status', 1)->orderBy('urutan')->get();
        $total_our_collections = OurCollection::where('status', 1)->where('status_approval', 2)->count();
        $dta_our_collection = OurCollection::where('status', 1)
                ->where('status_approval', 2)
                ->latest()
                ->skip(3)
                ->take(3)
                ->get();

        return view('landing.pages.home', compact('param', 'categories_our_collection', 'total_our_collections', 'tot_collection', 'main_our_collection_1', 'main_our_collection_2', 'dta_our_collection'));
    }

    public function show_collections(Request $request, $slug) {
        $param = Parameter::data();

        // Define the categories for collections
        $categories_our_collection = $this->getCategoryCollection($slug);

        // Build the base query for our collections
        $query = $this->buildCollectionQuery($slug, $categories_our_collection);

        // Apply search filters if provided
        if ($request->has('search')) {
            $this->applySearchFilters($query, $request->search, $request->filter);
        }

        // Paginate the results
        $our_collections = $query->paginate(12);

        // Return the view with the data
        return view('landing.pages.our-collections.lists', compact('our_collections', 'categories_our_collection', 'param'));
    }

    private function getCategoryCollection($slug) {
        if ($slug === 'all') {
            return (object) [
                        'nama' => 'Semua Koleksi',
                        'slug' => 'all',
                        'urutan' => 1
            ];
        }

        return CategoriesOurCollection::where('status', 1)
                        ->where('slug', $slug)
                        ->firstOrFail();
    }

    private function buildCollectionQuery($slug, $categories_our_collection) {
        $query = OurCollection::query()
                ->where('status', 1)
                ->where('status_approval', 2);

        if ($slug !== 'all') {
            $query->where(function ($query) use ($categories_our_collection) {
                $query->where('id_category', $categories_our_collection->id)
                        ->orWhere('sub_category', $categories_our_collection->id);
            });
        } else {
            $query->where('slug', '!=', 'about-us');
        }

        return $query;
    }

    private function applySearchFilters($query, $search, $filter) {
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

    public function show_collection_detail($slug)
    {
        $param = Parameter::data();
        $our_collection = OurCollection::where('slug', $slug)->firstOrFail();
        $category = CategoriesOurCollection::findOrFail($our_collection->id_category);
        $random_collections = OurCollection::where('id', '!=', $our_collection->id)
                                           ->inRandomOrder()
                                           ->take(4)
                                           ->get();

        return view('landing.pages.our-collections.show-detail', compact('our_collection', 'category', 'random_collections', 'param'));
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
        $param = Parameter::data();
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

        return view('landing.pages.our-collections.lists-all', compact('our_collections', 'param'));
    }
}
