@extends('layout')

@section('body')
    <div class='px-2 text-center w-75'>
            <div class="d-flex flex-column align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div>
                    <div class="row text-center align-items-center m-3 align-top">

                        <div class="">
                            <h1 class="text-success fw-bold">My Classes</h1>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly flex-wrap gap-3">
                        <div class="card text-left d-flex align-content-start flex-wrap">
                            <div class="card text-left w-100 d-flex align-content-start bg-warning flex-wrap px-2 pt-2">
                                <h5 class="card-title text-left"> Kelas A </h5>
                            </div>
                            <p class="card-text d-flex align-content-start flex-wrap pt-2" style="width: 300px;">Kelas XIIA1 MIPA - Fisika Kimia Biologi Ilmu Komputer</p>
                            <p class="card-text text-left pb-2">20 member</p>
                        </div>

                        <div class="card text-left d-flex align-content-start flex-wrap">
                            <div class="card text-left w-100 d-flex align-content-start bg-warning flex-wrap px-2 pt-2">
                                <h5 class="card-title text-left"> Kelas A </h5>
                            </div>
                            <p class="card-text d-flex align-content-start flex-wrap pt-2" style="width: 300px;">Kelas XIIA1 MIPA - Fisika Kimia Biologi Ilmu Komputer</p>
                            <p class="card-text text-left pb-2">20 member</p>
                        </div>

                        <div class="card text-left d-flex align-content-start flex-wrap">
                            <div class="card text-left w-100 d-flex align-content-start bg-warning flex-wrap px-2 pt-2">
                                <h5 class="card-title text-left"> Kelas A </h5>
                            </div>
                            <p class="card-text d-flex align-content-start flex-wrap pt-2" style="width: 300px;">Kelas XIIA1 MIPA - Fisika Kimia Biologi Ilmu Komputer</p>
                            <p class="card-text text-left pb-2">20 member</p>
                        </div>

                        <div class="card text-left d-flex align-content-start flex-wrap">
                            <div class="card text-left w-100 d-flex align-content-start bg-warning flex-wrap px-2 pt-2">
                                <h5 class="card-title text-left"> Kelas A </h5>
                            </div>
                            <p class="card-text d-flex align-content-start flex-wrap pt-2" style="width: 300px;">Kelas XIIA1 MIPA - Fisika Kimia Biologi Ilmu Komputer</p>
                            <p class="card-text text-left pb-2">20 member</p>
                        </div>

                        <div class="card text-left d-flex align-content-start flex-wrap">
                            <div class="card text-left w-100 d-flex align-content-start bg-warning flex-wrap px-2 pt-2">
                                <h5 class="card-title text-left"> Kelas A </h5>
                            </div>
                            <p class="card-text d-flex align-content-start flex-wrap pt-2" style="width: 300px;">Kelas XIIA1 MIPA - Fisika Kimia Biologi Ilmu Komputer</p>
                            <p class="card-text text-left pb-2">20 member</p>
                        </div>
                    </div>

                    <div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-center m-3">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                            </ul>
                          </nav>
                    </div>


                    {{-- @foreach ($matkuls as $matkul)
                    <div class="cards">
                        <div class="title"> {{$matkul->namaKelas}} </div>
                        <div class="description"> {{$matkul->deskripsi}} </div>

                    </div>

                    @endforeach --}}
                    <div class="d-flex">
                        <div></div>
                    </div>
                </div>
            </div>
    </div>
@endsection
