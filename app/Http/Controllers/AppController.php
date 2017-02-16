<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\View;
use App\Adinfo;
use App\Calculation;
use App\Clientinfo;
use App\Appinfo;
use App\Click;
use App\Developerinfo;
use Auth;
class AppController extends Controller
{
	public function getNewApp()
	{
		$userId = Auth::user()->id;
		$devDetails = Developerinfo::where('dId',$userId)->get();
		return view('app.new')->with('devdetails',$devDetails);
	}
	public function postNewApp(Request $request)
	{
		$developerId = Auth::user()->id;
		// $prefix = "NEPAD_".date('Y')."_";
		// $appIdGenerated = mt_rand(1,99999999);
		// $appId = $prefix.$appIdGenerated;
		$category = $request->input('category');

		Developerinfo::create([
			'dId'=>$developerId,
			'category'=>$category,
			]);

		return view('app.success');
	}
}
