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

                    You are logged in!
                </div>
                </div>
                <hr>

                @include('internals.nav')
                <div class="card">
                <div class="card-header">About Page Edit</div>
                <form method="POST" action="/index.php/home/aboutedit">
                	@csrf
                <textarea class="description " name="content">{!! $content !!}</textarea>
                <button type="submit" >Submit Changes</button>
                </form>
                <div>{{ $errors->first('content') }}</div>

            	</div>
            <hr>

            	<div class="card">
            	<div class="card-header">Set Default About Page</div>
            <p>This button is used to reset the about page to is default state. This should only be used if it is not possible to correct the error through the normal editing process. </p>
            	<div class="form-group">
            	<form method="get" action="/index.php/home/default/about">
            @csrf
            <button type="submit" value="default">Set Default About Page</button>
            </form>
            </div>
            </div>
            <hr>
            @if (Auth::user()->name == 'anthony Croshaw')
            <div class="card">
            	<div class="card-header">Set New Default About Page</div>

                      	<div class="form-group">
            	<form method="post" action="/index.php/home/default/about">
            @csrf
                      <textarea class="description " name="content">{!! $content !!}</textarea>
            <button type="submit" value="default" class="btn btn-warning" >Make new default</button></form>
            </div>
            	<div class ="card">
      	<div class="card-header">Delete About Page Content</div>

      <ul>
      	@foreach ($allpages as $allpages) <form method="post" action="/aboutdestroy/{{ $allpages['id'] }}">
@method('DELETE')
@csrf
<li> ID: {{ $allpages['id']}} | {{ $allpages['created_at'] }} <button type="submit">Delete</button></form> </li>@endforeach
      </ul>
      </div>
      </div>
                @endif
</div>
@endsection
