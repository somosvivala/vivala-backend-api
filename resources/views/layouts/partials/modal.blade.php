<div class="modal fade" id="@yield('modal-id')" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">@yield('modal-title')</h4>
            </div>
            <div class="modal-body" style="min-height:200px; height:100%">
                @yield('modal-body')
            </div>
            <div class="modal-footer">
                @yield('modal-footer')
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
