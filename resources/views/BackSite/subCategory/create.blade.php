@extends('Layouts.BackSite.master')
@section('title',"Sub Category Create")

@section('cus-css')
    <!-- select2 CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/backsite/css/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backsite/css/chosen/bootstrap-chosen.css') }}">
@endsection

@section('main_content')
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Sub Category Create</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{route('subCategory.store')}}" method="POST">
                                            @csrf
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Name</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input name="name" value="{{old('name')}}" type="text" class="form-control" />
                                                        </div>
                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Select Category</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <select name="category_id" data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">
                                                                <option value="">Select</option>
                                                                @foreach($categories as $cat)
                                                                    <option @if(old('category_id') == $cat->id)selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('category_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Description</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <input name="description" value="{{old('description')}}" type="text" class="form-control" />
                                                        </div>
                                                        @error('description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                    <a class="btn btn-white" href="{{route('subCategory.index')}}">Cancel</a>
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cus-js')
        <script src="{{ asset('assets/backsite/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/backsite/js/select2/select2-active.js') }}"></script>

        <!-- chosen JS
		============================================ -->
        <script src="{{ asset('assets/backsite/js/chosen/chosen.jquery.js') }}"></script>
        <script src="{{ asset('assets/backsite/js/chosen/chosen-active.js') }}"></script>
@endsection