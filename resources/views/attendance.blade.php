@extends('layouts.app')
@extends('layouts.header')

            @section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                            <div class="form-group">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createmodal"><i class="fa  fa-plus-square"></i> Cetak</button>
                            </div>
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Lokasi</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($attendances as $attendance)
                                            @php
                                                $name = $attendance->employee->find($attendance['employee_id']);
                                                $in_time = strtotime($attendance['created_at']);
                                                $out_time = strtotime($attendance['updated_at'])
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ strtoupper($name->employee_firstName) }} {{ strtoupper($name->employee_lastName) }}</td>
                                                <td>{{ $attendance['attendance_info'] }}</td>
                                                <td>{{ date('G:i', $in_time) }}</td>
                                                <td>{{ $attendance['attendance_check'] != '' ? '' : date('G:i', $out_time) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection

