<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;
use Modules\Countries\Entities\City;

class TownController extends Controller
{
    public function addTown($id)
    {
        return view('dashboard.towns.addtown', compact('id'));
    }

    public function addTowndone(Request $request)
    {
        //return $request;
        $data = $request->all();
        City::create($data);
        // return redirect('townsCountry/' . $request->country_id);
        return redirect()->route('townsCountry', ['id' => $request->country_id]);
    }

    public function editTown($id)
    {
        $town = City::where('id', $id)->first();
        return view('dashboard.towns.edittown', compact('town'));
    }

    public function editTowndone(Request $request, $id)
    {
        City::where('id', $id)->update([
            'town_name' => $request->town_name
        ]);

        $town  = City::where('id', $id)->get();
        // return redirect('townsCountry/' . $town[0]->country_id);
        return redirect()->route('townsCountry', ['id' => $town[0]->country_id]);
    }

    public function deleteTown(Request $request)
    {
        City::where('id', $request->id_town)->delete();
        return back();
    }
}
