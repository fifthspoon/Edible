@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome <?php echo $user = Auth::user()->name;?>

                    <div class="links">
                    <a href ="/myrecipe">My recipes</a> <br />
                    <a href ="/create_recipe">Upload a recipe</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
