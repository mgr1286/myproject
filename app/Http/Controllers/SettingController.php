<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class SettingController.
 *
 * @author  The scaffold-interface created at 2018-08-28 01:50:00pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - setting';
        $settings = Setting::paginate(6);
        return view('setting.index',compact('settings','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - setting';
        
        return view('setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new Setting();

        
        $setting->id = $request->id;

        
        $setting->meta_slug = $request->meta_slug;

        
        $setting->meta_value = $request->meta_value;

        
        $setting->added_by = $request->added_by;

        
        $setting->updated_by = $request->updated_by;

        
        $setting->status = $request->status;

        
        
        $setting->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new setting has been created !!']);

        return redirect('setting');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - setting';

        if($request->ajax())
        {
            return URL::to('setting/'.$id);
        }

        $setting = Setting::findOrfail($id);
        return view('setting.show',compact('title','setting'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - setting';
        if($request->ajax())
        {
            return URL::to('setting/'. $id . '/edit');
        }

        
        $setting = Setting::findOrfail($id);
        return view('setting.edit',compact('title','setting'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $setting = Setting::findOrfail($id);
    	
        $setting->id = $request->id;
        
        $setting->meta_slug = $request->meta_slug;
        
        $setting->meta_value = $request->meta_value;
        
        $setting->added_by = $request->added_by;
        
        $setting->updated_by = $request->updated_by;
        
        $setting->status = $request->status;
        
        
        $setting->save();

        return redirect('setting');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/setting/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$setting = Setting::findOrfail($id);
     	$setting->delete();
        return URL::to('setting');
    }
}
