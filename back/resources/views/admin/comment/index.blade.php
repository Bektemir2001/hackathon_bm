@extends('layouts.main_admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">

            <div class="container">
                <h3 class="text-center mb-4 mt-4">Products</h3>

                <div class="demo-html" style="display: block;
        margin-left: auto;
        margin-right: auto;">
                    <div id="example_wrapper" class="">
                        <table id="example" class="table table-bordered border-primary" aria-describedby="example_info">
                            <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10%;">
                                    id
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                                    Названия
                                </th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 25%;">
                                    Действия
                                </th>
                                {{-- <th width="2px"></th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr class="odd">
                                    <td class="sorting_1">{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                            <a href="{{route('admin.getComments', $product->id)}}">Comments</a>
                                        </div>

                                        <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                        </div>


                                    </td>
                                    {{-- td>rfed</td> --}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- ./wrapper -->

@endsection


