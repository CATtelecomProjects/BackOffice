@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Menu roles</h4></div>
            <div class="card-body">
                <div class="row">
                    <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"> + Add new role</a>
                </div>
                <br>
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hierarchy</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                guest
                            </td>
                            <td>
                                -
                            </td>
                            <td>
                                -
                            </td>
                            <td>
                                -
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                        </tr>
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    <?php
                                        foreach($hierarchy as $h){
                                            if($h->role_id == $role->id ){
                                                echo $h->hierarchy;
                                                break;
                                            }
                                        }
                                    ?>
                                </td>
                                <td>
                                    {{ $role->created_at }}
                                </td>
                                <td>
                                    {{ $role->updated_at }}
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('roles.up', ['id' => $role->id]) }}">
                                        <i class="cil-arrow-thick-top"></i> 
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('roles.down', ['id' => $role->id]) }}">
                                        <i class="cil-arrow-thick-bottom"></i>  
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('roles.show', $role->id ) }}" class="btn btn-primary btn-sm">Show</a>
                                </td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                <form action="{{ route('roles.destroy', $role->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection