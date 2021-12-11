<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $param;
    public function index()
    {
        $this->param['listPatient'] = Patient::get();
        $this->param['listVaccine'] = Vaccine::get();
        $this->param['countPatient'] = 0;
        return view('pages.patient.show', $this->param);
    }

    public function listVaccine()
    {
        $this->param['listVaccine'] = Vaccine::get();
        return view('pages.patient.show-list-vaccine', $this->param);
    }

    public function create(Vaccine $vaccine)
    {
        $this->param['getVaccine'] = Vaccine::where('id', $vaccine->id)->first();
        return view('pages.patient.add', $this->param);
    }

    public function store(Request $request, Vaccine $vaccine)
    {
        $request->validate([
            'patient_name' => 'required',
            'patient_nik' => 'required',
            'patient_address' => 'required',
            'ktp_image' => 'image|mimes:jpeg,png,jpg',
            'patient_phone' => 'required'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        $newPatient = new Patient;
        $newPatient->vaccine_id = $vaccine->id;
        $newPatient->name = $request->patient_name;
        $newPatient->nik = $request->patient_nik;
        $newPatient->alamat = $request->patient_address;

        if ($request->file('ktp_image')) {
            $request->file('ktp_image')->move('upload/ktp', $date.$random.$request->file('ktp_image')->getClientOriginalName());
            $newPatient->image_ktp = $date.$random.$request->file('ktp_image')->getClientOriginalName();
        }

        $newPatient->no_hp = $request->patient_phone;

        $newPatient->save();
        return redirect('/patient');
    }

    public function edit(Patient $patient)
    {
        $this->param['getPatient'] = Patient::where('id', $patient->id)->first();
        $this->param['getVaccine'] = Vaccine::where('id', $this->param['getPatient']->vaccine_id)->first();
        return view('pages.patient.edit', $this->param);
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'patient_name' => 'required',
            'patient_nik' => 'required',
            'patient_address' => 'required',
            'ktp_image' => 'image|mimes:jpeg,png,jpg',
            'patient_phone' => 'required'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);
        $this->param['getVaccine'] = Vaccine::where('id', $patient->vaccine_id)->first();

        $newPatient = Patient::find($patient->id);
        $newPatient->vaccine_id = $this->param['getVaccine']->id;
        $newPatient->name = $request->patient_name;
        $newPatient->nik = $request->patient_nik;
        $newPatient->alamat = $request->patient_address;

        if ($request->file('ktp_image')) {
            $request->file('ktp_image')->move('upload/ktp', $date.$random.$request->file('ktp_image')->getClientOriginalName());
            $newPatient->image_ktp = $date.$random.$request->file('ktp_image')->getClientOriginalName();
        }

        $newPatient->no_hp = $request->patient_phone;

        $newPatient->save();
        return redirect('/patient');
    }

    public function destroy(Patient $patient)
    {
        Patient::destroy('id', $patient->id);
        return redirect('/patient');
    }
}
