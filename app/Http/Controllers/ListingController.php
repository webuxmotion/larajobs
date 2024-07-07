<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->paginate(6)
        ]);
    }

    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view('listings.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'logo' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => ['required', Rule::unique('listings', 'description')]
        ]);

        if ($request->logo) {
            $formFields['logo'] = $request->logo->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'logo' => '',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => ['required']
        ]);

        if ($request->logo) {
            $formFields['logo'] = $request->logo->store('logos', 'public');
        }
        
        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing) {
        $storage_path = storage_path("app/public/" . $listing->logo);

        if (is_file($storage_path) && file_exists($storage_path)) {
            unlink($storage_path);
        }
        
        $listing->delete();

        return redirect('/')->with("message", "Listing deleted successfully!");
    }
}
