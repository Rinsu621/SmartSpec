@extends('layouts.layoutadmin')

@section('content')
    <div id="overlay"></div>
    <div class="brand-view">
        <h2 class="topic-brand">Search Results</h2>

        <h3>Brands</h3>
        @if ($brands->isEmpty())
            <p>No brand results found.</p>
        @else
            <table class="custom-table">
                <thead class="heading">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th colspan="2" class="action">Action</th>
                    </tr>
                </thead>
                <tbody class="info">
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <a href="{{ route('brand.view', $brand->id) }}" class="edit-btn-first">Edit</a>
                                <form id="deleteForm{{ $loop->iteration }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete" type="button" onclick="confirmDelete({{ $loop->iteration }})">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <h3>Specifications</h3>
        @if ($specs->isEmpty())
            <p>No specification results found.</p>
        @else

        @endif
    </div>
@endsection
