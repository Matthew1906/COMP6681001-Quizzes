@extends('layout')

@section('body')
    <div class='px-2 text-center w-75'>
            <div class="d-flex flex-column bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div>
                    <div class="row text-center align-items-center">
                        <h1 class="text-success fw-bold">Class A - Bahasa Indonesia 1</h1>
                        <h4 class="text-sucess">Monday, 1 November 2022</h4>
                    </div>

                    <div class="grid-container">
                        <div class="row m-3 justify-content-around text-white">


                        </div>


                        </div>
                    </div>

                    {{-- @foreach ($matkuls as $matkul)
                    <div class="cards">
                        <div class="title"> {{$matkul->namaKelas}} </div>
                        <div class="description"> {{$matkul->deskripsi}} </div>

                    </div>

                    @endforeach --}}
                </div>
            </div>
    </div>
@endsection
