@extends('layouts.app')

@section('content')
    <br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-2">
                    <h2 style="text-align: center">Riwayat Laporan</h2>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($laporan)
            <table class="table table-bordered">
                <tr>
                    <th>Nama Pengirim</th>
                    <th>Tanggal Masuk</th>
                    <th>Jenis Pesan</th>
                    <th>Isi</th>
                    <th>Status</th>
                    <th> </th>
                </tr>
                @foreach ($paginate as $a)
                    <tr>
                        @if( $a->is_hidden == 0 )
                            <td>{{ $a->user->username }}</td>
                        @else
                            <td>Anonim</td>
                        @endif
                        <td>{{ $a->created_at }}</td>
                        <td>{{ $a->kategori }}</td>
                        <td>{{ $a->isi }}</td>
                        <td>{{ $a->status }}</td>
                        <td>
                        <form action="{{ route('admin.destroyLaporan', $a->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('showDetailLaporan', $a->id) }}">Detail</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('yakin?');">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </table>
        @else
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mt-2">
                        <h2 style="text-align: center">Tidak ada laporan masuk</h2>
                    </div>
                </div>
            </div>
        @endif
        <div class="float-right my-2">
            &nbsp;
            &nbsp;
            <a class="btn btn-success" href="{{ route('admin') }}">Kembali</a>
        </div>
        <br>{{ $paginate->links() }}
    </div>
@endsection
