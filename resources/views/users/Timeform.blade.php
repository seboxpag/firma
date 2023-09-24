@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rejestr Czasu Pracy') }}</div>

                <div class="card-body">
                  @can('isBoss')
                    <form method="POST" action="/users/montho">
                        @csrf

                        <div class="row mb-3">
                            <label for="pracownik" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik') }}</label>

                            <div class="col-md-6">
                                <select id="name" type="text" class="form-control @error('pracownik') is-invalid @enderror" name="pracownik" value="{{ old('name') }}" autofocus>
                                  @foreach($users as $user)
                                  <option value='{{$user->id}}'>{{$user->name}} {{$user->surname}}</option>
                                  @endforeach
                                  </select>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <label for="miesiac" class="col-md-4 col-form-label text-md-right">{{ __('Miesiąc') }}</label>

                            <div class="col-md-6">
                                <select id="miesiac" type="number" class="form-control @error('miesiac') is-invalid @enderror" name="miesiac" required >
                                  <option value='1'>Styczeń</option>
                                  <option value='2'>Luty</option>
                                  <option value='3'>Marzec</option>
                                  <option value='4'>Kwiecień</option>
                                  <option value='5'>Maj</option>
                                  <option value='6'>Czerwiec</option>
                                  <option value='7'>Lipiec</option>
                                  <option value='8'>Sierpień</option>
                                  <option value='9'>Wrzesień</option>
                                  <option value='10'>Październik</option>
                                  <option value='11'>Listopad</option>
                                  <option value='12'>Grudzień</option>
                                </select>
                                @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <label for="rok" class="col-md-4 col-form-label text-md-right">{{ __('Rok') }}</label>

                            <div class="col-md-6">
                                <select id="rok" type="number" class="form-control @error('rok') is-invalid @enderror" name="rok" required >
                                  <option value='2018'>2018</option>
                                  <option value='2019'>2019</option>
                                  <option value='2020'>2020</option>
                                  <option value='2021'>2021</option>
                                  <option value='2022'>2022</option>
                                  <option value='2023'>2023</option>
                                </select>
                                @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sprawdź miesiąc') }}
                                </button>
                                <br>
                                @if($timeWord)
                                <div class="alert mt-4 alert-success d-flex align-items-center justify-content-center">
                                  Liczba godzin pracownika w danym miesiącu wynosi {{$timeWord[0]['suma']}}h.
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                    @endcan
                    @can('isMngr')
                      <form method="POST" action="/users/montho">
                          @csrf

                          <div class="row mb-3">
                              <label for="pracownik" class="col-md-4 col-form-label text-md-right">{{ __('Pracownik') }}</label>

                              <div class="col-md-6">
                                  <select id="name" type="text" class="form-control @error('pracownik') is-invalid @enderror" name="pracownik" value="{{ old('name') }}" autofocus>
                                    @foreach($users as $user)
                                    <option value='{{$user->id}}'>{{$user->name}} {{$user->surname}}</option>
                                    @endforeach
                                    </select>
                              </div>
                          </div>

                          <div class="row mb-3">

                              <label for="miesiac" class="col-md-4 col-form-label text-md-right">{{ __('Miesiąc') }}</label>

                              <div class="col-md-6">
                                  <select id="miesiac" type="number" class="form-control @error('miesiac') is-invalid @enderror" name="miesiac" required >
                                    <option value='1'>Styczeń</option>
                                    <option value='2'>Luty</option>
                                    <option value='3'>Marzec</option>
                                    <option value='4'>Kwiecień</option>
                                    <option value='5'>Maj</option>
                                    <option value='6'>Czerwiec</option>
                                    <option value='7'>Lipiec</option>
                                    <option value='8'>Sierpień</option>
                                    <option value='9'>Wrzesień</option>
                                    <option value='10'>Październik</option>
                                    <option value='11'>Listopad</option>
                                    <option value='12'>Grudzień</option>
                                  </select>
                                  @error('data')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">

                              <label for="rok" class="col-md-4 col-form-label text-md-right">{{ __('Rok') }}</label>

                              <div class="col-md-6">
                                  <select id="rok" type="number" class="form-control @error('rok') is-invalid @enderror" name="rok" required >
                                    <option value='2018'>2018</option>
                                    <option value='2019'>2019</option>
                                    <option value='2020'>2020</option>
                                    <option value='2021'>2021</option>
                                    <option value='2022'>2022</option>
                                  </select>
                                  @error('data')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Sprawdź miesiąc') }}
                                  </button>
                                  <br>
                                  @if($timeWord)
                                  <div class="alert mt-4 alert-success d-flex align-items-center justify-content-center">
                                    Liczba godzin pracownika w danym miesiącu wynosi {{$timeWord[0]['suma']}}h.
                                  </div>
                                  @endif
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
