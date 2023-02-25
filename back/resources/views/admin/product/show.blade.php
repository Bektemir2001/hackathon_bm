@extends('layouts.main_admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">


            <div class="container">
                <h3 class="text-center mb-4 mt-4">Product</h3>



                <div class="demo-html" style="display: block;
        margin-left: auto;
        margin-right: auto;">

                </div>
            </div>

            <div class="container">
                <h3>{{$product->name}}</h3>
                <img src="{{$product->image}}">
            </div>

            <div class="container md-4 mt-4">
                <h4 class="text-center">Add product</h4>
                <form action="{{route('admin.product.createProduct', $product->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">colors</label>
                        <select class="form-control" name="color_id">
                            @foreach($colors as $color)
                                <option value="{{$color->id}}" style="background-color: {{'#'.$color->color}}">{{$color->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">sizes</label>
                        <select class="form-control" name="size_id">
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">count</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="count" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="container mb-4 mt-t"  >
                @foreach($product_c as $p)
                    <div style="display: flex;">
                        <img src="{{$p->image}}" width="200px" height="300px">
                        <div style="margin-left: 50px;">
                            <p>{{"count => ".$p->count}}</p>
                            <p>{{"color => ".\App\Models\Colors::where('id', $p->color_id)->get()[0]->name}}</p>
                            <p>{{"size => ".\App\Models\Size::where('id', $p->size_id)->get()[0]->size}}</p>
                        </div>

                    </div>
                @endforeach


            </div>


            <div class="container mb-4 mt-4">
                <div class="container md-4 mt-4">
                    <h4 class="text-center">Add photo</h4>
                    <form action="{{route('admin.product.addPhoto', $product->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <input type="text" class="form-control" name="image" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="container mb-4 mt-t"  >
                @foreach($gallery as $g)
                    <div style="display: flex;">
                        <img src="{{$g->image}}" width="200px" height="300px">

                    </div>
                @endforeach


            </div>

        </div>

    </div>

    <!-- ./wrapper -->

@endsection


