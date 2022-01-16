@extends('template.app')
@section('content')


<a href="{{ route('product.create') }}" class="btn btn-secondary foat-right ml-12">Create Product</a>

    <h3 class="mb-2">PRODUCT CRUD</h3>
    <div class="table-responsive">
      <table class="table table-striped table-sm ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Descriptions</th>
            <th scope="colspan">Action</th>

          </tr>
        </thead>
        @foreach ($product as $products)
        <tbody>
          <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $products->name }}</td>
            <td>{{ $products->price }}</td>
            <td>{{ $products->description }}</td>

            <td>

                 <div class="dropdown">
                    <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('product.show',$products->id) }}">View</a></li>
                        <li><a class="dropdown-item" href="{{ route('product.edit',$products->id) }}">Edit</a></li>
                       <li><br class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('product.destroy',$products->id) }}" method="post">
                            @csrf
                            @method('delete')
                        <button type="submit" class="dropdwon-item">Delete</button>
                        </form>
                        </li>
                    </ul>
                  </div>

             </td>

          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </main>
@endsection

