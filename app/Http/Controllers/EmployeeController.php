<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Employee::orderBy('id','asc')->paginate(5);
        return view('employee.index', ['queries'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'telepon' => 'required',
                'gender' => 'required',
                'pendidikan' => 'required',
                'unit_kerja' => 'required',
                'jabatan' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'telepon.required' => 'Kolom No. Telepon tidak boleh kosong',
                'gender.required' => 'Gender tidak boleh kosong',
                'pendidikan.required' => 'Pilihan Pendidikan tidak boleh kosong',
                'unit_kerja.required' => 'Unit Kerja tidak boleh kosong',
                'jabatan.required' => 'Kolom Jabatan tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ],
        );

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = 'foto' . date('Ymd') . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/foto/' . $filename);
        }

        Employee::create([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'pendidikan' => $request->pendidikan,
            'unit_kerja' => $request->unit_kerja,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);

        return redirect()
            ->route('employee.index')
            ->with('success', 'Data Employee sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.detail', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(
            [
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'telepon' => 'required',
                'gender' => 'required',
                'pendidikan' => 'required',
                'unit_kerja' => 'required',
                'jabatan' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'telepon.required' => 'Kolom No. Telepon tidak boleh kosong',
                'gender.required' => 'Gender tidak boleh kosong',
                'pendidikan.required' => 'Pilihan Pendidikan tidak boleh kosong',
                'unit_kerja.required' => 'Unit Kerja tidak boleh kosong',
                'jabatan.required' => 'Kolom Jabatan tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ],
        );

        if ($request->hasFile('foto')) {
            Storage::delete('public/foto/' . $employee->foto);
            $foto = $request->file('foto');
            $filename = 'foto' . date('Ymd') . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/foto/' . $filename);

            $employee->update([
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'telepon' => $request->telepon,
                'gender' => $request->gender,
                'pendidikan' => $request->pendidikan,
                'unit_kerja' => $request->unit_kerja,
                'jabatan' => $request->jabatan,
                'foto' => $filename,
            ]);
        } else {
            $employee->update([
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'telepon' => $request->telepon,
                'gender' => $request->gender,
                'pendidikan' => $request->pendidikan,
                'unit_kerja' => $request->unit_kerja,
                'jabatan' => $request->jabatan,
            ]);
        }

        return redirect()
            ->route('employee.index')
            ->with('success', 'Data Employee Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        Storage::delete('public/foto/' . $employee->foto);

        return redirect()
            ->route('employee.index')
            ->with('success', 'Data Employee berhasil dihapus');
    }
}
