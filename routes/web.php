<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RateController;
use App\Models\Details;
use App\Models\Images;
use App\Models\Ratings;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $ratings  = DB::table('ratings')->where('hide', false)->orderBy('created_at','desc')->get();
    $images = DB::table('images')->orderBy('created_at','desc')->get();
    $details = DB::table('details')->first();
    return view('welcome', compact('ratings', 'images', 'details'));
});
Route::post('/rate', [RateController::class,'store'])->name('rate');

Route::get('/dashboard', function () {

    $ratings  = DB::table('ratings')->orderBy('created_at','desc')->paginate(10);

    return view('dashboard', compact('ratings'));

})->middleware(['auth'])->name('dashboard');

Route::get('images',function(){

    $images = DB::table('images')->orderBy('created_at','desc')->get();
    return view('images', compact('images'));

})->middleware(['auth'])->name('images');

Route::post('images-upload',function(Request $request){
    if($request->hasFile('images')){
        foreach ($request->file('images') as $img) {

            $path = $img->storePublicly('public/wedding','s3');
            $path = Storage::disk('s3')->url($path);

            $image = Images::create([
                'image'=>$path
            ]);
        }
    }
    return back();
})->middleware(['auth'])->name('images-upload');

Route::delete('delete-image/{id}',function($id){
    $image = Images::find($id);
    $image->delete();
    return back();
})->middleware(['auth'])->name('delete-image');

Route::get('/details', function(){
    $detail = null;

    if(Details::find(33)){
        $detail = Details::find(33) ?? null;
    }
    return view('footer', compact('detail'));
});

Route::post('/details-create', function(Request $request){

    if(Details::find(33)){
        $detail = Details::find(33);
        $request->validate([
            'location'=> 'nullable|string',
            'phoneone'=> 'nullable|string',
            'phonetwo'=> 'nullable|string',
            'snapchat'=> 'nullable|string',
            'instagram'=> 'nullable|string',
        ]);
        $detail->update([
            'location'=>$request->location,
            'phoneone'=>$request->phoneone,
            'phonetwo'=>$request->phonetwo,
            'snapchat'=>$request->snapchat,
            'instagram'=>$request->instagram,
        ]);
    }else{
        $request->validate([
            'location'=> 'nullable|string',
            'phoneone'=> 'nullable|string',
            'phonetwo'=> 'nullable|string',
            'snapchat'=> 'nullable|string',
            'instagram'=> 'nullable|string',
        ]);

        Details::create(
            [
                'id'=> 33,
                'location'=>$request->location,
                'phoneone'=>$request->phoneone,
                'phonetwo'=>$request->phonetwo,
                'snapchat'=>$request->snapchat,
                'instagram'=>$request->instagram,
            ]
        );
    }
    return back();
})->middleware(['auth'])->name('details-create');


Route::post('edit-rate/{id}',function($id){
    $rating = Ratings::find($id);
    $rating->hide = !$rating->hide;
    $rating->save();
    return back();
})->middleware(['auth'])->name('edit-rating');

Route::delete('delete-rate/{id}',function($id){
    $rating = Ratings::find($id);
    $rating->delete();
    return back();
})->middleware(['auth'])->name('delete-rating');

require __DIR__.'/auth.php';
