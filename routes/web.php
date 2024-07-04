<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listings', [
        'listings' => Listing::all()
    ]);
});


// Route::get('/listings/{id}', function($id) {
//     $listing = Listing::find($id);

//     if ($listing) {
//         return view('listing', [
//             'listing' => Listing::find($id)
//         ]);
//     }

//     abort('404');
//   });

Route::get('/listings/{listing}', function(Listing $listing) {
    return view('listing', [
        'listing' => $listing
    ]);
});