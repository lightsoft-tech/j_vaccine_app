<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    private $param;
    public function index()
    {
        $this->param['listVaccine'] = Vaccine::get();
        $this->param['countVaccine'] = 0;
        return view('pages.vaccine.show', $this->param);
    }

    public function create()
    {
        return view('pages.vaccine.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vaccine_name' => 'required',
            'vaccine_price' => 'required',
            'vaccine_description' => 'required',
            'vaccine_image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        $newVaccine = new Vaccine;
        $newVaccine->name = $request->vaccine_name;
        $newVaccine->price = $request->vaccine_price;
        $newVaccine->description = $request->vaccine_description;

        if ($request->file('vaccine_image')) {
            $request->file('vaccine_image')->move('upload/vaccine', $date.$random.$request->file('vaccine_image')->getClientOriginalName());
            $newVaccine->image = $date.$random.$request->file('vaccine_image')->getClientOriginalName();
        }

        $newVaccine->save(['timestamps' => false]);
        return redirect('/vaccine');
    }

    
    public function edit(Vaccine $vaccine)
    {
        $this->param['getVaccine'] = Vaccine::where('id', $vaccine->id)->first();
        return view('pages.vaccine.edit', $this->param);
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        $request->validate([
            'vaccine_name' => 'required',
            'vaccine_price' => 'required',
            'vaccine_description' => 'required',
            'vaccine_image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        $newVaccine = Vaccine::find($vaccine->id);
        $newVaccine->name = $request->vaccine_name;
        $newVaccine->price = $request->vaccine_price;
        $newVaccine->description = $request->vaccine_description;

        if ($request->file('vaccine_image')) {
            $request->file('vaccine_image')->move('upload/vaccine', $date.$random.$request->file('vaccine_image')->getClientOriginalName());
            $newVaccine->image = $date.$random.$request->file('vaccine_image')->getClientOriginalName();
        }

        $newVaccine->save(['timestamps' => false]);
        return redirect('/vaccine');
    }

    public function destroy(Vaccine $vaccine)
    {
        Vaccine::destroy('id', $vaccine->id);
        return redirect('/vaccine');
    }
}
