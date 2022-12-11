@extends('layouts.app')

@section('content')
    <br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-2">
                    <h2 style="text-align: center">TAMPILAN DATA AKUN USER</h2>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>Role</th>
            </tr>
            @foreach ($paginate as $a)
                <tr>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->role }}</td>
                    <td>
                    <form action="{{ route('admin.destroy', $a->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('yakin?');">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="float-right my-2">
            &nbsp;
            &nbsp;
            <a class="btn btn-success" href="{{ route('admin') }}">Kembali</a>
        </div>
        <br>{{ $paginate->links() }}
    </div>
@endsection
