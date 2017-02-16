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
use Auth;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Input;
class AdController extends Controller
{
	public function getAdvertiser()
	{
		$details = Clientinfo::where('cId',Auth::user()->id)->get();
		$message = '';
		return view('ad.advertise')->with('details',$details)->with('message',$message);
	}

	public function postAdvertiser(Request $request)
	{
		$this->validate($request,[
			'image'=>'required',
			'category'=>'required',
			'link'=>'required|url'
			]);
		$adname = $request->input('adnmae');
		$category = $request->input('category');
		$link = $request->input('link');
		$description = $request->input('description');
		$userId = Auth::user()->id;
		$image = Input::file('image');
		$name = $image->getClientOriginalName();
		$tempPath = $image->getPathName();
		$imageExt = $image->getClientOriginalExtension();
		$imageName = date("Y-m-d")."-".mt_rand(1,10000).sha1($name).".".$imageExt;
		$imageDir = "uploads/";
		if ($imageExt == 'jpg' || $imageExt=='jpeg' || $imageExt=='gif' || $imageExt=='png') 
		{
			$targetPath = $imageDir.$imageName;
			move_uploaded_file($tempPath, $targetPath);
			Clientinfo::create([
				'cId'=>$userId,
				'image'=>$imageName,
				'category'=>$category,
				'link'=>$link,
				]);
			$message = 'Your ad has been submitted.';
			$details = Clientinfo::where('cId',Auth::user()->id)->get();	
		return view('ad.advertise')->with('details',$details)->with('message',$message);
	

		}
			$message ='Operation failed. Try again later.';
			$details = Clientinfo::where('cId',Auth::user()->id)->get();

		return view('ad.advertise')->with('details',$details)->with('message',$message);
	


	}
    public function getView($appId,$devId)
    {
    	

    	$info = Clientinfo::inRandomOrder()->limit(1)->first();
    	$adSelector = $info->adId;
    	
    	
    	$view = View::where('app_id',$appId)->where('device_id',$devId)->where('ad_id',$adSelector)->first();// for same device and same app

    	$result_from_calc = Calculation::where('deviceId',$devId)->first();

    	if ($result_from_calc) 
    	{
    		$result_from_calc->update(['adId' => $adSelector]);
    	}
    	else
    	{
    		Calculation::create(['deviceId' => $devId, 'adId'=> $adSelector]);
    	}

    	if ($view) 
    	{
    		
    		
    		$current_time = Carbon::now();
    		$last_updated = $view->created_at;
    		$diff= $last_updated->diffInHours($current_time);
			$access_count = $view->access_count;

			 if($diff<24)
			 {
				if ($access_count <10) 
					{
						
				 		$access_count = $access_count+1;
				 		$view->update(['access_count'=>$access_count]);
				 		$adInfo = Adinfo::where('adId',$adSelector)->first();
    	    			$appInfo = Appinfo::where('appId',$appId)->first();
						
						if ($adInfo) 
				 		{
				 			$v_count = $adInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$adInfo->update(['vCount'=>$v_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'vCount' =>1]);
				 		}
				 		if ($appInfo) 
				 		{
				 			$v_count = $appInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$appInfo->update(['vCount' => $v_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'vCount'=>1]);
				 		}

				 			$detail = Clientinfo::where('adId',$adSelector)->first();
				 		
    						return view('ad.view')->with('detail',$detail);
				 	}
			 		else
			 		{
			 		  	$detail = Clientinfo::where('adId',$adSelector)->first();
    					return view('ad.view')->with('detail',$detail);
					}
			}
			else
			{
				$access_count = 1;
				$v_count++;
				$created_at = date("Y-m-d H:i:s");
				View::update([
						       'access_count'=>$access_count,
						       'created_at'=>$created_at,
			 				   ])->where('ad_id',$adSelector);
				$adInfo->update([
								 'vCount' => $v_count
								]);
			 }
	    	
    	}
    	else
    	{
    		View::create([
    					  'app_id' => $appId, 
    					  'device_id' => $devId, 
    					  'ad_id' => $adSelector,
    					  'access_count' => 1
    					  ]);
				$adInfo = Adinfo::where('adId',$adSelector)->first();
    	 		$appInfo = Appinfo::where('appId',$appId)->first();
    	 				if ($adInfo) 
				 		{
				 			$v_count = $adInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$adInfo->update(['vCount'=>$v_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'vCount' =>1]);
				 		}

				 		if ($appInfo) 
				 		{
				 			$v_count = $appInfo->vCount;
    	    				$v_count = $v_count + 1;
				 			$appInfo->update(['vCount' => $v_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'vCount'=>1]);
				 		}
			$detail = Clientinfo::where('adId',$adSelector)->first();
    		return view('ad.view')->with('detail',$detail);
    	}
    }

