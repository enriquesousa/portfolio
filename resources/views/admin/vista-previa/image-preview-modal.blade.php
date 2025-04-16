<!-- Para re-usarlo en todas las vistas donde mando llamar al modal image preview -->

<!-- Modal Image Preview -->
<div class="modal fade" id="image-preview-modal" tabindex="-1" aria-labelledby="image-preview-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="GET" class="modal-form">
                    @csrf

                    <input type="hidden" name="imagenInput" id="imagenInput" value="heroVistaPrevia-480x228.png">

                    <div class="row">
                        <img src="" alt="PreviewImage" class="img-center" id="previewImageModal">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>