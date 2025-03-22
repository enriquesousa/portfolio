@extends('admin.layouts.master')
@section('content')

    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dashboard') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>{{ __('Actividades Admin') }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>{{ __('Todas las Actividades') }}</h4>
                        </div>

                        <div class="card-body">

                            {{-- app/DataTables/AdminLogTimesDataTable.php --}}
                            {{ $dataTable->table() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    </section>
@endsection

<!-- Modal -->
<div class="modal fade" id="logTime_modal" tabindex="-1" aria-labelledby="logTime_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Log Time Details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="GET" class="reservation-form">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            {{-- ID --}}
                            <div class="form-group">
                                <label for="">{{ __('ID') }}</label>
                                <input type="text" class="form-control logTime-id" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-6">
                            {{-- User Name --}}
                            <div class="form-group">
                                <label for="">{{ __('User Name') }}</label>
                                <input type="text" class="form-control logTime-user" readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            {{-- User Login Time --}}
                            <div class="form-group">
                                <label for="">{{ __('Login Time') }}</label>
                                <input type="text" class="form-control logTime-login-time" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-6">
                            {{-- User Logout Time --}}
                            <div class="form-group">
                                <label for="">{{ __('Logout Time') }}</label>
                                <input type="text" class="form-control logTime-logout-time" readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            {{-- User Total Time --}}
                            <div class="form-group">
                                <label for="">{{ __('Total Time') }}</label>
                                <input type="text" class="form-control logTime-total-time" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-6">
                            {{-- Created At --}}
                            <div class="form-group">
                                <label for="">{{ __('Created At') }}</label>
                                <input type="text" class="form-control logTime-created-at" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    
                    {{-- Description --}}
                    <div class="form-group">
                        <label for="">{{ __('Description') }}</label>
                        <textarea class="form-control logTime-description w-100" style="height: 100px" readonly="readonly"></textarea>
                    </div>

                    {{-- Modal Footer Button Close --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@push('child-scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {

            var logTimeId = ''; // Almacenar el id de la orden, aqui tiene scope global

            $(document).on('click', '.logTime_details_btn', function() {

                // alert('Alert Esta trabajando ...');
                // console.log('Esta trabajando ...');

                let id = $(this).data('id');
                logTimeId = id;
                // console.log(id);

                $.ajax({
                    type: 'GET',
                    url: '{{ route('actividades.modal-details', ':id') }}'.replace(":id", id),
                    beforeSend: function() {
                        
                    },
                    success: function(response) {
                        console.log(response);

                        // LogTime ID
                        $('.logTime-id').val(response.logTime.id);

                        // LogTime User
                        $('.logTime-user').val(response.logTime.user.name);

                        // LogTime Login Time
                        $('.logTime-login-time').val(response.login_time);

                        // LogTime Logout Time
                        $('.logTime-logout-time').val(response.logout_time);
                        
                        // LogTime Total Time
                        $('.logTime-total-time').val(response.time_interval);

                        // LogTime Created At
                        $('.logTime-created-at').val(response.created_at);

                        // LogTime Description
                        $('.logTime-description').val(response.description);

                    },
                    error: function(xhr, status, error) {

                    }
                });
            });
            
        })
    </script>

@endpush

