@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Question') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('add_question') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="question" class="col-md-2 col-form-label text-md-right">{{ __('Question') }}</label>

                                <div class="col-md-10">
                                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" required autofocus>

                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection