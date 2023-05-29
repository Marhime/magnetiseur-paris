<?php

use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
    $page = [
        'title' => "Page d'accueil | Dominique Joyes : Magnétiseur guérisseur",
        'description' => "Magnétiseur reconnu pour soigner maux de peau, troubles de personnalité, physiques, comportement et respiratoires à Paris et en Ardèche.",
        'keywords' => 'magnétiseur paris, joyes, dominique joyes, joyes dominique, magnétiseur, guérisseur, rebouteux, thérapeute, ardèche, paris, ardeche magnetiseur, paris magnetiseur, medecine naturelle, medecine douce',
        'url' => 'https://magnetiseur-paris.fr',
        'domain' => 'https://magnetiseur-paris.fr',
    ];
    return view('home', [
        'page' => $page,
    ]);
})->name('home');

Route::get('/magnetisme', function () {
    $page = [
        'title' => "Le magnétisme | Dominique Joyes : Magnétiseur guérisseur",
        'description' => "Le magnétisme curatif : une énergie vitale rééquilibrante pour guérir et soulager divers maux, en harmonie avec notre environnement.",
        'keywords' => 'magnétiseur paris, joyes, dominique joyes, joyes dominique, magnétiseur, guérisseur, rebouteux, thérapeute, ardèche, paris, ardeche magnetiseur, paris magnetiseur, medecine naturelle, medecine douce',
        'url' => 'https://magnetiseur-paris.fr/magnetisme',
        'domain' => 'https://magnetiseur-paris.fr',
    ];
    return view('magnetisme', [
        'page' => $page,
    ]);
})->name('magnetisme');

Route::get('/services', function () {
    $page = [
        'title' => "Mes services | Dominique Joyes : Magnétiseur guérisseur",
        'description' => "Découvrez mes services: accompagnement respectueux, détection et extraction d&#039;énergies nocives pour un bien-être durable.",
        'keywords' => 'magnétiseur paris, joyes, dominique joyes, joyes dominique, magnétiseur, guérisseur, rebouteux, thérapeute, ardèche, paris, ardeche magnetiseur, paris magnetiseur, medecine naturelle, medecine douce',
        'url' => 'https://magnetiseur-paris.fr/services',
        'domain' => 'https://magnetiseur-paris.fr',
    ];

    return view('services', [
        'page' => $page,
    ]);
})->name('services');

Route::get('/temoignages', function () {
    $page = [
        "title" => "Témoignages | Dominique Joyes : Magnétiseur guérisseur",
        'description' => "Explorez les témoignages du célèbre magnétiseur Joyes Dominique et découvrez l&#039;impact de ses pratiques sur la vie de ses clients.",
        'keywords' => 'magnétiseur paris, joyes, dominique joyes, joyes dominique, magnétiseur, guérisseur, rebouteux, thérapeute, ardèche, paris, ardeche magnetiseur, paris magnetiseur, medecine naturelle, medecine douce',
        'url' => 'https://magnetiseur-paris.fr/temoignages',
        'domain' => 'https://magnetiseur-paris.fr',
    ];
    return view('testimonials', [
        'page' => $page,
        'testimonials' => Message::where('published', 1)->orderBy('created_at', 'desc')->get(),
    ]);
})->name('testimonials');

Route::get('/contact', function () {
    $page = [
        "title" => "Contact | Dominique Joyes : Magnétiseur guérisseur",
        'description' => "Prenez rendez-vous au 06 16 66 01 36. Laissez vos témoignages et posez vos questions via le formulaire ci-dessous.",
        'keywords' => 'magnétiseur paris, joyes, dominique joyes, joyes dominique, magnétiseur, guérisseur, rebouteux, thérapeute, ardèche, paris, ardeche magnetiseur, paris magnetiseur, medecine naturelle, medecine douce',
        'url' => 'https://magnetiseur-paris.fr/contact',
        'domain' => 'https://magnetiseur-paris.fr',
    ];
    return view('contact', [
        'page' => $page,
    ]);
})->name('contact');

Route::get('/mentions-legales', function () {
    $page = [
        "title" => "Mentions légales | Dominique Joyes : Magnétiseur guérisseur",
        'description' => "Mentions légales du site de Dominique Joyes, magnétiseur guérisseur à Paris et en Ardèche.",
        'keywords' => 'magnétiseur paris, joyes, dominique joyes, joyes dominique, magnétiseur, guérisseur, rebouteux, thérapeute, ardèche, paris, ardeche magnetiseur, paris magnetiseur, medecine naturelle, medecine douce',
        'url' => 'https://magnetiseur-paris.fr/mentions-legales',
        'domain' => 'https://magnetiseur-paris.fr',
    ];
    return view('legal', [
        'page' => $page,
    ]);
})->name('legal');

Route::post('/contact', [MessageController::class, 'contact'])
    ->middleware(['honey'])
    ->name('messages.contact');

Route::resource('messages', MessageController::class)
    ->only(['store', 'create', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

// create routes for admin with subroutes for messages, testimonials, questions, and other
Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/temoignages', [MessageController::class, 'testimonials'])
    ->middleware(['auth', 'verified'])->name('messages.testimonials');
Route::get('/admin/questions', [MessageController::class, 'questions'])
    ->middleware(['auth', 'verified'])->name('messages.questions');
Route::get('/admin/autre', [MessageController::class, 'others'])
    ->middleware(['auth', 'verified'])->name('messages.others');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
