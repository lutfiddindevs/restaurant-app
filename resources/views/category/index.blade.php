@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(Session::has('e_message'))
            <div class="alert alert-success">
              {{ Session::get('e_message') }}
            </div>
          @endif
          @if(Session::has('d_message'))
            <div class="alert alert-success">
              {{ Session::get('d_message') }}
            </div>
          @endif
            <div class="card">
                <div class="card-header">All Categories</div>

                <div class="card-body">
                      <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Operation</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(count($categories) > 0)
                          @foreach($categories as $key => $category)
                          <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                              <a href="{{ route('category.edit', [$category->id]) }}"><button class="my-1"><i class="fa fa-edit"></i> edit</button></a>
                             
            
                                  
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $category->id }}">
                                    Delete
                                  </button>
                                </form>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('category.destroy', [$category->id]) }}" method="post">
                                      @csrf
                                      @method('delete')
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Are you sure do want to delete this category?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-outline-danger">delete</button>
                                    </div>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                          @else
                          <td>No Category to display</td>
                          @endif
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
