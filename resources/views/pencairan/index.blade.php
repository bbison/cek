@extends('layouts.sidebar')
@section('body')
<div class="m-5">
    <small>*klik id pinjaman untuk melihat detail</small>
    <table class="table">
        <tr>
            <th>NO</th>
            <th>ID PINJAMAN</th>
            <th>NAMA PEMINJAM</th>
            <th>PRINT</th>
        </tr>
        @foreach ($pinjaman as $pinjaman)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a class="text-decoration-none" href="/pinjaman/detail/{{ $pinjaman->id }}">{{ $pinjaman->id }}</a></td>
                <td>{{ $pinjaman->user->name }}</td>
                <td>
                <form action="" method="post" class="btn"> 
                    @csrf
                    <a href="/print/{{ $pinjaman->id }}" target="_BLANK" class="btn btn-primary text-white">PRINT</a>
                </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
