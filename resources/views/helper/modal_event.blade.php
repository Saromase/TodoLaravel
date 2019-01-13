@section('scripts')
<script src="{{ asset('js/modal.js') }}" defer></script>
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un événement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>

                    <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>

                    <div class="form-group">
                        <label for="date_start">Date de début</label>
                        <input type="date" class="form-control" id="date_start" name="date_start" value="">
                    </div>

                    <div class="form-group">
                        <label for="date_end">Date de fin</label>
                        <input type="date" class="form-control" id="date_end" name="date_end" value="">
                    </div>

                    <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modal-accept">Ajouter</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>