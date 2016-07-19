<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);
Route::get('compras/{product}/{quantity}', [
    'uses' => 'ShoppingController@add',
    'as' => 'shopping'
]);

Route::get('eliminar-compra/{p}',[
    'uses'  => 'ShoppingController@delete',
    'as'    => 'cartDelete'
]);


Route::get('presupuestar',[
    'uses'  => 'BudgetController@show',
    'as'    => 'budget'
]);
Route::get('presupuesto-nuevo',[
    'uses'  => 'BudgetController@add',
    'as'    => 'addBudget'
])->middleware('auth');

Route::get('producto/{slug}/{id}', [
    'uses' => 'ProductController@productDetailFront',
    'as' => 'productDetail'
]);

Route::post('finalizar-compra',[
    'uses' => 'OrderController@add',
    'as' => 'newOrder'
]);

Route::get('precios', [
    'uses' => 'HomeController@pricing',
    'as' => 'pricing'
]);


Route::get('finalizar-compra', [
    'uses' => 'ProductController@checkout',
    'as' => 'checkout'
]);

Route::get('preguntas-frecuentes', [
    'uses' => 'HomeController@indexFaqs',
    'as' => 'faqs'
]);

//**************** Formulario de contacto ******************//
Route::get('contacto', [
    'uses' => 'HomeController@indexContact',
    'as' => 'contactForm'
]);

Route::post('contacto', [
    'uses' => 'HomeController@postContact',
    'as' => 'contactForm'
]);

Route::post('questions/new', [
    'uses' => 'ProductController@addQuestion',
    'as' => 'addQuestion'
]);

Route::post('searchBar', [
    'uses' => 'HomeController@searchBar',
    'as' => 'searchBar'
]);

/*
 * Ruta de productos
 * */

Route::get('productos/{name?}',[
    'uses' => 'ProductController@productFront',
    'as' => 'product'
]);

Route::get('prueba', function(){
    return view('back.productProviderPreview');
});