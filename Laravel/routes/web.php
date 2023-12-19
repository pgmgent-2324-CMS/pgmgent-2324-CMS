<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teacher/(.*)', [TeacherController::class, 'detail']);


Route::get('/sitemap', function(Response $response) {
    $teachers = Teacher::all();
    $xml = new SimpleXMLElement('<xml/>');
    foreach ($teachers as $teacher) {
        $track = $xml->addChild('url');
        $track->addChild('loc', 'https://www.lesrooster.be/teacher/' . $teacher->id);
        $track->addChild('lastmod', $teacher->updated_at->tz('UTC')->toAtomString());
        $track->addChild('priority', '0.8');
        $track->addChild('changefreq', 'monthly');
    }
    $response->header('Content-Type', 'text/xml');
    return $xml->asXML();
});

require __DIR__.'/auth.php';
