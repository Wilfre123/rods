@extends('view2.view2')

<div class="container mt-5" style="width: 50%;">
<div class="card shadow-lg border-1 rounded">
<div class="card-body">
<div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

        <i class="bi bi-house-door"></i> Home
    </a>
    <form action="{{ isset($datas1) ? route('updateData', ['id' => $datas1->id]) : route('insertData') }}" method="post">
        @csrf
    <input class="form-control mt-2" value="{{ (isset($datas1)) ? $datas1->name1 : '' }}" name="name1" style="width: 50%;" placeholder="First name">
    <input class="form-control mt-2" value="{{ (isset($datas1)) ? $datas1->name1 : '' }}" name="name2" style="width: 50%;" placeholder="Last name">
    <button class="btn btn-success mt-2">
    </form>
        <i class="bi bi-check2-circle"></i> {{ (isset($datas1)) ? 'Update' : 'Save' }}
    </button>
</div>
</div>
</div>


<!-- resources/views/input.blade.php -->
<form action="{{ route('processString') }}" method="POST">
    @csrf
    <label for="stringInput1[]">Enter items for the first array (separated by commas):</label>
    <input type="text" name="name1[]" required>
    <input type="text" name="name1[]" required>
    <input type="text" name="name1[]" required>

    <label for="stringInput2[]">Enter items for the second array (separated by commas):</label>
    <input type="text" name="name2[]" required>
    <input type="text" name="name2[]" required>
    <input type="text" name="name2[]" required>

    <button type="submit">Submit</button>
</form>




<div class="container mt-4">
        <h2>Data Table</h2>
        <div class="row">
            <div class="col-md-6"> 
                <div class="table-responsive">
<table class="table" >
    <thead>       
        <tr>
            <th scope="row">First name</th>
            <th scope="row">Last name</th>
            <th scope="row">Action</th>
            @foreach($datas as $data)
            <tbody>
                <tr>
                    <td>{{$data->name1}}</td>
                    <td>{{$data->name2}}</td>
                    <td>
                   
                    <a class="btn btn-danger btn-sm Data-delete" data-id="{{ $data->id }}" title="delete">
                        delete
                      </a>
                      <a class="btn btn-primary btn-sm " href="{{ route('findData', $data->id) }}" title="delete">
                        Edit
                    </a>
                    </td>
                    
                </tr>
        
            </tbody>
            @endforeach
        </tr>
    </thead>
</table>
</div>
</div>
</div>



