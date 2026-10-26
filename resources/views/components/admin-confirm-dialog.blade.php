<dialog class="admin-confirm-dialog" data-admin-confirm-dialog aria-labelledby="admin-confirm-title" aria-describedby="admin-confirm-message">
    <div class="admin-confirm-body">
        <span class="admin-confirm-icon" aria-hidden="true"><x-ui-icon name="alert-triangle" :size="23" /></span>
        <h2 id="admin-confirm-title">Confirm action</h2>
        <p id="admin-confirm-message" data-admin-confirm-message>Are you sure you want to continue?</p>
        <div class="admin-confirm-actions">
            <button type="button" class="button button-outline" data-admin-confirm-cancel>Cancel</button>
            <button type="button" class="button admin-button-danger" data-admin-confirm-proceed><x-ui-icon name="trash-2" :size="16" /> Confirm</button>
        </div>
    </div>
</dialog>
