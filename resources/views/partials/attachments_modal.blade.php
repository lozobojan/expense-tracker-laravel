<!-- Modal -->
<div class="modal fade" id="attachmentsModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pridruženi fajlovi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body table-responsive">
      
        <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th>Opis</th>
                    <th>Preuzmi</th>
                </tr>
            </thead>
            <tbody id="attachmentsTableBody">
                <!-- populate from backend (ajax) -->
            </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
      </div>
    </div>
  </div>
</div>