@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Create setting
    </h1>
    <form method = 'get' action = '{!!url("setting")!!}'>
        <button class = 'btn blue'>setting Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("setting")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="id" name = "id" type="text" class="validate">
            <label for="id">id</label>
        </div>
        <div class="input-field col s6">
            <input id="meta_slug" name = "meta_slug" type="text" class="validate">
            <label for="meta_slug">meta_slug</label>
        </div>
        <div class="input-field col s6">
            <input id="meta_value" name = "meta_value" type="text" class="validate">
            <label for="meta_value">meta_value</label>
        </div>
        <div class="input-field col s6">
            <input id="added_by" name = "added_by" type="text" class="validate">
            <label for="added_by">added_by</label>
        </div>
        <div class="input-field col s6">
            <input id="updated_by" name = "updated_by" type="text" class="validate">
            <label for="updated_by">updated_by</label>
        </div>
        <div class="input-field col s6">
            <input id="status" name = "status" type="text" class="validate">
            <label for="status">status</label>
        </div>
        <button class = 'btn red' type ='submit'>Create</button>
    </form>
</div>
@endsection