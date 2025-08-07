<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Permintaan dan Pemberian Cuti PPPK</title>
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
            margin-bottom: 0px;
            margin-top: 0px;
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
    <table style="width:21.0cm;margin-left:1pt;border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="border: 1.5pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-left: 370px; font-size:12px;'>LAMPIRAN II <br>
                        PERATURAN BADAN KEPEGAWIAN NEGARA <br>
                        REPUBLIK INDONESIA <br>
                        NOMOR 7 TAHUN 2022 <br>
                        TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI PEMERINTAH DENGAN PERJANJIAN KERJA
                    </p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>Formulir Perminaan dan Pemberian Cuti Pegawai Pemerintah Dengan Perjanjian Kerja</span></p><br>
                     <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:285pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:36.0pt;'><span style='font-family:"Times New Roman",serif;'>Demak, {{ \Carbon\Carbon::parse($cuti->tanggal_pengajuan)->format('d F Y') ?? '-' }} </span></p>
                        <br>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:320pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:  "Times New Roman",serif;'>Kepada</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:320pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:  "Times New Roman",serif;'>Yth. {{ $cuti->pejabat->jabatan }}</span></p>
                   <p style='margin-top:0cm;margin-right:-18.0pt;margin-bottom:  0cm;margin-left:12.0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:  "Times New Roman",serif;'>di.</span></p>
                   <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:354.4pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:  "Times New Roman",serif;'>Demak</span></p>
                    <br>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;font-family:  "Times New Roman",serif;'>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:13px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                    <table style="width:583.2pt;border-collapse:collapse;border:none;">
                        <tbody>
                            <tr>
                                <th colspan="4" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>I.&nbsp;&nbsp;&nbsp;&nbsp;<u>DATA PEGAWAI</u></strong>
                                </th>
                            </tr>
                            <tr>
                                <td style="width:90.0pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Nama</span></p>
                                </td>
                                <td style="width:265.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->pegawai->nama }}</span></p>
                                </td>
                                <td style="width:72.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>NIP</span></p>
                                </td>
                                <td style="width:155.7pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->pegawai->nip }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:90.0pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Jabatan</span></p>
                                </td>
                                <td style="width:265.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->pegawai->jabatan }}</span></p>
                                </td>
                                <td style="width:72.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Masa Kerja</span></p>
                                </td>
                                <td style="width:155.7pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->pegawai->masa_kerja }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:90.0pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Unit Kerja</span></p>
                                </td>
                                <td colspan="3" style="width:493.2pt;border-top:none;border-left:    none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->pegawai->unit_kerja }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                    <table style="border-collapse: collapse;border: none;width: 778px;">
                        <tbody>
                            <tr>
                                <th colspan="4" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>II.&nbsp;&nbsp;&nbsp;&nbsp;<u>JENIS CUTI YANG DIAMBIL</u></strong>
                                </th>
                            </tr>
                            <tr>
                                <td style="width: 452.95pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>1. Cuti Tahunan
                                    </div>
                                </td>
                                <td style="width: 130.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:    0cm;margin-left:50%;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->typeCuti->nama === 'Cuti Tahunan' ? '✔' : '-' }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 452.95pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>2. Cuti Sakit
                                    </div>
                                </td>
                                <td style="width: 130.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:    0cm;margin-left:50%;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->typeCuti->nama === 'Cuti Sakit' ? '✔' : '-' }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 452.95pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>3. Cuti Karena Alasan Penting
                                    </div>
                                </td>
                                <td style="width: 130.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:    0cm;margin-left:50%;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->typeCuti->nama === 'Cuti Karena Alasan Penting' ? '✔' : '-' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                    <table style="width:583.2pt;border-collapse:collapse;border:none;">
                        <tbody>
                            <tr>
                                <th colspan="4" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>III.&nbsp;&nbsp;&nbsp;&nbsp;<u>ALASAN CUTI</u></strong>
                                </th>
                            </tr>
                            <tr>
                                <td style="width: 583.2pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->alasan }}</span></p><br><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                    <table style="width:583.2pt;border-collapse:collapse;border:none;">
                        <tbody>
                            <tr>
                                <th colspan="6" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>IV.&nbsp;&nbsp;&nbsp;&nbsp;<u>LAMANYA CUTI</u></strong>
                                </th>
                            </tr>
                            <tr>
                                <td style="width:49.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:18.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Selama</span></p>
                                </td>
                                <td style="width:153.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:18.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->lama_cuti }} (hari/bulan/tahun)*</span></p>
                                </td>
                                <td style="width:85.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:18.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>Mulai Tanggal</span></p>
                                </td>
                                <td style="width:126.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:18.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }}</span></p>
                                </td>
                                <td style="width:36.0pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:18.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>s/d</span></p>
                                </td>
                                <td style="width:133.2pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:18.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                    <table style="border-collapse: collapse;border: none;width: 778px;">
                        <tbody>
                            <tr>
                                <th colspan="4" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>V.&nbsp;&nbsp;&nbsp;&nbsp;<u>CATATAN CUTI</span></strong><span style='font-family:"Times New Roman",serif;'>&nbsp;***</span></u></strong>
                                </th>
                            </tr>

                            <tr>
                                <td style="width: 452.95pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>1. Cuti Tahunan
                                    </div>
                                </td>
                                <td style="width: 130.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:    0cm;margin-left:50%;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->typeCuti->nama === 'Cuti Tahunan' ? '✔' : '-' }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 452.95pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>2. Cuti Sakit
                                    </div>
                                </td>
                                <td style="width: 130.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:    0cm;margin-left:50%;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->typeCuti->nama === 'Cuti Sakit' ? '✔' : '-' }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 452.95pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>3. Cuti Karena Alasan Penting
                                    </div>
                                </td>
                                <td style="width: 130.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:    0cm;margin-left:50%;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->typeCuti->nama === 'Cuti Karena Alasan Penting' ? '✔' : '-' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                    <table style="width:583.2pt;border-collapse:collapse;border:none;">
                        <tbody>
                            <tr>
                                <th colspan="4" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>VI.&nbsp;&nbsp;&nbsp;&nbsp;<u>ALAMAT SELAMA MENJALANKAN CUTI</span></strong><span style='font-family:"Times New Roman",serif;'>&nbsp;***</span></u></strong>
                                </th>
                            </tr>
                            <tr>
                                <td style="width: 243pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width: 3cm;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>TELP</span></p>
                                </td>
                                <td style="width: 9cm;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 243pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width: 3cm;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width: 9cm;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;vertical-align: top;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:    0cm;margin-left:85pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Hormat Saya,</span></p><br><br><br>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'><u>({{ $cuti->pegawai->nama ?? '...................' }})</u></span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>NIP {{ $cuti->pegawai->nip ?? '...................' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                    <table style="width:583.2pt;border-collapse:collapse;border:none;">
                        <tbody>
                            <tr>
                                <th colspan="4" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>VII.&nbsp;&nbsp;&nbsp;&nbsp;<u>PERTIMBANGAN ATASAN LANGSUNG **</span></strong><span style='font-family:"Times New Roman",serif;'>&nbsp;***</span></u></strong>
                                </th>
                            </tr>
                            <tr>
                                <td style="width:85.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>DISETUJUI</span></p>
                                </td>
                                <td style="width:112.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>PERUBAHAN ****</span></p>
                                </td>
                                <td style="width:130.05pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>DITANGGUHKAN ****</span></p>
                                </td>
                                <td style="width:9.0cm;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>TIDAK DISETUJUI ****</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:85.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:112.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:130.05pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:17.1pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:-17.1pt;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:9.0cm;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:328.05pt;border:none;border-right:    solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:56.35pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:17.1pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:-17.1pt;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:9.0cm;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:56.35pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->atasan->jabatan ?? '...................' }}</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'><u>( {{ $cuti->atasan->nama ?? '...................' }} )</u></span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>NIP {{ $cuti->atasan->nip ?? '...................' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:11px;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
                    <table style="width:583.2pt;border-collapse:collapse;border:none;">
                        <tbody>
                            <tr>
                                <th colspan="4" style="border:solid black 1.0pt; text-align: left; font-size: 14px;">
                                    <strong>VIII.&nbsp;&nbsp;&nbsp;&nbsp;<u>KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</span></strong><span style='font-family:"Times New Roman",serif;'>&nbsp;***</span></u></strong>
                                </th>
                            </tr>
                            <tr>
                                <td style="width:85.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>DISETUJUI</span></p>
                                </td>
                                <td style="width:112.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>PERUBAHAN ****</span></p>
                                </td>
                                <td style="width:130.05pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>DITANGGUHKAN ****</span></p>
                                </td>
                                <td style="width:9.0cm;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>TIDAK DISETUJUI ****</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:85.5pt;border:solid black 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:112.5pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:130.05pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:17.1pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:-17.1pt;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:9.0cm;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width:328.05pt;border:none;border-right:    solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:17.1pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:-17.1pt;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                </td>
                                <td style="width:9.0cm;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $cuti->pejabat->jabatan ?? '...................' }}</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>(<u> {{ $cuti->pejabat->nama ?? '...................' }} )</u></span></p>
                                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>NIP {{ $cuti->pejabat->nip ?? '...................' }}</span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:12px;font-family:"Arial",sans-serif;'>&nbsp;</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:252.0pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>

</body>

</html>