<?= $this->extend('dashboard-admin/templates/dashboard'); ?>
<?= $this->section('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-start align-items-start pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 me-3"><a href="<?= base_url('/pengumuman-admin'); ?>"><i class="fa-solid fa-arrow-left"></i></a></h1>
        <h1 class="h2">Buat Pengumuman</h1>
    </div>

    <?= form_open_multipart('/pengumuman-admin/save'); ?>
    <?= csrf_field(); ?>
    <div class="mb-3 row">
        <label for="judul" class="col-lg-2 col-form-label">Judul</label>
        <div class="col-lg-10">
            <input type="text" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>" autocomplete="off" autofocus>
            <div class="invalid-feedback">
                <?= validation_show_error('judul'); ?>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <textarea id="textarea" class="form-control font-monospace" name="isi" id="isi"><?= old('isi'); ?></textarea>
            <?php if (validation_show_error('isi')) : ?>
                <div class="invalid-feedback d-block">
                    <?= validation_show_error('isi'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <button class="btn btn-primary bg-gradient" type="submit"><i class="fa-solid fa-plus"></i> Buat</button>
    </div>
    <?= form_close(); ?>
</main>
</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('tinymce'); ?>
<script>
    tinymce.init({
        selector: 'textarea',
        skin: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "oxide-dark" : "oxide"),
        content_css: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "default"),
        height: "640",
        menu: {
            file: {
                title: 'File',
                items: 'restoredraft | preview | export print | deleteallconversations'
            },
            edit: {
                title: 'Edit',
                items: 'undo redo | cut copy paste pastetext | selectall | searchreplace'
            },
            view: {
                title: 'View',
                items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments'
            },
            insert: {
                title: 'Insert',
                items: 'link addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime'
            },
            format: {
                title: 'Format',
                items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontsize align lineheight | forecolor backcolor | language | removeformat'
            },
            tools: {
                title: 'Tools',
                items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount'
            },
            table: {
                title: 'Table',
                items: 'inserttable | cell row column | advtablesort | tableprops deletetable'
            },
            help: {
                title: 'Help',
                items: 'help'
            }
        },
        plugins: 'anchor autolink charmap codesample emoticons link lists searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough | link table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    // Prevent Bootstrap dialog from blocking focusin
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });
</script>
<?= $this->endSection(); ?>