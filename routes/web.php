<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  '<h1> Welcome to My NEW Website! </h1>
    <p>
    Maryam Abbas Laravel app 2
    </p>
<ul>
  <li><a href="/module2a/price_engine">module2a</a></li>
  <li><a href="/module2a/price_engine_refactored">module2a pt 2</a></li>
  <li><a href="/module3/contactform">module3a</a></li>
   <li><a href="/module3/module3b-createform">module3b</a></li>
</ul>
    ';
});




Route::get('/test1', function () {
    return view('test1');
});



Route::get('/module3/contactform', function () {
    return view('module3.contactform');
});


Route::get('/module2a/price_engine', function () {
    return view('module2a.price_engine');
});

Route::get('/module2a/price_engine_refactored', function () {
    return view('module2a.price_engine_refactored');
});


Route::get('/module2b/cosmic_calendar', function () {
    return view('module2b.cosmic_calendar');
});

Route::get('/module3/module3b-createform', function () {
    return view('module3.module3b-createform');
});

?>
