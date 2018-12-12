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
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createmodal"><i class="fa  fa-plus-square"></i> Tambah Karyawan</button>
                            </div>
                                <div class="table-responsive table--no-card m-b-30">
                                @if (\Session::has('info'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        {{ \Session::get('info') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Posisi</th>
                                                <th>Phone</th>
                                                <th>Kota</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($employees as $employee)
                                            @php
                                                $position = $positions[$employee['employee_position']];
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ strtoupper($employee['employee_firstName']) }} {{ strtoupper($employee['employee_lastName']) }}</td>
                                                <td>{{ strtoupper($position) }}</td>
                                                <td>{{ $employee['employee_phone'] }}</td>
                                                <td>{{ strtoupper($employee['employee_city']) }} </td>
                                                <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editmodal{{$employee['id']}}"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{$employee['id']}}"><i class="fa fa-trash"></i></button>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewmodal{{$employee['id']}}"><i class="fa fa-eye"></i></button>
                                                </th>
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

            modal
            @foreach($employees as $employee)
            <div class="modal fade" id="editmodal{{$employee['id']}}" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Edit employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('EmployeeController@update', $employee['id']) }}" method="post">
                            @csrf

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <select type="text" name="user_id" class="form-control" required>
                                            <option value="">Pilih User</option>
                                            @foreach($users as $user)
                                            @if($user['id'] == $employee['user_id'])
                                                @php $selected = 'selected'; @endphp
                                            @else
                                                @php $selected = ''; @endphp
                                            @endif
                                            <option value="{{$user['id']}}" {{ $selected }}>{{$user['email']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <select type="text" name="location_id" class="form-control" required>
                                            <option value="">Pilih Lokasi Absen</option>
                                            @foreach($locations as $location)
                                            @if($location['id'] == $employee['user_id'])
                                                @php $selected = 'selected'; @endphp
                                            @else
                                                @php $selected = ''; @endphp
                                            @endif
                                            <option value="{{$location['id']}}" {{ $selected }}>{{$location['location_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-table"></i>
                                        </div>
                                        <input type="text" name="ktp" value="{{ $employee['employee_ktp'] }}" placeholder="KTP" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="first_name" value="{{ $employee['employee_firstName'] }}" placeholder="Nama Depan" class="form-control" required>
                                        <input type="text" name="last_name" value="{{ $employee['employee_lastName'] }}" placeholder="Nama Belakang" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select type="text" name="role_id" class="form-control" required>
                                            <option value="">Pilih Level</option>
                                            @foreach($roles as $role)
                                            @if($role['id'] == $employee['role_id'])
                                                @php $selected = 'selected'; @endphp
                                            @else
                                                @php $selected = ''; @endphp
                                            @endif
                                            <option value="{{$role['id']}}" {{ $selected }}>{{$role['role_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select name="position" class="form-control">
                                            <option value="">Pilih Posisi</option>
                                            @foreach($positions as $key=>$value)
                                            @if($key == $employee['employee_position'])
                                                @php $selected = 'selected'; @endphp
                                            @else
                                                @php $selected = ''; @endphp
                                            @endif
                                            <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="imei" value="{{ $employee['employee_IMEI'] }}" placeholder="IMEI" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="phone" value="{{ $employee['employee_phone'] }}" placeholder="Phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select name="gender" class="form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach($genders as $key=>$value)
                                            @if($key == $employee['employee_gender'])
                                                @php $selected = 'selected'; @endphp
                                            @else
                                                @php $selected = ''; @endphp
                                            @endif
                                            <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="date" name="birth_date" value="{{ $employee['employee_birthDate'] }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <textarea name="address" class="form-control" cols="30" rows="3">{{ $employee['employee_address'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="city" value="{{ $employee['employee_city'] }}" placeholder="Kota" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="region" value="{{ $employee['employee_region'] }}" placeholder="Provinsi" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select name="religion" class="form-control">
                                            <option value="">Pilih Agama</option>
                                            @foreach($religions as $key=>$value)
                                            @if($key == $employee['employee_religion'])
                                                @php $selected = 'selected'; @endphp
                                            @else
                                                @php $selected = ''; @endphp
                                            @endif
                                            <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deletemodal{{$employee['id']}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Hapus Lokasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('EmployeeController@destroy', $employee['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <p>Apakah kamu yakin?</p>
                                    <input type="hidden" name="id" value="{{$employee['id']}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Tambah Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employee') }}" method="post">
                            @csrf
                            
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <select type="text" name="user_id" class="form-control" required>
                                            <option value="">Pilih User</option>
                                            @foreach($users as $user)
                                            <option value="{{$user['id']}}">{{$user['email']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <select type="text" name="location_id" class="form-control" required>
                                            <option value="">Pilih Lokasi Absen</option>
                                            @foreach($locations as $location)
                                            <option value="{{$location['id']}}">{{$location['location_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-table"></i>
                                        </div>
                                        <input type="text" name="ktp" placeholder="KTP" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="first_name" placeholder="Nama Depan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="last_name" placeholder="Nama Belakang" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select type="text" name="role_id" class="form-control" required>
                                            <option value="">Pilih Level</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role['id']}}">{{$role['role_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select name="position" class="form-control">
                                            <option value="">Pilih Posisi</option>
                                            @foreach($positions as $key=>$value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="imei" placeholder="IMEI" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="phone" placeholder="Phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select name="gender" class="form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="date" name="birth_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <textarea name="address" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="city" placeholder="Kota" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="region" placeholder="Provinsi" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <select name="region" class="form-control">
                                            <option value="">Pilih Agama</option>
                                            @foreach($religions as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
            @endsection

