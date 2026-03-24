<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie; 


Route::get('/aboutus', function () {
    return view('about');
})->name('about');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');






//--------------------------------------------Passing data to views------------------
//can also use view directly instead of closure function
Route::get('/data-array', function () {
    return view('hello', [
        'name' => 'Amish',
        'id' => 101,                    //Array method to pass data to view
        'address' => 'Punjab'
    ]);
});

Route::get('/data-with', function () {
    return view('hello')->with('withName', 'Amish');   //with method to pass data to view
});

Route::get('/data-compact', function () {
    $city = "Delhi";
    return view('hello', compact('city'));              //compact method to pass data to view
});

Route::get('/data-with-method', function () {
    return view('hello')                                //datawith method to pass data to  view
        ->with_Name('Amish')
        ->withId(101)
        ->withAddress('Punjab');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

//-------------------------------------------Cookie Routes-------------------------------------------
// set Cookie
Route::get('/set-cookie', function () {
    return response("Cookie has been set")->cookie('name', 'Amish', 120);
});

// get data from cookie
Route::get('/get-cookie', function () {
    $name = Cookie::get('name');
    return "Cookie value: " . $name;
});

// delete cookie
Route::get('/delete-cookie', function () {
    $cookie = Cookie::forget('name');
    return response("Cookie has been deleted")->withCookie($cookie);
});


//--------------------------------------------Route Parameters-------------------------------------------
// optional parameter
Route::get('/user/{name?}', function ($name = "Guest") {
    return "Hello, " . $name;
});

//constraint on parameter
Route::get('user/id/{id}', function ($id) {
    return "User ID: " . $id;
})->where('id', '[0-9]+');

//multiple parameters
//example: sum of two numbers
Route::get('/sum/{num1}/{num2}', function ($num1, $num2) {
    $sum = $num1 + $num2;
    return "The sum of $num1 and $num2 is: " . $sum;
})->where(['num1' => '[0-9]+', 'num2' => '[0-9]+']);    






//--------------------------------------------Response function------------------------------------------------------

//simple text response
Route::get('/response', function () {
    return response("This is a custom response", 200)
        ->header('Content-Type', 'text/plain');
});


//json response
Route::get('/json', function () {
    return response()->json([
        'name' => 'Amish',
        'age' => 30,
        'city' => 'Delhi'
    ]);

    /*other way of json data returning
    $data = [
        'name' => 'Amish',
        'age' => 30,
        'city' => 'Delhi'
    ];
    return ($data);
    */
});


//View response
Route::get('/view', function () {
    return response()->view('hello', ['name' => 'Amish']);
});

//redirect response
Route::get('/redirect', function () {
    return redirect('/home');
});


//custom 404 response
Route::get("/notfound", function () {
    return response("Page not found", 404);
});



//adding header via routes
Route::get('/custom-header', function () {
    return response("This response has a custom header")
        ->header('content type', 'text/plain')
        ->header('X-Custom-Header', 'CustomValue');
});

//header with json response
Route::get('/json-header', function () {
    return response()->json([
        'name' => 'Amish',
        'age' => 30,
        'city' => 'Delhi'
    ])->header('X-JSON-Header', 'JSONHeaderValue');
});

?>