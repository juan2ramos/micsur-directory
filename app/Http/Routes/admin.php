<?php

Route::group(['namespace' => 'admin'], function () {

    Route::get('productos', [
        'uses' => 'ProductController@index',
        'as' => 'products',
        'middleware' => 'VerifyProvider',
    ]);

    Route::post('productos/delete/{id}', [
        'uses' => 'ProductController@lockProduct',
        'as' => 'deleteProduct'
    ]);

    Route::post('productos', [
        'uses' => 'ProductController@newProduct',
        'as' => 'newProduct',
    ]);

    Route::get('producto/edit/{id}', [
        'uses' => 'ProductController@editProduct',
        'as' => 'editProduct'
    ]);

    Route::post('producto/update/{id}', [
        'uses' => 'ProductController@updateProduct',
        'as' => 'updateProduct'
    ]);

    Route::post('subcategoriesQuery', [
        'uses' => 'CategoryController@subcategoriesQuery',
        'as' => 'subcategoriesQuery',
    ]);
    Route::post('featuresQuery', [
        'uses' => 'CategoryController@featuresQuery',
        'as' => 'featuresQuery',
    ]);
    Route::get('agentsGet', [
        'uses' => 'UserController@agentsGet',
        'as' => 'agentsGet',
    ]);
    Route::get('user/{id}', [
        'uses' => 'UserController@user',
        'as' => 'user',
    ]);
    Route::post('newUserAdmin', [
        'uses' => 'UserController@newUserAdmin',
        'as' => 'newUserAdmin',
    ]);

    Route::get('proveedor/producto/{id}', [
        'uses' => 'ProductController@productAgentPreview',
        'as' => 'productAgentPreview'
    ]);

    Route::post('preview', [
        'uses' => 'ProductController@productDetailPreview',
        'as' => 'productDetailPreview'
    ]);

    Route::post('proveedor/producto/{id}', [
        'uses' => 'ProductController@validateProduct',
        'as' => 'validateProduct'
    ]);

    Route::get('clientes', [
        'uses' => 'ClientController@showClients',
        'as' => 'clients'
    ]);
});

Route::get('proveedores', [
    'uses' => 'ProviderController@showProviders',
    'as' => 'providers'
]);

Route::get('ofertas', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'offers'
]);
Route::get('facturas', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'bills'
]);
Route::get('pedidos', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'orders',
    'middleware' => 'VerifyProvider',
]);
Route::get('reportes', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'reports'
]);
Route::get('usuarios', [
    'uses' => 'UserController@index',
    'as' => 'users'
]);

Route::get('proveedor/{id}', [
    'uses' => 'UserController@showUser',
    'as' => 'showUser'
]);

Route::get('proveedor/{id}/update', [
    'uses' => 'UserController@validateProvider',
    'as' => 'validateProvider'
]);

Route::get('categorias', [
    'uses' => 'CategoryController@index',
    'as' => 'category'
]);

Route::post('categorias', [
    'uses' => 'CategoryController@newCategory',
    'as' => 'category'
]);
Route::post('categorias/{id}', [
    'uses' => 'CategoryController@destroyCategory',
    'as' => 'categoryDelete'
]);

/* Search */
Route::post('proveedores', [
    'uses' => 'ProviderController@searchProviders',
    'as' => 'searchProvider'
]);
Route::post('usuarios', [
    'uses' => 'UserController@searchUsers',
    'as' => 'searchUser'
]);


Route::post('updateProvider/{id}', [
    'uses' => 'ProviderController@updateProvider',
    'as' => 'updateProvider',
]);

Route::post('categorias', [
    'uses' => 'CategoryController@newSubcategory',
    'as' => 'newSubcategory',
]);




Route::get('cultivos', [
    'uses' => 'FarmController@index',
    'as' => 'farmIndex',

]);
Route::get('/', [
    'uses' => 'HomeAdminController@index',
    'as' => 'admin',
    'middleware' => 'VerifyProvider'
]);

Route::get('proveedor', [
    'uses' => 'HomeAdminController@isValidateProviders',
    'as' => 'isValidateProviders',

]);

/* Provider without register in providers table   */

Route::get('registro-proveedor', [
    'uses' => 'ProviderController@registerProvider',
    'as' => 'registerProvider',
]);

Route::post('registro-proveedor', [
    'uses' => 'ProviderController@insertProvider',
    'as' => 'registerProvider',
]);

Route::post('data-provider', [
    'uses' => 'ProviderController@insertProvider',
    'as' => 'insertProvider',
]);

Route::get('informacion-cliente', [
    'uses' => 'ClientController@index',
    'as' => 'clientInformationIndex',

]);

Route::post('informacion-cliente', [
    'uses' => 'ClientController@store',
    'as' => 'clientInformationStore',
]);


Route::get('preguntas', [
    'uses' => 'QuestionController@index',
    'as' => 'questions',
    'middleware' => 'VerifyProvider',
]);

Route::post('preguntas', [
    'uses' => 'QuestionController@questionDetail',
    'as' => 'questionDetail',
    'middleware' => 'VerifyProvider',
]);

route::post('preguntas/new', [
    'uses' => 'QuestionController@questionNew',
    'as' => 'questionNew',
    'middleware' => 'VerifyProvider',
]);

route::post('download-pdf', [
    'uses' => 'BudgetController@download',
    'as' => 'downloadBudget',
]);

Route::get('mis-presupuestos', [
    'uses' => 'BudgetController@showBack',
    'as' => 'budgetShow',
]);

Route::get('mis-compras', [
    'uses' => 'ShoppingController@showBack',
    'as' => 'orderShow',
]);

Route::get('mis-ordenes', [
    'uses' => 'ShoppingController@showBackProvider',
    'as' => 'orderShowProvider',
]);


Route::get('perfil', [
    'uses' => 'UserController@indexProfile',
    'as' => 'indexProfile'
]);

Route::post('perfil', [
    'uses' => 'UserController@userUpdate',
    'as' => 'userUpdate'
]);
Route::post('updateStateOrder', [
    'uses' => 'OrderController@updateStateOrder',
    'as' => 'updateStateOrder'
]);

Route::post('NotifyIsActive', [
    'uses' => 'NotificationController@isActive',
    'as' => 'NotifyIsActive'
]);


Route::get('notificaciones', [
    'uses' => 'NotificationController@index',
    'as' => 'NotifyAll'
]);


