@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <chat></chat>
        </div>
        <div class="col-md-3">
            <users></users>
        </div>
    </div>
</div>

@endsection