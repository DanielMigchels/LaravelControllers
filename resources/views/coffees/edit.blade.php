@extends('coffees.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Coffee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('coffees.index') }}"> Terug</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="row">
            <div class="alert alert-danger">
                <strong>Oeps!</strong> Er is iets mis met je invoer.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="row">
        <form action="{{ route('coffees.update', $coffee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Naam:</strong>
                        <input type="text" name="name" value="{{ $coffee->name }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Details:</strong>
                        <textarea class="form-control" style="height:150px" name="detail"
                            placeholder="Detail">{{ $coffee->detail }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Verzenden</button>
                </div>
            </div>
        </form>
    </div>
@endsection
