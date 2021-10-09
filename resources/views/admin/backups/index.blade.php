@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{asset('dist/css/pages/data-table.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <form action="{{route('backup.store')}}" method="post">
                    @csrf
                    @method("PUT")
                    <button class="btn btn-primary right" type="submit">Create Backup</button>
                </form>
                
                <h5 class="card-title">Backups</h5>
                <table id="file_export" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Disk</th>
                            <th>Backup Date</th>
                            <th>File Size</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($backups as $k => $b)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $b['disk'] }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}</td>
                            <td>{{ round((int)$b['file_size']/1048576, 2).' MB' }}</td>
                            <td>
                                
                                {{-- <br><br> --}}
                                

                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s6">
                                            @if ($b['download'])
                                            <a href="{{ route('backup.download') }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}">
                                                <button class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Download Backup">
                                                    <i class="material-icons">cloud_download</i>
                                                </button>
                                            </a>
                                            @endif
                                        </div>
                                        <form action="{{route('backup.destroy',$b['file_name'])}}?disk={{ $b['disk'] }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn red tooltipped " type="submit" data-position="top" data-delay="50" data-tooltip="Delete Backup">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form> 
                                    </div>
                                    
                                </div>

                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')
<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('dist/js/pages/datatable/datatable-advanced.init.js')}}"></script>
@endpush
