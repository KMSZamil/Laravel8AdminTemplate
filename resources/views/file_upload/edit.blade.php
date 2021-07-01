@extends('app')

@section('page_title', 'File Edit')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/dropify/dropify.min.css')}}">
@endpush

@section('main_content')

    <div class="row layout-top-spacing" id="cancel-row">
        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>File form edit</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <form action="{{ route('file.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="{{ isset($row->id) ? $row->id : '' }}">
                        <div class="form-group row mb-4">
                            <label for="title" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Title</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="{{ isset($row->title) ? $row->title : '' }}">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="file_to_upload" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Upload</label>
                            <div class="col-xl-5 col-lg-9 col-md-4 col-sm-5">
                                <input type="file" class="form-control dropify" id="file_to_upload" name="file_to_upload">
                                <small class="form-text text-muted"> * This field is not mandatory</small>
                            </div>
                            @isset($row->file_path)
                            <div class="col-xl-5 col-lg-9 col-md-4 col-sm-5">
                                <a href="{{ url('storage/'.$row->file_path) }}" target="_blank">
                                    <img src="{{asset('images/attachment2.gif')}}" alt="attachment">
                                </a>
                            </div>
                            @endisset
                        </div>

                        <div class="form-group row mb-4">
                            <label for="status" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Status</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <select class="form-control" name="status">
                                    <option value="Y" {{ isset($row->status) && ($row->status)=='Y' ? 'selected' : '' }}>Active</option>
                                    <option value="N" {{ isset($row->status) && ($row->status)=='N' ? 'selected' : '' }}>In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info mt-3">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/dropify/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush

