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
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createmodal"><i class="fa  fa-plus-square"></i> Tambah Lokasi</button>
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
                                                <th>Nama Lokasi</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Radius</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($locations as $location)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $location['location_name'] }}</td>
                                                <td>{{ $location['location_latitude'] }}</td>
                                                <td>{{ $location['location_longitude'] }}</td>
                                                <td>{{ $location['location_distance'] * 1000 }} Meter</td>
                                                <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editmodal{{$location['id']}}"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{$location['id']}}"><i class="fa fa-trash"></i></button>
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

            <!-- modal -->
            @foreach($locations as $location)
            <div class="modal fade" id="editmodal{{$location['id']}}" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Edit location</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('LocationController@update', $location['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="hidden" name="id" value="{{$location['id']}}">
                                    <input type="text" name="name" class="form-control" value="{{$location['location_name']}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <input type="text" name="latitude" class="form-control" value="{{$location['location_latitude']}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <input type="text" name="longitude" class="form-control" value="{{$location['location_longitude']}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-gear"></i>
                                    </div>
                                    <input type="text" name="distance" class="form-control" value="{{$location['location_distance']}}" required>
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

            <div class="modal fade" id="deletemodal{{$location['id']}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Hapus Lokasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('LocationController@destroy', $location['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <p>Apakah kamu yakin?</p>
                                    <input type="hidden" name="id" value="{{$location['id']}}">
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
                            <h5 class="modal-title" id="mediummodalLabel">Tambah Lokasi Kantor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('location') }}" method="post">
                            @csrf
                            
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" name="name" placeholder="Nama Lokasi" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input type="text" name="latitude" placeholder="Latitude" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-table"></i>
                                        </div>
                                        <input type="text" name="longitude" placeholder="Longitude" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-info"></i>
                                        </div>
                                        <input type="text" name="distance" placeholder="radius" class="form-control" required>
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

