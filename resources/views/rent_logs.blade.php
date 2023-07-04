@extends('layouts.mainlayout')

@section('title', 'Rent Logs')


@section('content')



    <x-rent-log-table :rentlog='$rent_logs' />
@endsection
