<?php

namespace App\Http\Controllers\Modul;

use App\Helpers\getOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Option;
use App\Transformers\OptionTransformer;

class OptionController extends Controller
{
    public function getOption($name)
    {
        return getOption::get_option($name);
    }

    public function updateOption(Request $request, $name){
        $this->validate($request, [
            'value' => 'required',
        ]);

        $option = Option::whereName($name)->first();
        $option->value = $request->value;
        $option->save();

        $response = fractal()
            ->item($option)
            ->addMeta(['message' => 'Pengaturan berhasil disimpan'])
            ->transformWith(New OptionTransformer)
            ->toArray();
        return response()->json($response, 200);
    }
}
