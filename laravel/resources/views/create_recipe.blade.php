@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new recipe</div>

                <div class="card-body">
                    <form id="add" method="post" action="/added">

                                {{ csrf_field() }}

                    <p>
                    <label for="title">Title</label>
                    </p>

                    <p>
                    <input type="text" name="title">
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
                    <textarea name="content" rows="10" cols="70"></textarea>
                    </p>
                    
                    <p>
                    <label for="picture">Photo URL:</label>
                    </p>
                    
                    <p>
                    <input type="text" name="picture" value="">
                    </p>
                    
                    <?php $bywho = Auth::user()->name;?>
                    
                    <p>
                    <input type="hidden" name="createdby" value="<?php echo $bywho;?>" readonly>
                    </p>
                    
                    <p>
                    <input type="submit" value="Add recipe">
                    </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection