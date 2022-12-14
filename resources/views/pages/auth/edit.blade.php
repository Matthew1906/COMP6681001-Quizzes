@extends('layout')

@section("title", 'Update Password')

@section('body')
    <div class='px-2 text-center'>
            <div class="d-flex flex-column align-items-center bg-white mb-3 py-3 px-2 px-md-5 border border-2 border-dark rounded">
                <div class='mx-3 flex-grow-1'>
                    <div class="mt-1 pb-3 px-1 text-center login-container">
                        <div class="row text-center align-items-center">
                            <div class="text-center d-flex justify-content-center align-items-center mb-3">
                                <a href="{{url()->previous()}}" class='float-start fs-2 text-turqouise ms-1'>
                                    <ion-icon name="arrow-undo"></ion-icon>
                                </a>
                                <h2 class="text-turqouise fw-bold">Update Password</h2>
                            </div>
                            <div class="d-flex flex-column align-items-center mb-3 py-3 px-5 border border-2 border-pink rounded">
                                <form method="POST" action="{{route('users.update')}}" class="text-center">
                                    @csrf
                                    @include('components.flash-messages')
                                    <div class="row">
                                        <label for="old_password" class="text-center text-pink fw-bold fs-4 mb-1">Old Password</label>
                                        <input type="password" class="form-control border border-2 border-dark rounded" name="password_old" placeholder="Old Password">
                                    </div>
                                    <div class="row">
                                        <label for="password" class="text-center text-pink fw-bold fs-4 mb-1">New Password</label>
                                        <input type="password" class="form-control border border-2 border-dark rounded" name="password" placeholder="Password">
                                    </div>
                                    <div class="row">
                                        <label for="new_password" class="text-center text-pink fw-bold fs-4 mb-1">Confirm New Password</label>
                                        <input type="password" class="form-control border border-2 border-dark rounded" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" class="btn bg-turqouise hover-bg-pink text-white fw-semibold mt-3">Update</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
