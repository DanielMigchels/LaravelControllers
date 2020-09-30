@extends('coffees.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Summa College - Koffiebol</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('coffees.create') }}">Nieuwe koffie toevoegen</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="row">
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif

    <div class="row">
    <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>Naam</th>
            <th>Details</th>
            <th width="280px">Actie</th>
        </tr>
        @foreach ($coffees as $coffee)
        <tr>
            <td>{{ $coffee->id }}</td>
            <td>{{ $coffee->name }}</td>
            <td>{{ $coffee->detail }}</td>
            <td>
                <form action="{{ route('coffees.destroy',$coffee->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('coffees.show',$coffee->id) }}">Bekijk</a>
    
                    <a class="btn btn-primary" href="{{ route('coffees.edit',$coffee->id) }}">Bewerk</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Wis</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
  
      
@endsection