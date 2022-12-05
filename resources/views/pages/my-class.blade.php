@extends('layout')

@section('body')
    <div class='px-2 text-center w-75'>
            <div class="d-flex flex-column bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div>
                    <div class="row text-center align-items-center gap-5">
                        <h1 class="text-success fw-bold">Class A</h1>
                    </div>

                    <div class="container gap-5">
                        <div class="row m-3 justify-content-around text-white">
                            <div class="col bg-warning">
                                <div class="border-bottom border-5 ">
                                    <h4>Teacher: Raymond Holt</h4>
                                </div>

                                <div class="text-start">
                                    <h4 class="m-1">Students:</h4>
                                    <ul>
                                        <li>Jake Peralta</li>
                                        <li>Amy Santiago</li>
                                        <li>Terrence Jeffords</li>
                                        <li>Gina Linetti</li>
                                        <li>Charles Boyle</li>
                                        <li>Rosa Diaz</li>
                                    </ul>
                                </div>
                                <div class="position-relative">
                                    <button type="button" class="btn btn-light m-2">Light</button>
                                </div>

                            </div>

                            <div class="col">

                            </div>

                            <div class="col bg-danger">
                                <div class="border-bottom border-5">
                                    <h4>Past Quizzes:</h4>
                                </div>

                                <div class="text-start">
                                    <h4 class="m-1">Subjects:</h4>
                                    <ul>
                                        <li>Bahasa Indonesia 1</li>
                                        <li>Basic Mathematics 1</li>
                                        <li>Basic English 1</li>

                                    </ul>
                                </div>

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
