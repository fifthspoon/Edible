@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Recipes</div>
                <div class="card-body">
                    @foreach ($recipes as $recipe)
                    <div class="theposts">
                        <h2> {{ $recipe->title }} </h2>
                        <img src="{{ $recipe->picture }}" width="400px;">
                        <p><strong>Category: {{ $recipe->category }} </strong></p>
                        <p> {{ $recipe->content }}</p>
                        <br>
                        <p><strong>Created by: {{ $recipe->createdby }} </strong></p>
                        <p>
                            <form action="/udelete" method="GET" role="delete">
                                {{ csrf_field() }}
                                <input type="hidden" name="findRecipe" value="{{ $recipe->id }}">        
                                <div class="input-group">
                                    <input type="submit" name="delete" value="Delete Recipe">
                                </div>
                            </form>
                            <form action="/edit_recipe" method="GET" role="edit">
                                {{ csrf_field() }}
                                <input type="hidden" name="findRecipe" value="{{ $recipe->id }}">
                                <div class="input-group">
                                    <input type="submit" name="editRecipe" value="Edit Recipe">
                                </div>
                            </form>
                        </p>
                    </div>
                    @endforeach
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection