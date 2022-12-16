@extends('layouts.master')

@section('head_scripts')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('titlePage')
    {{ trans('sections_trans.titlePage') }}
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <div class="text-right">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                            data-target="#exampleModal"><i class="fas fa-plus"></i>
                            {{ trans('sections_trans.addSection') }}</button>
                    </div>
                    <br>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card card-primary">

                        <div class="card-body">
                            <table id="gradeTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="20%">{{ trans('sections_trans.image') }}</th>
                                        <th>{{ trans('sections_trans.nameSection') }}</th>
                                        <th>{{ trans('sections_trans.status') }}</th>
                                        <th>{{ trans('sections_trans.processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($sections as $section)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>

                                                <img src="{{ $section->getFirstMediaUrl('images') }}" / width="120px">
                                            </td>
                                            <td>{{ $section->section_name }}</td>
                                            </td>
                                            <td>
                                                @if ($section->is_active === 'active')
                                                    <label
                                                        class="badge badge-success">{{ trans('sections_trans.statusSection_AC') }}</label>
                                                @else
                                                    <label
                                                        class="badge badge-danger">{{ trans('sections_trans.statusSection_No') }}</label>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $section->id }}">{{ trans('sections_trans.edit') }}</a>
                                                <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $section->id }}">{{ trans('sections_trans.delete') }}</a>
                                            </td>
                                        </tr>


                                        <!-- Edit section -->
                                        <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                                            id="exampleModalLabel">
                                                            {{ trans('sections_trans.editSection') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{{ route('sections.update', 'test') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            {{ method_field('patch') }}
                                                            {{ csrf_field() }}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="section_name_ar"
                                                                        class="form-control"
                                                                        value="{{ $section->getTranslation('section_name', 'ar') }}">
                                                                </div>

                                                                <div class="col">
                                                                    <input type="text" name="section_name_en"
                                                                        class="form-control"
                                                                        value="{{ $section->getTranslation('section_name', 'en') }}">
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control" value="{{ $section->id }}">
                                                                </div>
                                                            </div>

                                                            <br>

                                                            <div class="col">
                                                                <label class="control-label"
                                                                    for="image">{{ trans('sections_trans.image') }}</label>
                                                                <input type="file" class="form-control" name="image"
                                                                    id="image">

                                                            </div>
                                                            <br />
                                                            <div class="col">
                                                                <div class="form-check">

                                                                    @if ($section->is_active === 'active')
                                                                        <input type="checkbox" checked
                                                                            class="form-check-input" name="status"
                                                                            id="exampleCheck1">
                                                                    @else
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="status" id="exampleCheck1">
                                                                    @endif
                                                                    <label class="form-check-label"
                                                                        for="exampleCheck1">{{ trans('sections_trans.status') }}</label><br>
                                                                </div>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('sections_trans.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('sections_trans.submit') }}</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- delete_modal_Grade -->
                                        <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('sections_trans.deleteSection') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('sections.destroy', 'test') }}"
                                                            method="post">
                                                            {{ method_field('Delete') }}
                                                            @csrf
                                                            {{ trans('sections_trans.warningSection') }}
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $section->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('sections_trans.close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">{{ trans('sections_trans.submit') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- add new section -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                    {{ trans('sections_trans.addSection') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('sections.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label">{{ trans('sections_trans.sectionName_ar') }}</label>
                                            <input type="text" name="section_name_ar" class="form-control"
                                                placeholder="{{ trans('sections_trans.sectionName_ar') }}">
                                        </div>


                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label">{{ trans('sections_trans.sectionName_en') }}</label>
                                            <input type="text" name="section_name_en" class="form-control"
                                                placeholder="{{ trans('sections_trans.sectionName_en') }}">
                                        </div>
                                    </div>


                                        <br>

                                        <div class="col">
                                            <label class="control-label"
                                                for="image">{{ trans('sections_trans.image') }}</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>

                                        <br>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="status"
                                                    id="exampleCheck1">
                                                <label class="form-check-label"
                                                    for="exampleCheck1">{{ trans('sections_trans.status') }}</label><br>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('sections_trans.close') }}</button>
                                        <button type="submit"
                                            class="btn btn-danger">{{ trans('sections_trans.submit') }}</button>
                                    </div>
                                </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- row closed -->
        @endsection
        @section('footer_scripts')
            <!-- DataTables  & Plugins -->
            <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>



            <!-- Page specific script -->
            <script>
                $(function() {

                    $("#gradeTable").DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#gradeTable_wrapper .col-md-6:eq(0)');

                });
            </script>
            @toastr_js
            @toastr_render
        @endsection
