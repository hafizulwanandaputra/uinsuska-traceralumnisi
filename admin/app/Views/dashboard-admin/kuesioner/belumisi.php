<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/kuesioner-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Yang Belum Isi Kuesioner</h1>
    </div>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success bg-gradient-header alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="w-100 ms-3">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger bg-gradient-header alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-start">
                <div style="width: 12px; text-align: center;">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
                <div class="w-100 ms-3">
                    <?= session()->getFlashdata('error'); ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </div>
        </div>
    <?php endif; ?>
    <!-- DATATABLES -->
    <div class="mb-2">
        <table id="tabel" class="table table-sm table-hover" style="width:100%; font-size: 9pt;">
            <thead>
                <tr class="align-middle">
                    <th scope="col" class="bg-body-secondary border-secondary bg-gradient" style="border-bottom-width: 2px;">No.</th>
                    <th scope="col" class="tindakan bg-body-secondary border-secondary bg-gradient" style="border-bottom-width: 2px;">Tindakan</th>
                    <th scope="col" class="bg-body-secondary border-secondary bg-gradient" style="border-bottom-width: 2px;">Nama Alumni</th>
                    <th scope="col" class="bg-body-secondary border-secondary bg-gradient" style="border-bottom-width: 2px;">NIM</th>
                    <th scope="col" class="bg-body-secondary border-secondary bg-gradient" style="border-bottom-width: 2px;">Nomor HP</th>
                    <th scope="col" class="bg-body-secondary border-secondary bg-gradient" style="border-bottom-width: 2px;">Nomor HP 2</th>
                    <th scope="col" class="bg-body-secondary border-secondary bg-gradient" style="border-bottom-width: 2px;">Email</th>
                </tr>
            </thead>
            <tbody class="align-middle">
            </tbody>
        </table>
    </div>
    <!-- END OF DATATABLES -->
</main>
</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('datatable'); ?>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script>
    /* For Export Buttons available inside jquery-datatable "server side processing" - Start
- due to "server side processing" jquery datatble doesn't support all data to be exported
- below function makes the datatable to export all records when "server side processing" is on */

    function newexportaction(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function(e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function(e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one('preXhr', function(e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };
    //For Export Buttons available inside jquery-datatable "server side processing" - End
    // Inisialisasi Datatables
    $(document).ready(function() {
        $('#tabel').DataTable({
            'language': {
                'searchPlaceholder': 'Nama / NIM',
                "decimal": ",",
                "thousands": "."
            },
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                "sSearch": "Pencarian: ",
                "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
                "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                "sInfoFiltered": "(di-filter dari _MAX_ total data)",
                "oPaginate": {
                    "sFirst": '<i class="fa-solid fa-angles-left"></i>',
                    "sLast": '<i class="fa-solid fa-angles-right"></i>',
                    "sPrevious": '<i class="fa-solid fa-angle-left"></i>',
                    "sNext": '<i class="fa-solid fa-angle-right"></i>'
                }
            },
            'dom': "<'d-lg-flex justify-content-lg-between align-items-lg-center mb-0'<'text-md-center text-lg-start'i><'text-lg-center text-lg-end'f>>" +
                "<'d-lg-flex justify-content-lg-between align-items-lg-center'<'text-md-center text-lg-start mt-2'l><'mt-2'>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'d-lg-flex justify-content-lg-between align-items-lg-center'<'text-md-center text-lg-start'><'text-md-center text-lg-end'p>>",
            'initComplete': function(settings, json) {
                $("#tabel").wrap("<div class='overflow-auto position-relative'></div>");
                $('.dataTables_filter input[type="search"]').css({
                    'width': '220px'
                });
            },
            "drawCallback": function() {
                $(".pagination").wrap("<div class='overflow-auto'></div>");
                $(".pagination").addClass("pagination-sm");
                $(".page-item .page-link").addClass("bg-gradient");
            },
            "search": {
                "caseInsensitive": true
            },
            'pageLength': 20,
            'lengthMenu': [
                [20, 40, 60, 80, 100, -1],
                [20, 40, 60, 80, 100, "All"]
            ],
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('/kuesioner-admin/databelumisi') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "target": [1],
                "orderable": false
            }]
        });
    });
</script>
<?= $this->endSection(); ?>