<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body style="font-family:sans-serif;padding:2rem;background:#f5f5f5;">
    <div style="max-width:600px;margin:0 auto;background:white;border-radius:12px;padding:2rem;box-shadow:0 2px 10px rgba(0,0,0,0.05);">
        <h2 style="color:#2b310a;margin-bottom:1.5rem;">Pesan Baru dari Website</h2>
        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="padding:0.75rem 0;font-weight:700;color:#475569;width:100px;">Nama</td>
                <td style="padding:0.75rem 0;color:#1e293b;">{{ $nama }}</td>
            </tr>
            <tr>
                <td style="padding:0.75rem 0;font-weight:700;color:#475569;vertical-align:top;">Pesan</td>
                <td style="padding:0.75rem 0;color:#1e293b;white-space:pre-wrap;">{{ $pesan }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
