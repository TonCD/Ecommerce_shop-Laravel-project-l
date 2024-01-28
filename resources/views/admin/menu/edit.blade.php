@extends('admin.main')

@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

        <div class="form-group">
            <label for="menu">Category Name</label>
            <input type="text" name="name" value="{{ $menu->name }}" class="form-control" placeholder="Enter category name">
        </div>

        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="parent_id">
                <option value="0" {{ $menu->parent_id == 0 ? 'selected' : ''}} >Parent Category</option>
                @foreach ($menus as $menuParent)
                    <option value="{{  $menuParent->id }}" {{ $menu->parent_id == $menuParent->id ? 'selected' : ''}}> {{$menuParent->name}} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Short description</label>
            <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Details description</label>
            <textarea name="content" id="content" class="form-control"> {{ $menu->content }} </textarea>
        </div>

        <div class="form-group">
            <label>Active?</label>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" value="1" id="active" name="active" {{ $menu->active == 1 ? 'checked=""' : '' }}>
                <label class="custom-control-label" for="active">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" value="0" id="no_active" name="active">
                <label class="custom-control-label" for="no_active" {{ $menu->active == 0 ? 'checked=""' : '' }}>No</label>
            </div>
        </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update Category</button>
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