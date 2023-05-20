<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubGroupController;
use App\Http\Controllers\DyeingStatusController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\McCategoryController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\OwcIssueController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Entry\PurchaseController;
use App\Http\Controllers\Entry\OwcController;
use App\Http\Controllers\Entry\StentnerproductinController;
use App\Http\Controllers\Entry\PhysicalstockentryController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\ShadeController;
use App\Http\Controllers\MasterController;

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

Route::get('clear', function() {
    Artisan::call('optimize:clear');
   return "Cleared!";
 });

Route::get('/', [AuthController::class,'index'])->name('login');
Route::any('login',[AuthController::class,'customLogin'])->name('custom.login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::any('home',[HomeController::class,'home'])->name('home');

// group master
Route::get('group_master',[GroupController::class,'index'])->name('group.master');
Route::get('add_group_master',[GroupController::class,'AddGroup'])->name('add.group');
Route::post('group_master',[GroupController::class,'Store'])->name('group.store');
Route::post('group_delete',[GroupController::class,'delete'])->name('group.delete');
Route::any('group_edit',[GroupController::class,'edit'])->name('group.edit');

// group Saller
Route::get('seller_details',[SellerController ::class,'index'])->name('seller.details');
Route::get('add_seller',[SellerController::class,'AddSeller'])->name('add.seller');
Route::post('seller_details',[SellerController::class,'Store'])->name('seller.store');
Route::get('seller/{id}',[SellerController::class,'Edit'])->name('seller.edit');
Route::post('seller_delete',[SellerController::class,'delete'])->name('seller.delete');

Route::get('sub_group',[SubGroupController ::class,'index'])->name('sub.group');
Route::get('add_subgroup',[SubGroupController::class,'AddSeller'])->name('add.subgroup');
Route::post('sub_group',[SubGroupController::class,'Store'])->name('subgroup.store');
Route::post('subgroup_edit',[SubGroupController::class,'edit'])->name('subgroup.edit');
Route::post('group_delete',[SubGroupController::class,'delete'])->name('group.delete');

Route::get('dyeing_master_status',[DyeingStatusController ::class,'index'])->name('dyeing.status');
Route::get('add_status',[DyeingStatusController::class,'AddDyeing'])->name('add.status');
Route::post('dyeing_master_status',[DyeingStatusController::class,'Store'])->name('dyiengstatus.store');
Route::post('status_delete',[DyeingStatusController::class,'delete'])->name('status.delete');
Route::post('status_edit',[DyeingStatusController::class,'edit'])->name('status.edit');

Route::get('machine_master',[MachineController ::class,'index'])->name('machine_master');
Route::post('machine_master',[MachineController::class,'Store'])->name('machine.store');
Route::post('machine_delete',[MachineController::class,'delete'])->name('machine.delete');
Route::post('machine_edit',[MachineController::class,'edit'])->name('machine.edit');

Route::get('mc_category',[McCategoryController ::class,'index'])->name('mc.category');
Route::post('mc_category',[McCategoryController::class,'Store'])->name('category.store');
Route::post('category_delete',[McCategoryController::class,'delete'])->name('category.delete');
Route::post('category_edit',[McCategoryController::class,'edit'])->name('category.edit');

Route::get('owc_issue',[OwcIssueController::class,'index'])->name('owc.issue');
Route::post('owc_issue',[OwcIssueController::class,'Store'])->name('owc_issue.store');
Route::post('owc_issue_delete',[OwcIssueController::class,'delete'])->name('owc_issue.delete');
Route::post('owc_issue_edit',[OwcIssueController::class,'edit'])->name('owc_issue.edit');


Route::get('quality_master',[QualityController ::class,'index'])->name('quality.master');
Route::post('quality_master',[QualityController::class,'Store'])->name('quality.store');
Route::post('quality_delete',[QualityController::class,'delete'])->name('quality.delete');
Route::post('quality_edit',[QualityController::class,'edit'])->name('quality.edit');

Route::get('size_master',[SizeController ::class,'index'])->name('size.master');
Route::post('size_master',[SizeController::class,'Store'])->name('size.store');
Route::post('size_delete',[SizeController::class,'delete'])->name('size.delete');
Route::post('size_edit',[SizeController::class,'edit'])->name('size.edit');

Route::get('unit_master',[UnitController ::class,'index'])->name('unit.master');
Route::post('unit_master',[UnitController::class,'Store'])->name('unit.store');
Route::post('unit_delete',[UnitController::class,'delete'])->name('unit.delete');
Route::post('unit_edit',[UnitController::class,'edit'])->name('unit.edit');


Route::get('shade',[ShadeController::class,'index'])->name('shade.index');
Route::post('shade',[ShadeController::class,'Store'])->name('shade.store');
Route::post('shade_delete',[ShadeController::class,'delete'])->name('shade.delete');
Route::any('shade_edit',[ShadeController::class,'edit'])->name('shade.edit');

Route::get('master',[MasterController::class,'index'])->name('master.index');
Route::post('master',[MasterController::class,'Store'])->name('master.store');
Route::post('master_delete',[MasterController::class,'delete'])->name('master.delete');
Route::any('master_edit',[MasterController::class,'edit'])->name('master.edit');


//  Entry route
Route::get('purchase',[PurchaseController::class,'index'])->name('purchase.index');
Route::post('purchase',[PurchaseController::class,'store'])->name('purchase.store');
Route::get('addpurchase',[PurchaseController::class,'AddPurchase'])->name('purchase.add');
Route::post('purchase_seller',[PurchaseController::class,'Seller'])->name('purchase.seller');
Route::get('purchase/{id}',[PurchaseController::class,'Edit'])->name('purchase.edit');
Route::post('purchase_delete',[PurchaseController::class,'delete'])->name('purchase.delete');


Route::get('item_master',[ItemController::class,'index'])->name('item.master');
Route::post('item_master',[ItemController::class,'Store'])->name('item.store');
Route::post('item_delete',[ItemController::class,'delete'])->name('item.delete');
Route::post('item_edit',[ItemController::class,'edit'])->name('item.edit');



Route::get('owc_entry',[OwcController::class,'index'])->name('owc.entry');
Route::post('owc_entry',[OwcController::class,'Store'])->name('owc.store');
Route::get('addowc',[OwcController::class,'AddOwc'])->name('owc.add');
Route::post('owc_delete',[OwcController::class,'delete'])->name('owc.delete');
Route::get('owc_edit/{id}',[OwcController::class,'Edit'])->name('owc.edit');
Route::post('owc_delete',[OwcController::class,'delete'])->name('owc.delete');


Route::get('physical_master',[PhysicalstockentryController ::class,'index'])->name('physical.master');
Route::post('physical_master',[PhysicalstockentryController::class,'Store'])->name('physical.store');
Route::post('physical_delete',[PhysicalstockentryController::class,'delete'])->name('physical.delete');
Route::post('physical_edit',[PhysicalstockentryController::class,'edit'])->name('physical.edit');

Route::get('stentner_master',[StentnerproductinController::class,'index'])->name('stentner.master');
Route::post('stentner_master',[StentnerproductinController::class,'Store'])->name('stentner.store');
Route::post('stentner_delete',[StentnerproductinController::class,'delete'])->name('stentner.delete');
Route::post('stentner_edit',[StentnerproductinController::class,'edit'])->name('stentner.edit');


//reports

 // PartyWise Summery report
 Route::get('partywise_report',[ReportController::class,'PartyWiseSummery'])->name('party.index');
 Route::controller(ReportController::class)->group(function(){
     Route::get('party/csv', 'PartyexportCSVFile')->name('partyexport.csv');
 });

// //Purchase report
// Route::get('datewisw_purchase_report',[ReportController::class,'DateWisePurchaseReport'])->name('datewise.purchase.report');
// Route::controller(ReportController::class)->group(function(){
//     Route::get('export/csv', 'exportCSVFile')->name('export.csv');
// });

// //GroupWise report
// Route::get('group',[ReportController::class,'Group'])->name('group.index');
// Route::get('reset-data',[ReportController::class,'Group'])->name('group.reset');
// Route::get('groupdetails/{id}',[ReportController::class,'GroupDetailsShow'])->name('details.show');
// Route::controller(ReportController::class)->group(function(){
//     Route::get('group/csv', 'GroupexportCSVFile')->name('groupexport.csv');
// });




// Route::get('purchase_report',[ReportController::class,'index'])->name('report.index');
// Route::controller(ReportController::class)->group(function(){
//     Route::get('export/csv', 'exportCSVFile')->name('export.csv');
// });


// Route::get('seller_details',[SellerController ::class,'index'])->name('seller.details');
// Route::get('add_seller',[SellerController::class,'AddSeller'])->name('add.seller');
// Route::post('seller_details',[SellerController::class,'Store'])->name('seller.store');
// Route::get('seller/{id}',[SellerController::class,'Edit'])->name('seller.edit');
// Route::post('seller_delete',[SellerController::class,'delete'])->name('seller.delete');
