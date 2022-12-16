@extends('layouts.master')
@section('titlePage')
    {{ trans('dashboard.adminDashboard') }}
@endsection

@section('head_scripts')
    @livewireStyles()
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>22</h3>

                    <p style="font-size: 25px;">{{ trans('dashboard.numberOfStudents') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <a href="#" class="small-box-footer">{{ trans('words.moreInfo') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>33</h3>

                    <p style="font-size: 25px;">{{ trans('dashboard.numberOfTeachers') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="#" class="small-box-footer">{{ trans('words.moreInfo') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p style="font-size: 25px;">{{ trans('dashboard.numberOfParents') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="#" class="small-box-footer">{{ trans('words.moreInfo') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>22</h3>

                    <p style="font-size: 25px;">{{ trans('dashboard.numberOfSections') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard"></i>
                </div>
                <a href="#" class="small-box-footer">{{ trans('words.moreInfo') }} <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-xl-12 mb-30">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        {{ trans('dashboard.latestOperations') }}
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#students" data-toggle="tab">{{ trans('dashboard.students') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#teachers" data-toggle="tab">{{ trans('dashboard.teachers') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#parents" data-toggle="tab">{{ trans('dashboard.parents') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#fee_invoices" data-toggle="tab">{{ trans('dashboard.invoices') }}</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        {{-- students Table --}}
                        <div class="tab-pane fade active show" id="students" role="tabpanel"
                            aria-labelledby="students-tab">


                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Latest Students</h3>
                                        </div>
                                        <!-- ./card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Student Name</th>
                                                        <th>Email</th>
                                                        <th>Gender</th>
                                                        <th>Grade</th>
                                                        <th>Classroom</th>
                                                        <th>Section</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                        <tr data-widget="expandable-table" aria-expanded="false">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td>{{ $student->gender->Name }}</td>
                                                            <td>{{ $student->grade->Name }}</td>
                                                            <td>{{ $student->classroom->class_name }}</td>
                                                            <td>{{ $student->section->Name_Section }}</td>
                                                            <td class="text-success">{{ $student->created_at }}</td>
                                                        @empty
                                                            <td class="text-center text-bold" colspan="8">Not Found any
                                                                Data!</td>
                                                        </tr>
                                                    @endforelse --}}

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>

                        {{-- teachers Table --}}
                        <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Latest Teachers</h3>
                                        </div>
                                        <!-- ./card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم المعلم</th>
                                                        <th>النوع</th>
                                                        <th>تاريخ التعين</th>
                                                        <th>التخصص</th>
                                                        <th>تاريخ الاضافة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $teacher->Name }}</td>
                                                        <td>{{ $teacher->genders->Name }}</td>
                                                        <td>{{ $teacher->Joining_Date }}</td>
                                                        <td>{{ $teacher->specializations->Name }}</td>
                                                        <td class="text-success">{{ $teacher->created_at }}</td>
                                                    @empty

                                                        <td class="text-center text-bold" colspan="8">Not Found any
                                                            Data!</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody> --}}
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>

                        </div>

                        {{-- parents Table --}}
                        <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Latest Parents</h3>
                                        </div>
                                        <!-- ./card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم ولي الامر</th>
                                                        <th>البريد الالكتروني</th>
                                                        <th>رقم الهوية</th>
                                                        <th>رقم الهاتف</th>
                                                        <th>تاريخ الاضافة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @forelse(\App\Models\PParent::latest()->take(5)->get() as $parent)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $parent->Name_Father }}</td>
                                                            <td>{{ $parent->email }}</td>
                                                            <td>{{ $parent->National_ID_Father }}</td>
                                                            <td>{{ $parent->Phone_Father }}</td>
                                                            <td class="text-success">{{ $parent->created_at }}</td>
                                                        @empty

                                                            <td class="text-center text-bold" colspan="8">Not Found any
                                                                Data!</td>
                                                        </tr>
                                                    @endforelse --}}
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>

                        {{-- Fees Table --}}
                        <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Latest Fees</h3>
                                        </div>
                                        <!-- ./card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>تاريخ الفاتورة</th>
                                                        <th>اسم الطالب</th>
                                                        <th>المرحلة الدراسية</th>
                                                        <th>الصف الدراسي</th>
                                                        <th>القسم</th>
                                                        <th>نوع الرسوم</th>
                                                        <th>المبلغ</th>
                                                        <th>تاريخ الاضافة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection
@section('footer_scripts')
    @livewireScripts
    @stack('scripts')
@endsection
