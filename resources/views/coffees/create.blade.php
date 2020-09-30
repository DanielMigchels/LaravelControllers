@extends('coffees.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Nieuwe koffie toevoegen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('coffees.index') }}">Terug</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="row">
            <div class="alert alert-danger">
                <strong>Oeps!</strong> Er was een probleem met de invoering.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="row">
        <form action="{{ route('coffees.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Naam:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Naam">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Verzenden</button>
                </div>
            </div>
        </form>
    </div>
@endsection
