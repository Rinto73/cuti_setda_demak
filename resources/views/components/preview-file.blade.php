@php
use Illuminate\Support\Facades\Storage;

$fileUrl = Storage::url($cuti->dokumen);
@endphp


@php
$fileUrl = Storage::url($cuti->dokumen);
$ext = strtolower(pathinfo($cuti->dokumen, PATHINFO_EXTENSION));
@endphp

<div style="padding: 1rem; text-align: center;">
    @if(in_array($ext, ['jpg','jpeg','png']))
    <img src="{{ $fileUrl }}"
        alt="Preview Gambar"
        style="max-width:100%; max-height:600px; border: 1px solid #ccc; border-radius: 8px; padding: 0.5rem;" />
    @elseif($ext === 'pdf')
    <iframe src="{{ $fileUrl }}"
        width="100%"
        height="600px"
        style="border: none;"
        title="Preview PDF"></iframe>
    @else
    <p><strong>⚠️ Format file belum didukung untuk preview.</strong></p>
    <p>Silakan download file untuk melihatnya secara lengkap.</p>
    <a href="{{ $fileUrl }}" target="_blank"
        style="color: #2563eb; font-weight: bold;">⬇️ Download File</a>
    @endif
</div>