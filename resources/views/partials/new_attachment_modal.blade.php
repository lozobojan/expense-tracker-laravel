<!-- Modal -->
<div class="modal fade" id="newAttachmentModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novi fajl</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="{{ route('attachment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea name="description" rows="4" class="form-control mb-3" placeholder="Unesite opis"></textarea>

            <input type="hidden" name="expense_id" value="" id="newAttachmentExpenseId">
            <input type="file" class="form-control" name="fileToUpload" required>

            <button class="btn btn-success mt-4 w-100">Potvrdi</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
      </div>
    </div>
  </div>
</div>
