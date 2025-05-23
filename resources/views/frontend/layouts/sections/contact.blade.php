<!-- Contact-Area-Start -->
<section class="contact-area section-padding" id="contact-page">
    <div class="container">

        <!-- Section-Title -->
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ __($contactTitle->title) }}</h3>
                    <div class="desc">
                        <p>{!! __($contactTitle->sub_title) !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact-Form -->
        <div class="row">
            <div class="col-sm-12">
                <form class="contact-form" id="contact-form">
                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="name" id="form-name" class="input-box" placeholder="{{ __('Nombre') }}">
                                <label for="form-name" class="icon lb-name"><i class="fal fa-user"></i></label>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="email" id="form-email" class="input-box" placeholder="{{ __('Correo Electrónico') }}">
                                <label for="form-email" class="icon lb-email"><i class="fal fa-envelope"></i></label>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="subject" id="form-subject" class="input-box" placeholder="{{ __('Asunto') }}">
                                <label for="form-subject" class="icon lb-subject"><i class="fal fa-check-square"></i></label>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="col-sm-12">
                            <div class="form-box">
                                <textarea class="input-box" id="form-message" placeholder="{{ __('Mensaje') }}" cols="30" rows="4" name="message"></textarea>
                                <label for="form-message" class="icon lb-message"><i class="fal fa-edit"></i></label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-box">
                                <button class="button-primary mouse-dir" type="submit" id="submit_button">{{ __('Enviar Mensaje') }} <span class="dir-part"></span></button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</section>


@push('child-scripts')
    <script>

        $(document).ready(function() {

            // csrf token para ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#contact-form', function(e) {
                e.preventDefault(); // para deshabilitar el envió por defecto del formulario
    
                $.ajax({
                    url: "{{ route('contact.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('#submit_button').prop('disabled', true);
                        $('#submit_button').html(`{{ __('Enviando ...') }} &nbsp; <span class="spinner-border text-light spinner-border-sm"> <span>`);
                    },
                    success: function(response) {
                        // console.log(response);
                        if(response.status == 'success') {
                            $('#submit_button').prop('disabled', false);
                            $('#submit_button').html(`{{ __('Enviar') }}`);
                            // $('#contact-form')[0].reset();
                            $('#contact-form').trigger('reset');
                            toastr.success(response.message);
                        }
                    },
                    error: function(response) { 
                        // console.log(response);
                        if(response.status == 422) {
                            let errorMessages = $.parseJSON(response.responseText);
                            // console.log(errorMessages);
                            $.each(errorMessages.errors, function(key, value) {
                                // console.log(key, value);
                                // console.log(value[0]);
                                toastr.error(value[0]);
                            });

                            // sleep 1 second to show all the errors
                            setTimeout(function() {
                                $('#submit_button').prop('disabled', false);
                                $('#submit_button').html(`{{ __('Enviar') }}`);
                            }, 1000);
                        }
                    }
                })
                
            })

        })

    </script>
@endpush