    public function getClick($appId,$devId)
    {
    	$fromCalTable = Calculation::where('deviceId',$devId)->first();
    	$adSelector = $fromCalTable->adId;
    	$click = Click::where('app_id',$appId)->where('device_id',$devId)->where('ad_id',$adSelector)->first();// for same device and same app
    	if ($click) 
    	{
    		
    		
    		$current_time = Carbon::now();
    		$last_updated = $click->created_at;
    		$diff= $last_updated->diffInHours($current_time);
			$access_count = $click->access_count;

			 if($diff<24)
			 {
				if ($access_count <10) 
					{
						
				 		$access_count = $access_count+1;
				 		$click->update(['access_count'=>$access_count]);
				 		$adInfo = Adinfo::where('adId',$adSelector)->first();
    	    			$appInfo = Appinfo::where('appId',$appId)->first();
						
						if ($adInfo) 
				 		{
				 			$c_count = $adInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$adInfo->update(['cCount'=>$c_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'cCount' =>1]);
				 		}
				 		if ($appInfo) 
				 		{
				 			$c_count = $adInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$appInfo->update(['cCount' => $c_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'cCount'=>1]);
				 		}

				 		return view('ad.click')->with('app_id',$appId)->with('dev_id',$devId);
				 	}
			 		else
			 		{
			 		  return view('ad.click')->with('app_id',$appId)->with('dev_id',$devId);
					}
			}
			else
			{
				$access_count = 1;
				$c_count++;
				$created_at = date("Y-m-d H:i:s");
				Click::update([
						       'access_count'=>$access_count,
						       'created_at'=>$created_at,
			 				   ])->where('ad_id',$adSelector);
				$adInfo->update([
								 'cCount' => $c_count
								]);
			 }
	    	
    	}
    	else
    	{
    		Click::create([
    					  'app_id' => $appId, 
    					  'device_id' => $devId, 
    					  'ad_id' => $adSelector,
    					  'access_count' => 1
    					  ]);
				$adInfo = Adinfo::where('adId',$adSelector)->first();
    	 		$appInfo = Appinfo::where('appId',$appId)->first();
    	 				if ($adInfo) 
				 		{
				 			$c_count = $adInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$adInfo->update(['cCount'=>$c_count]);
				 		}
				 		else
				 		{
				 		  Adinfo::create(['adId'=>$adSelector,'cCount' =>1]);
				 		}

				 		if ($appInfo) 
				 		{
				 			$c_count = $appInfo->cCount;
    	    				$c_count = $c_count + 1;
				 			$appInfo->update(['cCount' => $c_count]);
				 		}
				 		else
				 		{
				 			Appinfo::create(['appId'=>$appId,'cCount'=>1]);
				 		}

			 return view('ad.click')->with('app_id',$appId)->with('dev_id',$devId);

			//$urll = Calculation::where('deviceId',$devId)->first();
    		// $Results = Client::where('id',$adId)->get();
            // foreach($Results as $Result)
            // {
            //    $url=$Result->AdLink;
            // } 
            //$urll="http://".$url;
        	//return  new RedirectResponse($urll); 
    	}
    }

   
}
