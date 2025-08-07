<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Permintaan dan Pemberian Cuti PNS</title>
    <style>
        @page {
            size: 8in 13in;
            margin: 0.2cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1px;
        }

        td {
            vertical-align: top;
            padding: 5px;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .border {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <table border="3">
        <tbody>
            <tr>
                <td>
                    <p style="margin-left: 400px;">ANAK LAMPIRAN 1.b <br>
                        PERATURAN BADAN KEPEGAWAIAN NEGARA <br>
                        REPUBLIK INDONESIA <br>
                        NOMOR 24 TAHUN 2017 <br>
                        TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL
                        <br><br>
                        Demak, {{ \Carbon\Carbon::parse($cuti->tanggal_pengajuan)->format('d F Y') ?? '-' }} <br>
                        <br>
                        Kepada Yth.<br>
                        {{ $cuti->pejabat->jabatan }}<br>
                        di Demak
                    </p>

                    <h3 class="center" style="font-size: 16px;">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h3>

                    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
                        <tr>
                            <th colspan="4" style="text-align: left; font-size: 14px;">
                                <strong>I.&nbsp;&nbsp;&nbsp;&nbsp;<u>DATA PEGAWAI</u></strong>
                            </th>
                        </tr>
                        <tr>
                            <td style="width: 25%;">Nama</td>
                            <td style="width: 30%;">{{ $cuti->pegawai->nama }}</td>
                            <td style="width: 20%;">NIP</td>
                            <td style="width: 25%;">{{ $cuti->pegawai->nip ?? "Data Kosong" }}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>{{ $cuti->pegawai->jabatan ?? "Data Kosong" }}</td>
                            <td>Masa Kerja</td>
                            <td>{{ $cuti->pegawai->masa_kerja ?? "Data Kosong" }}</td>
                        </tr>
                        <tr>
                            <td>Unit Kerja</td>
                            <td colspan="3">{{ $cuti->pegawai->unit_kerja ?? "Data Kosong" }}</td>
                        </tr>
                    </table>

                    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 10px;">
                        <tr>
                            <th colspan="4" style="text-align: left; font-size: 14px;">
                                <strong>II.&nbsp;&nbsp;&nbsp;&nbsp;JENIS CUTI YANG DIAMBIL <sup>**</sup></strong>
                            </th>
                        </tr>
                        <tr>
                            <td style="width: 40%;">1. Cuti Tahunan</td>
                            <td style="width: 10%; text-align: center; font-weight: bold; font-size: 12px;">
                                {{ $cuti->typeCuti->nama === 'Cuti Tahunan' ? '✔' : '-' }}
                            </td>
                            <td style="width: 40%;">2. Cuti Besar</td>
                            <td style="width: 10%; text-align: center; font-weight: bold; font-size: 12px;">
                                {{ $cuti->typeCuti->nama === 'Cuti Besar' ? '✔' : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td>3. Cuti Sakit</td>
                            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                                {{ $cuti->typeCuti->nama === 'Cuti Sakit' ? '✔' : '-' }}
                            </td>
                            <td>4. Cuti Melahirkan</td>
                            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                                {{ $cuti->typeCuti->nama === 'Cuti Melahirkan' ? '✔' : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td>5. Cuti Karena Alasan Penting</td>
                            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                                {{ $cuti->typeCuti->nama === 'Cuti Karena Alasan Penting' ? '✔' : '-' }}
                            </td>
                            <td>6. Cuti di Luar Tanggungan Negara</td>
                            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                                {{ $cuti->typeCuti->nama === 'Cuti di Luar Tanggungan Negara' ? '✔' : '-' }}
                            </td>
                        </tr>
                    </table>

                    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 10px;">
                        <tr>
                            <th style="text-align: left; font-size: 14px;" colspan=" 4">
                                <strong>III.&nbsp;&nbsp;&nbsp;&nbsp;ALASAN CUTI</strong>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="4">{{ $cuti->alasan }}</td>
                        </tr>
                    </table>

                    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 10px;">
                        <tr>
                            <th colspan="6" style="text-align: left; font-size: 14px;"">
                <strong>IV.&nbsp;&nbsp;&nbsp;&nbsp;LAMANYA CUTI</strong>
            </th>
        </tr>
        <tr>
            <td style=" width: 15%;">Selama
                </td>
                <td style="width: 20%;">{{ $cuti->lama_cuti }} (hari/bulan/tahun)*</td>
                <td style="width: 20%;">Mulai Tanggal</td>
                <td style="width: 15%;">
                    {{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }}
                </td>
                <td style="width: 5%;">s/d</td>
                <td style="width: 25%;">
                    {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}
                </td>
            </tr>
    </table>

    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-top: 10px;">
        <tr>
            <th colspan="7" style="text-align: left; font-size: 14px;">
                <strong>V.&nbsp;&nbsp;CATATAN CUTI ***</strong>
            </th>
        </tr>

        {{-- Baris Judul --}}
        <tr>
            <td colspan="3"><strong>1. CUTI TAHUNAN</strong></td>
            <td colspan="3" style="width: 50%;"><strong>2. CUTI BESAR</strong></td>
            {{-- Cuti Besar --}}
            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                {{ $cuti->typeCuti->nama === 'Cuti Besar' ? '✔' : '-' }}
            </td>
        </tr>

        {{-- Header Tahun/Sisa/Keterangan --}}
        <tr>
            <td style="width: 10%; text-align: center;">Tahun</td>
            <td style="width: 10%; text-align: center;">Sisa</td>
            <td style="width: 15%; text-align: center;">Keterangan</td>
            <td colspan="3"><strong>3. CUTI SAKIT</strong>
            </td>
            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                {{ $cuti->typeCuti->nama === 'Cuti Sakit' ? '✔' : '-' }}
            </td>
        </tr>

        {{-- N-2 --}}
        <tr>
            <td>N-2</td>
            <td style="text-align: center;">{{ $cuti->sisa_n2 ?? '-' }}</td>
            <td></td>
            <td colspan="3"><strong>4. CUTI MELAHIRKAN</strong>
            </td>
            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                {{ $cuti->typeCuti->nama === 'Cuti Melahirkan' ? '✔' : '-' }}
            </td>
        </tr>

        {{-- N-1 --}}
        <tr>
            <td>N-1</td>
            <td style="text-align: center;">{{ $cuti->sisa_n1 ?? '-' }}</td>
            <td></td>
            <td colspan="3"><strong>5. CUTI KARENA ALASAN PENTING</strong>
            </td>
            <td style="text-align: center; font-weight: bold; font-size: 12px;">
                {{ $cuti->typeCuti->nama === 'Cuti Karena Alasan Penting' ? '✔' : '-' }}
            </td>
        </tr>

        {{-- N --}}
        <tr>
            <td>N</td>
            <td style="text-align: center;">{{ $cuti->sisa_n ?? '' }}</td>
            <td></td>
            <td><strong>6. CUTI DI LUAR TANGGUNGAN NEGARA</strong>
            </td>
            <td colspan="6" style="text-align: center; font-weight: bold; font-size: 12px;">
                {{ $cuti->typeCuti->nama === 'Cuti di Luar Tanggungan Negara' ? '✔' : '-' }}
            </td>
        </tr>
    </table>


    <!-- Bagian VI. ALAMAT SELAMA MENJALANKAN CUTI -->
    <table style="width: 100%; border: 1px solid black; border-collapse: collapse; margin-top: 10px;">
        <tr>
            <th colspan="5" style="border: 1px solid black; padding: 5px; text-align: left; font-size: 14px;">
                VI. &nbsp; <strong>ALAMAT SELAMA MENJALANKAN CUTI</strong>
            </th>
        </tr>
        <tr>
            <td style="border: 1px solid black;"></td>
            <td style="border: 1px solid black; width: 100px; height: 10px;" class="center">TELP</td>
            <td rowspan="2" style="border: 1px solid black; vertical-align: bottom; text-align: center; padding-right: 1px; width: 15rem;" class="text-wrap">
                Hormat Saya,<br><br><br><br>
                (<u>{{ $cuti->pegawai->nama ?? '...................' }})</u><br>
                NIP {{ $cuti->pegawai->nip ?? '...................' }}
        </tr>
        <tr>
            <td>Alamat / Telp<br><br></td>
        </tr>
    </table>

    <!-- Bagian VII. PERTIMBANGAN ATASAN LANGSUNG -->
    <table style="width: 100%; border: 1px solid black; border-collapse: collapse; margin-top: 10px;">
        <tr>
            <th colspan="5" style="border: 1px solid black; padding: 5px; text-align: left; font-size: 14px;">
                VII. &nbsp; <strong>PERTIMBANGAN ATASAN LANGSUNG **</strong>
            </th>
        </tr>
        <tr class="center">
            <td style="border: 1px solid black; text-align: center; height: 10px;">DISETUJUI</td>
            <td style="border: 1px solid black; text-align: center;">PERUBAHAN ****</td>
            <td style="border: 1px solid black; text-align: center;">DITANGGUHKAN ****</td>
            <td style="border: 1px solid black; text-align: center;">TIDAK DISETUJUI ****</td>
            <td rowspan="2" style="border: 1px solid black; vertical-align: bottom; text-align: center; padding-right: 1px; width: 15rem;" class="text-wrap">
                {{ $cuti->atasan->jabatan ?? '...................' }}<br><br><br><br>
                (<u> {{ $cuti->atasan->nama ?? '...................' }} )</u><br>
                NIP {{ $cuti->atasan->nip ?? '...................' }}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border: 1px solid black; height: 40px;"></td>
        </tr>
    </table>

    <!-- Bagian VIII. KEPUTUSAN PEJABAT YANG BERWENANG -->
    <table style="width: 100%; border: 1px solid black; border-collapse: collapse; margin-top: 10px;">
        <tr>
            <th colspan="5" style="border: 1px solid black; padding: 5px; text-align: left; font-size: 14px;">
                VIII. &nbsp; <strong>KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</strong>
            </th>
        </tr>
        <tr class="center">
            <td style="border: 1px solid black; text-align: center; height: 10px;">DISETUJUI</td>
            <td style="border: 1px solid black; text-align: center;">PERUBAHAN ****</td>
            <td style="border: 1px solid black; text-align: center;">DITANGGUHKAN ****</td>
            <td style="border: 1px solid black; text-align: center;">TIDAK DISETUJUI ****</td>
            <td rowspan="2" style="border: 1px solid black; vertical-align: bottom; text-align: center; padding-right: 1px; width: 15rem;" class="text-wrap">
                {{ $cuti->pejabat->jabatan ?? '...................' }}<br><br><br><br>
                (<u> {{ $cuti->pejabat->nama ?? '...................' }} )</u><br>
                NIP {{ $cuti->pejabat->nip ?? '...................' }}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border: 1px solid black; height: 40px;"></td>
        </tr>
    </table>
    <p style="font-size: 10px; margin-top: 20px;">
        Keterangan: <br>
        * Silakan pilih salah satu atau lebih jenis cuti yang sesuai. <br>
        ** Silakan isi dengan jenis cuti yang diambil. <br>
        *** Silakan isi dengan catatan cuti yang relevan. <br>
        **** Silakan isi dengan keterangan tambahan jika diperlukan.</p>
    </td>
    </tr>
    </tbody>
    </table>

</body>

</html>