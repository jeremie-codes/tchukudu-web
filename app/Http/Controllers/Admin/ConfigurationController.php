<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::all()
            ->pluck('value', 'key')
            ->toArray();

        return view('admin.configurations.index', compact('configurations'));
    }

    public function update(Request $request)
    {
        $section = $request->input('section');
        $data = $request->except(['_token', 'section']);

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = json_encode($value);
            }

            Configuration::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.configurations.index')
            ->with('success', 'Configuration updated successfully.');
    }
}
