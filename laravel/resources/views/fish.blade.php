@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category: Fish</div>

                <div class="card-body">
                    @foreach ($recipes as $recipe)
                    <div class="theposts">
                    <h2> {{ $recipe->title }} </h2>
                    <img src="{{ $recipe->picture }}" width="400px;">
                    <p><strong>Category: {{ $recipe->category }} </strong></p>
                    <p> {{ $recipe->content }}</p>
                    <br>
                    <p><strong>Created By: {{ $recipe->createdby }} </strong></p>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection