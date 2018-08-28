@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show setting
    </h1>
    <form method = 'get' action = '{!!url("setting")!!}'>
        <button class = 'btn blue'>setting Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>id : </i></b>
                </td>
                <td>{!!$setting->id!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>meta_slug : </i></b>
                </td>
                <td>{!!$setting->meta_slug!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>meta_value : </i></b>
                </td>
                <td>{!!$setting->meta_value!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>added_by : </i></b>
                </td>
                <td>{!!$setting->added_by!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>updated_by : </i></b>
                </td>
                <td>{!!$setting->updated_by!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>status : </i></b>
                </td>
                <td>{!!$setting->status!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection