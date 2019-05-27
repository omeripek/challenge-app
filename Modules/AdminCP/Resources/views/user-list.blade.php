@extends('admincp::layouts.master')

@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Welcome {{ Auth::user()->name }} to User List</h1>
            @include('admincp::layouts.partials.alert')
            @include('admincp::layouts.partials.errors')
        </div>
    </section>

    <div class="album py-5 bg-light mb-5">
        <div class="container">
            <form>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">?</th>
                      <th scope="col">Name</th>
                      <th scope="col">Mail</th>
                      <th scope="col">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($users as $user)
	                    <tr>
	                      <th scope="row">{{ $user->id }}</th>
	                      <td>{{ $user->name }}</td>
	                      <td>{{ $user->email }}</td>
	                      <td>
	                      	<a href="{{ url('admincp/user-list/delete', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
	                      	<a href="{{ url('admincp/user-list/update', $user->id) }}" class="btn btn-success btn-sm">Update</a>
	                      	<a href="{{ url('admincp/user-list/details', $user->id) }}" class="btn btn-info btn-sm">Details</a>
	                      </td>
	                    </tr>
                    @endforeach
                  </tbody>

                </table>
                <nav aria-label="navigation">{{ $users->links() }}</nav>
            </form>
        </div>
    </div>

</main>

@stop
