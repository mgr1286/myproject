@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit setting
    </h1>
    <form method = 'get' action = '{!!url("setting")!!}'>
        <button class = 'btn blue'>setting Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("setting")!!}/{!!$setting->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="id" name = "id" type="text" class="validate" value="{!!$setting->
            id!!}"> 
            <label for="id">id</label>
        </div>
        <div class="input-field col s6">
            <input id="meta_slug" name = "meta_slug" type="text" class="validate" value="{!!$setting->
            meta_slug!!}"> 
            <label for="meta_slug">meta_slug</label>
        </div>
        <div class="input-field col s6">
            <input id="meta_value" name = "meta_value" type="text" class="validate" value="{!!$setting->
            meta_value!!}"> 
            <label for="meta_value">meta_value</label>
        </div>
        <div class="input-field col s6">
            <input id="added_by" name = "added_by" type="text" class="validate" value="{!!$setting->
            added_by!!}"> 
            <label for="added_by">added_by</label>
        </div>
        <div class="input-field col s6">
            <input id="updated_by" name = "updated_by" type="text" class="validate" value="{!!$setting->
            updated_by!!}"> 
            <label for="updated_by">updated_by</label>
        </div>
        <div class="input-field col s6">
            <input id="status" name = "status" type="text" class="validate" value="{!!$setting->
            status!!}"> 
            <label for="status">status</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection