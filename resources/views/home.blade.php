@extends('main')
@section('konten')
    <!-- ======= Portfolio Section ======= -->
    <section id="prodak" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>prodak Printer</h2>
                <p>Cari Sesuai Keperluan Mencetakmu</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($prodak as $p)
                        <li data-filter=".{{$p->nama}}">{{$p->nama}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
                @foreach ($prodak as $p)
                <div class="col-lg-4 col-md-6 portfolio-item {{$p->nama}}">
                    <div class="portfolio-wrap">
                        <img src="assets/img/{{$p->gambar}}" class="img-fluid" alt="" width="400px" height="600px">
                        <div class="portfolio-info">
                            <h4>{{$p->nama}}</h4>
                            <p>{{$p->tipe}}</p>
                            <div class="portfolio-links">
                                <a href="assets/img/{{$p->gambar}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$p->nama.' '.$p->tipe}}"><i class="bx bx-plus"></i>SHOW</a>
                                |
                                @if(Auth::check())
                                <a href="" data-bs-toggle="modal" data-bs-target="#ModalTambahpembelian{{$p->kode}}" title="Pesan"><i class="bx bx-link"></i>BELI</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini tampil form tambah pembelian -->
                <div class=" modal fade" id="ModalTambahpembelian{{$p->kode}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah pembelian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body clearfix">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/img/{{$p->gambar}}" class="card-img-top" alt="{{$p->nama}}">
                                    <div class="card-body">
                                        <h5 class="card-title">Deskripsi :</h5>
                                        <p class="card-text">Tipe : {{$p->tipe}}</p>
                                        <p class="card-text">Jenis : {{$p->jenis}}</p>
                                        <p class="card-text">Harga : Rp.{{$p->harga}}</p>
                                        <p class="card-text">Stok : {{$p->stok}}</p>
                                    </div>
                                </div>
                                <form action="/transaksi/storeinput" method="post" class="form-floating">
                                    @csrf
                                    <input type="hidden" name="kodeproduk" value="{{$p->kode}}">
                                    <input type="hidden" name="harga" value="{{$p->harga}}">
                                    <div class="form-floating p-1">
                                        <input type="text" name="banyak" required="required" class="form-control">
                                        <label for="floatingInputValue">Banyak</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Beli</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->
@endsection