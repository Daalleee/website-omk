{{-- Reusable image cropper modal --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css">
<div id="cropModal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(1,26,1,0.75); align-items:center; justify-content:center; padding:1rem;">
    <div style="background:#fff; border-radius:14px; max-width:720px; width:100%; max-height:92vh; overflow:auto; box-shadow:0 20px 50px rgba(0,0,0,0.3);">
        <div style="padding:1rem 1.25rem; border-bottom:1px solid var(--gray-200); display:flex; justify-content:space-between; align-items:center;">
            <h3 style="margin:0; font-size:1rem; color:var(--green-950);"><i class="bi bi-crop"></i> Potong & Sesuaikan Gambar</h3>
            <button type="button" id="cropCloseX" style="border:none; background:none; font-size:1.5rem; line-height:1; cursor:pointer; color:var(--gray-500);">&times;</button>
        </div>
        <div style="padding:1.25rem;">
            <div style="max-height:55vh; overflow:hidden; background:var(--gray-100); border-radius:8px;">
                <img id="cropImage" style="max-width:100%; display:block;">
            </div>
            <div class="form-hint" style="margin-top:0.6rem;">
                Geser untuk memindahkan, scroll/perbesar untuk zoom. Tahan rasio agar hasil tampak seragam di website.
            </div>
        </div>
        <div style="padding:1rem 1.25rem; border-top:1px solid var(--gray-200); display:flex; gap:0.5rem; justify-content:flex-end; flex-wrap:wrap;">
            <button type="button" id="cropReset" class="btn btn-secondary"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
            <button type="button" id="cropCancel" class="btn btn-secondary">Batal</button>
            <button type="button" id="cropApply" class="btn btn-primary"><i class="bi bi-check-lg"></i> Terapkan & Gunakan</button>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js"></script>
<script>
(function () {
    let cropper = null;
    let currentInput = null;
    const modal = document.getElementById('cropModal');
    const image = document.getElementById('cropImage');

    function aspectRatioOf(input) {
        const v = parseFloat(input.getAttribute('data-crop'));
        return isNaN(v) ? NaN : v;
    }

    function openCropper(input) {
        const file = input.files && input.files[0];
        if (!file) return;
        currentInput = input;
        const reader = new FileReader();
        reader.onload = function (e) {
            image.src = e.target.result;
            modal.style.display = 'flex';
            if (cropper) cropper.destroy();
            cropper = new Cropper(image, {
                aspectRatio: aspectRatioOf(input),
                viewMode: 1,
                autoCropArea: 1,
                background: false,
                responsive: true
            });
        };
        reader.readAsDataURL(file);
    }

    function closeCropper() {
        modal.style.display = 'none';
        if (cropper) { cropper.destroy(); cropper = null; }
        currentInput = null;
    }

    function applyCrop() {
        if (!cropper || !currentInput) return;
        const canvas = cropper.getCroppedCanvas({
            maxWidth: 1920,
            maxHeight: 1920,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });
        if (!canvas) return;
        const input = currentInput;
        const original = input.files[0];
        const usePng = input.getAttribute('data-crop-format') === 'png';
        const mime = usePng ? 'image/png' : 'image/jpeg';
        const ext = usePng ? '.png' : '.jpg';
        const fileName = original ? original.name.replace(/\.[^.]+$/, '') + ext : ('image' + ext);

        function finish(blob) {
            const croppedFile = new File([blob], fileName, { type: mime });
            const dt = new DataTransfer();
            dt.items.add(croppedFile);
            input.files = dt.files;
            showPreview(input, canvas.toDataURL(mime));
            closeCropper();
        }

        if (usePng) {
            canvas.toBlob(finish, mime);
        } else {
            const white = document.createElement('canvas');
            white.width = canvas.width;
            white.height = canvas.height;
            const wctx = white.getContext('2d');
            wctx.fillStyle = '#ffffff';
            wctx.fillRect(0, 0, white.width, white.height);
            wctx.drawImage(canvas, 0, 0);
            white.toBlob(finish, mime, 0.88);
        }
    }

    function showPreview(input, dataUrl) {
        let prev = input.parentNode.querySelector('.crop-preview');
        if (!prev) {
            prev = document.createElement('div');
            prev.className = 'crop-preview';
            prev.style.cssText = 'margin-top:10px;';
            input.parentNode.appendChild(prev);
        }
        prev.innerHTML = '<div style="font-size:0.75rem;color:var(--gray-500);margin-bottom:4px;">Pratinjau hasil potong:</div>' +
            '<img src="' + dataUrl + '" alt="Preview" style="height:110px;border-radius:8px;object-fit:cover;border:1px solid var(--gray-200);">';
    }

    document.addEventListener('change', function (e) {
        const t = e.target;
        if (t && t.tagName === 'INPUT' && t.type === 'file' && t.hasAttribute('data-crop')) {
            if (t.files && t.files.length) openCropper(t);
        }
    });

    document.getElementById('cropApply').addEventListener('click', applyCrop);
    document.getElementById('cropCancel').addEventListener('click', closeCropper);
    document.getElementById('cropCloseX').addEventListener('click', closeCropper);
    document.getElementById('cropReset').addEventListener('click', function () { if (cropper) cropper.reset(); });
    modal.addEventListener('click', function (e) { if (e.target === modal) closeCropper(); });
})();
</script>
