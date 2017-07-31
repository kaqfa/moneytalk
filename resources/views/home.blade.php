@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session('message'))
            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('add-transaction') }}" class="btn btn-primary btn-block">Transaksi Baru</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('list-transactions') }}" class="btn btn-info btn-block">List Transaksi</a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-warning btn-block">Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
