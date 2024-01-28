@extends('admin.main')

@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

        <div class="form-group">
            <label for="menu">Category Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter category name">
        </div>

        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="parent_id">
                <option value="0">Parent Category</option>
                @foreach ($menus as $menu)
                    <option value="{{  $menu->id }}"> {{$menu->name}} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Short description</label>
            <textarea name="description" class="form-control"> </textarea>
        </div>

        <div class="form-group">
            <label>Details description</label>
            <textarea name="content" id="content" class="form-control"> </textarea>
        </div>

        <div class="form-group">
            <label>Active?</label>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" value="1" id="active" name="active" checked="">
                <label class="custom-control-label" for="active">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" value="0" id="no_active" name="active">
                <label class="custom-control-label" for="no_active">No</label>
            </div>
        </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
        @csrf
  </form>
@endsection

@section('footer')

<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .then( editor => {
            console.log( editor );
         } )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection