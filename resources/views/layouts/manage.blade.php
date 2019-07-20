@extends('layouts.app')

@section('content')



        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel">
                            <div class="panel panel-body">
                               <div class="panel panel-heading">
                                <h2>{{ $editable->post_titile }}</h2>
                                <br/>
                                <h2><a  href="/edit/{{ $editable->id }}" target="_blank">Edit</a>

                                <a href="/delete/{{$editable->id}}">Delete</a></h2>
                                <br/>
                                <h6>{{ $editable->posted_at }} Posted By {{ $editable->posted_by }}</h6>
                                <br/>
                                <h4> {{ $editable->post_content }}</h4>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
  @endsection