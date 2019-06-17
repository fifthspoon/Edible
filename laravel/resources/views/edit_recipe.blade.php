@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Recipe</div>
                <div class="card-body">
                @foreach ($recipes as $recipe)
                    <form id="change" method="post" action="/uedit">
                    {{ csrf_field() }}
                    <p>
                    <label for="title">Title</label>
                    </p>
 
                    <p>
                    <input type="text" name="title" value="{{ $recipe->title }}">
                    </p>
                   
                    <p>
                    <label for="category">Catergory</label>
                    </p>
 
                    <p>
                    Meat
                    <input type="radio" name="category" value="meat" checked>  <br />
                    Fish
                    <input type="radio" name="category" value="fish">
                    </p>
                   
                    <p>
                    <label for="content">Description:</label>
                    </p>
 
                    <p>
                    <textarea name="content" rows="10" cols="70">  {{ $recipe->content }} </textarea>
                    </p>
                   
                    <p>
                    <label for="picture">Photo URL:</label>
                    </p>
                   
                    <p>
                    <input type="text" name="picture" value="{{ $recipe->picture }}">
                    </p>
               
                   
                    <p>
                     <input type="hidden" name="findRecipe" value="{{ $recipe->id }}">        
                    </p>
             
                    <p>
                    <input type="submit" value="Update Recipe">
                    </p>
 
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection