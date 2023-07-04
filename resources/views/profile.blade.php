@extends('layouts.mainlayout')

@section('title', 'Profile')


@section('content')

    <x-rent-log-table :rentlog='$rent_logs' />


@endsection
