<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Chart\BranchChartController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Chart\CompanyChart;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
// Route::get('/', [ChartController::class, ('__invoke')])->name('index');





//auth
Route::get('getLogin', [AuthController::class, ('getLogin')])->name('getLogin');
Route::post('checkLogin', [AuthController::class, ('checkLogin')])->name('checkLogin');
Route::post('logout', [AuthController::class, ('logout')])->name('logout');



Route::group(['middleware' => ['AdminOwner']], function () {
    Route::get('changeUserStatus/{id}', [UserController::class, ('changeUserStatus')])->name('changeUserStatus');
    Route::get('getCompanyBranches/{id}', [CompanyController::class, ('getCompanyBranches')])->name('getCompanyBranches');
    Route::namespace('branch')->group(function () {
        Route::get('getAddBranch', [BranchController::class, ('getAddBranch')])->name('getAddBranch');
        Route::post('addBranch', [BranchController::class, ('addBranch')])->name('addBranch');

        Route::get('getUpdateBranch/{id}', [BranchController::class, ('getUpdateBranch')])->name('getUpdateBranch');
        Route::post('updateBranch', [BranchController::class, ('updateBranch')])->name('updateBranch');

        Route::get('getChangeManager/{id}', [BranchController::class, ('getChangeManager')])->name('getChangeManager');
        Route::post('changeManager', [BranchController::class, ('changeManager')])->name('changeManager');

        Route::get('deleteBranch/{id}', [BranchController::class, ('deleteBranch')])->name('deleteBranch');
        Route::get('changeBranchStatus/{id}', [BranchController::class, ('changeBranchStatus')])->name('changeBranchStatus');
    });
    Route::namespace('brand')->group(function () {
        Route::get('getAddBrand', [BrandController::class, ('getAddBrand')])->name('getAddBrand');
        Route::post('addBrand', [BrandController::class, ('addBrand')])->name('addBrand');

        Route::get('getUpdateBrand/{id}', [BrandController::class, ('getUpdateBrand')])->name('getUpdateBrand');
        Route::post('updateBrand', [BrandController::class, ('updateBrand')])->name('updateBrand');

        Route::get('deleteBrand/{id}', [BrandController::class, ('deleteBrand')])->name('deleteBrand');
        Route::get('getAllBrands', [BrandController::class, ('getAllBrands')])->name('getAllBrands');
    });


    Route::namespace('category')->group(function () {
        Route::get('getAddCategory', [CategoryController::class, ('getAddCategory')])->name('getAddCategory');
        Route::post('addCategory', [CategoryController::class, ('addCategory')])->name('addCategory');

        Route::get('getUpdateCategory/{id}', [CategoryController::class, ('getUpdateCategory')])->name('getUpdateCategory');
        Route::post('updateCategory', [CategoryController::class, ('updateCategory')])->name('updateCategory');

        Route::get('deleteCategory/{id}', [CategoryController::class, ('deleteCategory')])->name('deleteCategory');
        Route::get('getAllCategories', [CategoryController::class, ('getAllCategories')])->name('getAllCategories');
    });
});
Route::group(['middleware' => ['OwnerManager']], function () {
    Route::get('getCompanyProducts/{id}', [ProductController::class, ('getCompanyProducts')])->name('getCompanyProducts');
    Route::get('getAllProducts', [ProductController::class, ('getAllProducts')])->name('getAllProducts');
    Route::get('getStock/{id}', [StockInController::class, ('getStock')])->name('getStock');
    Route::get('getProductStockIn/{id}', [StockInController::class, ('getProductStockIn')])->name('getProductStockIn');
    Route::get('getBranchStockIn/{id}', [StockInController::class, ('getBranchStockIn')])->name('getBranchStockIn');
    Route::get('getBranchStockOut/{id}', [StockInController::class, ('getBranchStockOut')])->name('getBranchStockOut');
    Route::get('getAllBranchStockOut/{id}', [StockInController::class, ('getAllBranchStockOut')])->name('getAllBranchStockOut');
    Route::get('getStockOut/{id}', [StockInController::class, ('getStockOut')])->name('getStockOut');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('getLandingPage', [UserController::class, ('getLandingPage')])->name('getLandingPage');
    Route::get('getUsers', [UserController::class, ('getUsers')])->name('getUsers');
    Route::get('getUpdateUser/{id}', [UserController::class, ('getUpdateUser')])->name('getUpdateUser');
    Route::post('updateUser', [UserController::class, ('updateUser')])->name('updateUser');
    Route::get('getAddCompany', [CompanyController::class, ('getAddCompany')])->name('getAddCompany');
    Route::post('addCompany', [CompanyController::class, ('addCompany')])->name('addCompany');
    Route::get('getUpdateCompany/{id}', [CompanyController::class, ('getUpdateCompany')])->name('getUpdateCompany');
    Route::post('updateCompany', [CompanyController::class, ('updateCompany')])->name('updateCompany');
    Route::get('getChangeOwner/{id}', [CompanyController::class, ('getChangeOwner')])->name('getChangeOwner');
    Route::post('changeOwner', [CompanyController::class, ('changeOwner')])->name('changeOwner');
    Route::get('getCompanyById/{id}', [CompanyController::class, ('getCompanyById')])->name('getCompanyById');
    Route::get('deleteCompany/{id}', [CompanyController::class, ('deleteCompany')])->name('deleteCompany');
    Route::get('getAllCompanies', [CompanyController::class, ('getAllCompanies')])->name('getAllCompanies');
    Route::get('changeCompanyStatus/{id}', [CompanyController::class, ('changeCompanyStatus')])->name('changeCompanyStatus');
});
Route::group(['middleware' => ['manager']], function () {
    Route::get('getAddManyStocks', [StockInController::class, ('getAddManyStocks')])->name('getAddManyStocks');
    Route::get('getSellStocks/{id}', [StockInController::class, ('getSellStocks')])->name('getSellStocks');
    Route::get('SalesPurchaseChart', [BranchChartController::class, ('SalesPurchaseChart')])->name('SalesPurchaseChart');
});
Route::group(['middleware' => ['owner']], function () {
    Route::get('profitChart', [CompanyChart::class, ('profitChart')])->name('profitChart');
    Route::get('getOwnerLandingPage/{id}', [UserController::class, ('getOwnerLandingPage')])->name('getOwnerLandingPage');
    Route::get('getAddProduct', [ProductController::class, ('getAddProduct')])->name('getAddProduct');
    Route::post('addProduct', [ProductController::class, ('addProduct')])->name('addProduct');
    Route::get('getUpdateProduct/{id}', [ProductController::class, ('getUpdateProduct')])->name('getUpdateProduct');
    Route::post('updateProduct', [ProductController::class, ('updateProduct')])->name('updateProduct');
    Route::get('deleteProduct/{id}', [ProductController::class, ('deleteProduct')])->name('deleteProduct');
});
