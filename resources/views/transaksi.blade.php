@extends('master')
@section('konten')
    <div class="container-fluid">
        
        @if (session('message'))
            <div class="alert alert-success m-3"> {{ session('message') }} </div>
        @endif
        <table class="table table-dark table-hover m-lg-2">
            <tr>
                <th>gambar</th>
                <th>id</th>
                <th>Nama</th>
                <th>harga</th>
                <th>hasil</th>
                <th>opsi</th>
            </tr>   
            @foreach ($transaksi as $p)
                <tr>
                    <td> {{ $p->kode_pembelian }} </td>
                    <td> {{ $p->kode_produk }} </td>
                    <td> {{ $p->banyak }} </td>
                    <td> {{ $p->bayar }} </td>
                    <td> {{ $p->status}} </td>
                    <td>    
                    <td>
                        @if(auth()->user()->role == 'admin')
                        <button class="btn--btn-info" data-bs-toggle="modal"
                        data-bs-target="#modalupdateprodak{{$p->kode_pembelian}}">Update</button>

                        <button class="btn--btn-info" data-bs-toggle="modal"
                        data-bs-target="#modalupdateprodak{{$p->kode_pembelian}}">Delet</button>
                        @endif   
                    </td>
                </tr>

                <!-- Ini tampil form update transaksi -->
                <div class="modal fade" id="ModalUpdatetransaksi{{ $p->kode_pembelian }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update transaksi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/transaksi" method="post" class="form-floating">
                                    @csrf
                                    <div class="form-floating p-1">
                                        <input type="text" name="nis" id="nis" readonly class="form-control"
                                            value="{{ $p->kode_pembelian }}">
                                        <label for="floatingInputValue">kode</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="nama" required="required" class="form-control"
                                            value="{{ $p->kode_produk }}">
                                        <label for="floatingInputValue">produk</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="alamat" required="required" class="form-control"
                                            value="{{ $p->banyak }}">
                                        <label for="floatingInputValue">banyak</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="telp" required="required" class="form-control"
                                            value="{{ $p->bayar }}">
                                        <label for="floatingInputValue">bayar</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="telp" required="required" class="form-control"
                                            value="{{ $p->kode_pembeli }}">
                                        <label for="floatingInputValue">kode_pembeli</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="telp" required="required" class="form-control"
                                            value="{{ $p->status }}">
                                        <label for="floatingInputValue">status</label>
                                    </div>
                                    <div class="modal-footer">  
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Updates</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini tampil form delete transaksi -->
                <div class="modal fade" id="ModalDeletebiodata{{ $p->kode_pembelian }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus transaksi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/transaksi/delete/{{ $p->kode_pembelian }}" method="get" class="form-floating">
                                    @csrf
                                    <div>
                                        <h3>Yakin mau menghapus data <b>{{ $p->kode_pembelian }}</b> ?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>

    <!-- Ini tampil form tambah transaksi -->
    <div class="modal fade" id="ModalTambahbiodata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah transaksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/prodak/storeinput" method="post" class="form-floating"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating p-1">
                            <input type="text" name="nis" required="required" class="form-control">
                            <label for="floatingInputValue">nis</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="nama" required="required" class="form-control">
                            <label for="floatingInputValue">Nama</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="alamat" required="required" class="form-control">
                            <label for="floatingInputValue">alamat</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="telp" required="required" class="form-control">
                            <label for="floatingInputValue">telpon</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="file" name="foto" class="form-control">
                            <label for="floatingInputValue">Gambar</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection