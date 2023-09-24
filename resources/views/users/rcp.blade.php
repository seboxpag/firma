@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rejestr Czasu Pracy') }}</div>

                <div class="card-body">
                  @can('isBoss')
                    <form method="POST" action="/users">
                        @csrf

                        <div class="row mb-3">
                            <label for="pracownik" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik') }}</label>

                            <div class="col-md-6">
                                <select id="name" type="text" class="form-control @error('pracownik') is-invalid @enderror" name="pracownik" value="{{ old('pracownik') }}" autofocus>
                                  @foreach($users as $user)
                                  <option value='{{$user->id}}'>{{$user->name}} {{$user->surname}}</option>
                                  @endforeach
                                  </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="czas" class="col-md-4 col-form-label text-md-right">{{ __('Czas pracy') }}</label>

                            <div class="col-md-6">
                                <input id="czas" type="number" class="form-control @error('czas') is-invalid @enderror" name="czas" value="{{ old('surname') }}" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

                            <div class="col-md-6">
                                <input id="data" type="date" class="form-control @error('data') is-invalid @enderror" name="data" required >

                                @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                            <div class="col-md-6">
                                <textarea id="opis" type="text" class="form-control" name="opis" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Dodaj czas pracy') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endcan
                    @can('isMngr')
                      <form method="POST" action="/users">
                          @csrf

                          <div class="row mb-3">
                              <label for="pracownik" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik') }}</label>

                              <div class="col-md-6">
                                  <select id="name" type="text" class="form-control @error('pracownik') is-invalid @enderror" name="pracownik" value="{{ old('pracownik') }}" autofocus>
                                    @foreach($users as $user)
                                    <option value='{{$user->id}}'>{{$user->name}} {{$user->surname}}</option>
                                    @endforeach
                                    </select>
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="czas" class="col-md-4 col-form-label text-md-right">{{ __('Czas pracy') }}</label>

                              <div class="col-md-6">
                                  <input id="czas" type="number" class="form-control @error('czas') is-invalid @enderror" name="czas" value="{{ old('surname') }}" autofocus>

                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

                              <div class="col-md-6">
                                  <input id="data" type="date" class="form-control @error('data') is-invalid @enderror" name="data" required >

                                  @error('data')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                              <div class="col-md-6">
                                  <textarea id="opis" type="text" class="form-control" name="opis" required></textarea>
                              </div>
                          </div>

                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Dodaj czas pracy') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                      @endcan
                      @can('isWrkr')
                        {{ __('Brak dostępu do zawartości!') }}                      
                      @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
