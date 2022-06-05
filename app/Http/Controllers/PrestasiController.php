<?php

namespace App\Http\Controllers;


use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $items = Prestasi::all();
        return view('pages.admin.prestasi.index', [
            'items' => $items
        ]);
    }

    public function kelola()
    {
        $items = Prestasi::where('user_id', Auth::user()->id)->get();
        return view('pages.prestasi.index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:pdf', 'max:5124'],
        ]);

        $value = $request->file('bukti');
        $extension = $value->extension();
        $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file-pdf', $value, $fileNames);

        Prestasi::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.index');
    }

    public function store2(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:pdf', 'max:5124'],
        ]);

        $value = $request->file('bukti');
        $extension = $value->extension();
        $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file-pdf', $value, $fileNames);

        Prestasi::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.kelola');
    }

    public function show(Request $request, $id)
    {
        $item = Prestasi::findOrFail($id);

        if ($request->bukti) {
            $value = $request->file('bukti');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->bukti;
        }

        return view('pages.admin.prestasi.show', [
            'item' => $item
        ]);
    }


    public function edit($id)
    {
        $item = Prestasi::findOrFail($id);

        return view('pages.admin.prestasi.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:pdf', 'max:5124'],
        ]);

        $item = Prestasi::findOrFail($id);

        if ($request->bukti) {
            $value = $request->file('bukti');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->bukti;
        }

        $item->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.index');
    }

    public function update2(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'prestasi' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'bukti' => ['mimes:pdf', 'max:5124'],
        ]);

        $item = Prestasi::findOrFail($id);

        if ($request->bukti) {
            $value = $request->file('bukti');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->bukti;
        }

        $item->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'prestasi' => $request->prestasi,
            'penyelenggara' => $request->penyelenggara,
            'tingkat' => $request->tingkat,
            'bukti' => $fileNames
        ]);

        return redirect()->route('prestasi.kelola');
    }

    public function destroy($id)
    {
        $item = Prestasi::findOrFail($id);

        $item->delete();

        return redirect()->route('prestasi.index');
    }

    public function destroy2($id)
    {
        $item = Prestasi::findOrFail($id);

        $item->delete();
        return redirect()->route('prestasi.kelola');
    }

    public function cetak($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetak = Prestasi::whereBetween('tanggal', [$tglawal, $tglakhir])->latest()->get();

        return view('pages.admin.prestasi.cetak', compact('cetak'));
    }
}
