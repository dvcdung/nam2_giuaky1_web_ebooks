@extends('Layouts/layout')

@section('title-page', "Show Ebooks List")

@section('link-lib')

@endsection

@section('link-style')
    <link rel="stylesheet" href="/css/StaffManagement/show_staff_list.css">
@endsection

@section('right-side-content')
    <table>
        @if(empty($staffs))
            <p>Empty table</p>
        @else
            <tr class="title-table">
                <th class="col1">Id</th>
                <th class="col2">Name</th>
                <th class="col3">Year</th>
                <th class="col4">Price</th>
                
                <th class="action">Action</th>
            </tr>
            @foreach ($staffs as $key => $object)
                <tr class="{{ $key }}">
                    <td class="col1">{{ $object->id }}</td>
                    <td class="col2">{{ $object->name }}</td>
                    <td class="col3">{{ $object->year }}</td>
                    <td class="col4">{{ $object->price }}</td>

                    <td class="action">
                        <form action="{{ route('staff-management.destroy') }}"  method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $object->id }}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <form action="{{ route('staff-management.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $object->id }}">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        
    </table>
@endsection