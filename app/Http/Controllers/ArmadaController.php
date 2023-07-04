<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArmadaRequest;
use App\Http\Requests\UpdateArmadaRequest;
use App\Models\Armada;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['model'] = Armada::all();
        $data['title'] = 'Armada';
        return view('armada.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['model'] = new Armada();
        $data['title'] = 'Tambah Armada';
        return view('armada.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'max_weight' => 'required|numeric',
            'length' => 'required|numeric',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
        ]);

        $armada = Armada::create([
            'name' => $request->name,
            'max_weight' => $request->max_weight,
            'length' => $request->length,
            'height' => $request->height,
            'width' => $request->width
        ]);

        // Upload images
        if ($request->file('files')) {
            $files = $request->file('files');
            foreach ($files as $file) {

            $filename = time() . Str::random(10) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads'), $filename);

                Picture::create([
                    'armada_id' => $armada->id,
                    'file_name' => $filename,
                ]);
            }
        }
        return redirect()->route('armadas.index')->with('success', 'Data armada berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Armada $armada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['model'] = Armada::findOrFail($id);
        $data['title'] = 'Edit armada';
        return view('armada.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'name' => 'required|min:5',
            'max_weight' => 'required|numeric',
            'length' => 'required|numeric',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
        ]);
        $customer = Armada::findOrFail($id);
        $customer->update($requestData);

        return redirect()->route('armadas.index')->with('success', 'Data armada berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Armada::find($id);
        $customer->delete();

        return back()->with('success', 'Data armada berhasil dihapus');
    }
}
