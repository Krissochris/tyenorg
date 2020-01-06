@extends('layouts.app', ['activePage' => 'course', 'titlePage' => __('Create Course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('course.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add Course') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('course.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" title="title" id="input-title" type="text" placeholder="{{ __('title') }}" value="{{ old('title') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('title'))
                                                <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <textarea rows="3" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" value="{{ old('description') }}" required="true" aria-required="true"></textarea>
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('category') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" id="input-category" type="text" placeholder="{{ __('category') }}" value="{{ old('category') }}" required />
                                            @if ($errors->has('category'))
                                                <span id="category-error" class="error text-danger" for="input-category">{{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('No. of Referrals') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('referrals') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('referrals') ? ' is-invalid' : '' }}" name="referrals" id="input-referrals" type="number" placeholder="{{ __('referrals') }}" value="{{ old('referrals') }}" required />
                                            @if ($errors->has('referrals'))
                                                <span id="referrals-error" class="error text-danger" for="input-referrals">{{ $errors->first('referrals') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('price') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price" type="number" placeholder="{{ __('price') }}" value="{{ old('price') }}" required />
                                            @if ($errors->has('price'))
                                                <span id="price-error" class="error text-danger" for="input-price">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('photo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" id="input-photo" type="file" placeholder="{{ __('photo') }}" value="{{ old('photo') }}"/>
                                            @if ($errors->has('photo'))
                                                <span id="photo-error" class="error text-danger" for="input-photo">{{ $errors->first('photo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Add Course') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
