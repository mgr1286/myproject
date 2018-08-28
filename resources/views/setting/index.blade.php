@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        setting Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("setting")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New setting</button>
        </form>
    </div>
    <table>
        <thead>
            <th>id</th>
            <th>meta_slug</th>
            <th>meta_value</th>
            <th>added_by</th>
            <th>updated_by</th>
            <th>status</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($settings as $setting) 
            <tr>
                <td>{!!$setting->id!!}</td>
                <td>{!!$setting->meta_slug!!}</td>
                <td>{!!$setting->meta_value!!}</td>
                <td>{!!$setting->added_by!!}</td>
                <td>{!!$setting->updated_by!!}</td>
                <td>{!!$setting->status!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/setting/{!!$setting->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/setting/{!!$setting->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/setting/{!!$setting->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $settings->render() !!}

</div>
@endsection