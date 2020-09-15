<?php

namespace App\Http\Controllers\Modul;

use App\RandomAyat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Transformers\RandomAyatTransformer;
use League\Fractal\Serializer\ArraySerializer;
use App\Transformers\IlluminatePaginatorAdapter;

class RandomAyatController extends Controller
{
    // Set limit replace 5 with get data from options
    protected $perPage = 5;

    // without Login
    public function quote()
    {
        $randomayat = RandomAyat::inRandomOrder()
            ->limit(1)
            ->first();

        $response = fractal()
            ->item($randomayat)
            ->transformWith(new RandomAyatTransformer)
            ->toArray();

        return response()->json($response, 200);
    }

    public function index()
    {
        $paginator = RandomAyat::paginate($this->perPage);
        $randomayat = $paginator->getCollection();
        $response = fractal()
            ->collection($randomayat, New RandomAyatTransformer)
            ->serializeWith(new ArraySerializer)
            ->paginateWith(New IlluminatePaginatorAdapter($paginator))
            ->toArray();
        return response()->json($response, 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'arabic' => 'required',
            'indonesia' => 'required'
        ]);

        $randomayat = RandomAyat::create([
            'arabic' => $request->arabic,
            'indonesia' => $request->indonesia
        ]);
        
        $response = fractal()
            ->item($randomayat)
            ->addMeta(['message' => 'Data berhasilditambahkan'])
            ->transformWith(New RandomAyatTransformer)
            ->toArray();

        return response()->json($response, 201);
    }

    public function show($id)
    {
        $randomayat = RandomAyat::find($id);
        $response = fractal()
            ->item($randomayat)
            ->transformWith(New RandomAyatTransformer)
            ->toArray();
        
        return response()->json($response, 200);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'arabic' => 'required',
            'indonesia' => 'required'
        ]);

        $randomayat = RandomAyat::find($id);
        $randomayat->arabic = $request->arabic;
        $randomayat->indonesia = $request->indonesia;
        $randomayat->save();

        $response = fractal()
                ->item($randomayat)
                ->addMeta(['message' => 'Data Berhasil diperbarui'])
                ->transformWith(New RandomAyatTransformer)
                ->toArray();

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $randomayat = RandomAyat::find($id);
        $randomayat->delete();
        return response()->json(['message' => 'Hore, password berhasil dihapus'], 200);
    }
}
