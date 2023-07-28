<html>
    @php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



$tanah = DB::table('tanah')->where('pohonid', Auth::user()->id)->paginate(10);

$item = DB::table('daerah')->first();

@endphp

<head>
    <title>JABATAN PERTANIAN SABAH, MALAYSIA (BORANG PERMOHONAN SUBSIDI BAJAK) </title>
    <style>
        @page {
            size: A4
        }
    </style>
	    {{-- <script>
			function convertToUpperCase(elementId) {
				var element = document.getElementById(elementId);
				element.value = element.value.toUpperCase();
			}
		</script> --}}
</head>

<style>
    /* Custom styles for disabled checkboxes */
    input[type="checkbox"]:disabled {
        opacity: 1; /* Set the opacity to 1 to make the checkbox fully visible */
        filter: none; /* Remove the grayscale filter */
        color: black; /* Set the color to black */
    }
</style>

<body onLoad="printit()" bgcolor="#FFFFFF" text="#000000">
    <form ACTION="pet_cetak.php" NAME="pet_cetak" ID="pet_cetak" METHOD="post" LANGUAGE="javascript" target="_new">
        <p align=right>
            <font size=2>Borang PP 13.1 <BR>Pindaan 3/2016</font>
        <p align=right>
            <font size=2>No.Kad Petani {{ DB::table('daftar')->where('user_id', Auth::id())->value('nokad') }}</font>
            <center><img src="img/doalogo.gif" WIDTH="57" HEIGHT="56"><br>
                <font size=2>JABATAN PERTANIAN SABAH<br></font>

                <font size="3"><b>BORANG PERMOHONAN SUBSIDI PEMBAJAKAN SAWAH PADI</b><br></FONT>
                <font size=2>(Diisi Dalam 2 Salinan )</font><br>
                <font size="3">Tahun: 2023<br>
                    <font style="text-align:left;"><b>BUTIR-BUTIR PEMOHON (Diisi oleh pemohon)</b></font><br>
                    <font size="2" style="text-align:center;">
                        <i>Pendaftaran Baru
                            <input type="checkbox" id="chkbaru" name="chkbaru" {{ DB::table('daftar')->where('user_id', Auth::id())->value('rd_daftar') == 1 ? 'checked' : '' }} disabled>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            Pendaftaran Lama&nbsp;
                            <input type="checkbox" id="chklama" name="chklama" {{ DB::table('daftar')->where('user_id', Auth::id())->value('rd_daftar') == 2 ? 'checked' : '' }} disabled>
                            &nbsp;
                        </i>
                    </font>
            </center>

            <table align="center" style="FONT-FAMILY: Arial Narrow; FONT-SIZE:14px" border="0" cellPadding="2"
                cellSpacing="1" width="90%">
                <tr>
                <tr>
                    <td>1. Nama Pemohon: {{ Auth::user()->name }}</td>
                    <td></td>
                <tr>
                    <td>2. No. Kad Pengenalan: {{ Auth::user()->kad_pengenalan }}</td>
                    <td>3. No. Telefon/Handphone: {{ DB::table('daftar')->where('user_id', Auth::id())->value('notel') }}{{ DB::table('daftar')->where('user_id', Auth::id())->value('nohp') }}</td>
                <tr>
                    <td colspan="2">
                        4. Alamat Perhubungan:{{ DB::table('daftar')->where('user_id', Auth::id())->value('alamat') }}&nbsp;{{ DB::table('daftar')->where('user_id', Auth::id())->value('poskod') }}&nbsp;
                        {{ DB::table('daerah')->where('koddaerah', $item->koddaerah)->value('namadaerah') }}
                    </td>

                </tr>
                <tr>
                    <td colspan=2>
                        5. Musim Penanaman: Luar Musim
                        <input type="checkbox" id="chkmusim" name="chkmusim" {{ DB::table('daftar')->where('user_id', Auth::id())->value('ch_musim') == 1 ? 'checked' : '' }} disabled>
                        Bulan Mac - Julai

                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Musim Utama
                        <input type="checkbox" id="chkmusim2" name="chkmusim2" {{ DB::table('daftar')->where('user_id', Auth::id())->value('ch_musim2') == 1 ? 'checked' : '' }} disabled>
                        Bulan Ogos - Feb
                        &nbsp;
                    </td>
                </tr>
            </table>

																<table align="center" style="FONT-FAMILY: Arial Narrow; FONT-SIZE:12px" border="1" cellpadding="2"
																				cellspacing="1" width="90%">
																				<tr>
																				<tr>
																								<th width="50" align="middle">Bil
																								<th width="500" align="middle">Nama Pemilik Geran
																								<th width="100" align="middle">No. Geran
																								<th width="100" align="middle">Lokasi Tanah
																								<th width="100" align="middle">Luas Dalam Geran (Ekar)
																								<th width="100" align="middle">Luas Dipohon/Musim (Ekar)
																								<th width="100" align="middle">Pemilikan Tanah
                                                                                                    {{-- @php
                                                                                                    use Illuminate\Support\Facades\DB;
                                                                                                    $userId = Auth::id();
                                                                                                    $tanah = DB::table('tanah')->where('pohonid', $userId)->paginate(5);
                                                                                                @endphp --}}
                                                                                                @foreach($tanah as $item)
                                                                                                    <tr>
                                                                                                        <td class="text-center">{{ $item->bil }}</td>
                                                                                                        <td class="text-center">{{ $item->pemilikgeran }}</td>
                                                                                                        <td class="text-center">{{ $item->nogeran }}</td>
                                                                                                        <td class="text-center">{{ $item->lokasi }}</td>
                                                                                                        <td class="text-center">{{ $item->luasekar }}</td>
                                                                                                        <td class="text-center">{{ $item->luaspohon }}</td>
                                                                                                        <td class="text-center">{{ $item->pemilikgeran }}</td>
																				</tr>
                                                                                @endforeach
                                                                                <tr>
                                                                                    <th width="6%" class="text-center"></th>
                                                                                    <th width="25%" class="text-center"></th>
                                                                                    <th width="11%" class="text-center"></th>
                                                                                    <th width="15%" class="text-center">JUMLAH</th>
                                                                                    <th width="15%" class="text-center">0</th>
                                                                                    <th width="15%" class="text-center">0</th>
                                                                                    <th width="15%" class="text-center"></th>
                                                                                </tr>
																</table>
																</td>
								</table>

								<table align="center" style=" FONT-FAMILY: Arial Narrow; FONT-SIZE:14px" border="0" cellPadding="2"
												cellSpacing="1" width="90%">
												<tr>
												<tr>
																<td colspan=4>Saya mengaku semua keterangan yang diberikan di atas adalah BENAR. Saya juga faham
																				kelulusan permohonan ini tertakluk kepada syarat-syarat Subsidi Tanaman Padi.
												<tr>
																<td>&nbsp;
																<td>&nbsp;
																<td>&nbsp;
																<td>Didaftarkan Oleh:
												<tr>
																<td colspan=4>&nbsp;
												<tr>
																<td align="left" valign="top" width="38%">
																				(...............................................)<br>Tandatangan/Cop Ibu Jari Kanan
																				Pemohon<br>Tarikh Permohonan: {{ DB::table('daftar')->where('user_id', Auth::id())->value('tarikh') }}
																<td align="middle" valign="top" width="10%"><B><BR>COP<BR>JABATAN</B>
																<td align="middle" valign="top" width="4%">
																<td align="left" valign="top" width="38%">
																				(...............................................)<br>Tandatangan Pendaftar<br><b>
																								ERWATI </b><br>b.p. Pegawai/Penguasa Pertanian Daerah<br>Tarikh : 07/06/2023
												<tr>
																<td align="left" valign="top">
																<td align="middle" valign="top">
																<td align="middle" valign="top">
																<td align="left" valign="top">

								</table>
								<HR>
								<table align="center" style=" FONT-FAMILY: Arial Narrow; FONT-SIZE:14px" border="0" cellPadding="2"
												cellSpacing="1" width="90%">
												<tr>
												<tr>
																<td>
																				<ol>
																								<li>Sila buat tuntutan pembayaran setelah sawah dibajak dan ditanam.
																								<li>Tarikh akhir tuntutan sebelum atau pada 31hb. Oktober
																												bagi penanaman Januari hingga Oktober tahun semasa.
																								<li>Tarikh akhir tuntutan sebelum atau pada 15hb. Januari
																												bagi penanaman November hingga Disember tahun semasa.
																								<li>Sekiranya tuntutan pembayaran tidak diterima
																												pada masa yang ditetapkan, permohonan akan dibatalkan.
																				</ol>
								</table>
								<p></p>
								<P CLASS="breakhere">
												<font size="2" face="Arial">
																<table align="center" border="0" cellPadding="2" cellSpacing="1" width="90%">
																				SYARAT-SYARAT SUBSIDI PEMBAJAKAN TANAMAN PADI SAWAH
																				<B>
																								<ol type="A">
																												<li>JENIS, KADAR DAN HAD BANTUAN</li>
																				</B>
																				<ol type="1">
																								<li>Bantuan adalah diberikan untuk maksud pembajakan sawah padi.</li>
																								<li>Setiap pemohon yang diluluskan layak mendapat RM 200.00/ ekar semusim penanaman.</li>
																				</ol>
																				<B>
																								<li>KELAYAKAN PEMOHON</li>
																				</B>
																				<ol>
																								<li>Pemohon adalah warganegara Malaysia yang bermastautin di Sabah.
																								</li>
																								<li>Berumur 18 tahun dan ke atas. Pemohon yang berumur di bawah 18 tahun tetapi sudah berkahwin
																												dan memiliki tanah sawah sendiri layak memohon.</li>
																								<li>Memiliki tanah bergeran atau PT/ LA dengan surat pengesahan yang dikeluarkan oleh Penolong
																												Pemungut Hasil Tanah sahaja.</li>
																								<li>Pemohon boleh menyewa tanah bergeran atau tanah (PT) yang mempunyai arahan penyukatan (SP)
																												dan telah diukur.</li>
																								<li>Pengusaha tanaman padi sawah sahaja.</li>
																				</ol>
																				<B>
																								<li>SYARAT-KELULUSAN SUBSIDI PEMBAJAKAN PADI</li>
																				</B>
																				<ol>
																								<li>Pemohon mestilah mendaftar sawah mereka mengikut jadual pada setiap tahun.</li>
																								<li>Tanah sawah mestilah dibajak sama ada dengan cara tradisi atau jentera sekurang-kurangnya 10
																												- 15 sm kedalaman.</li>
																								<li>Pembajakan berjentera mestilah:-
																												<ul style="list-style-type:none;">
																																<li>(a)Dua kali pusingan dibajak dengan "Rotovator" atau</li>
																																<li>(b)Satu pusingan dibajak dengan menggunakan "Disc Plough" dan diikuti dengan satu
																																				pusingan bajakan "Rotovator".</li>
																												</ul>
																								</li>
																								<li>Selepas membajak sawah padi, pemohon mestilah:-
																												<ul style="list-style-type:none;">
																																<li>(a)Membuat/ membaiki permatang sawah untuk mengawal air di sawah.</li>
																																<li>(b)Menghancurkan ketulan tanah sawah.</li>
																																<li>(c)Menanam padi mengikut amalan yang disyorkan oleh Jabatan Pertanian.</li>
																																<li>(d)Menanam padi menggunakan benih padi Jabatan atau varieti yang disyor atau yang
																																				diperakukan oleh Jabatan Pertanian Sabah.</li>
																												</ul>
																								</li>
																								<li>Pemohon hendaklah menjadi atau akan menjadi Ahli Kumpulan Petani (jika terdapat Kumpulan
																												Petani di tempat itu).</li>
																								<li>Mematuhi jadual penanaman padi yang dikeluarkan oleh Pejabat Pertanian Daerah.</li>
																								<li>Pemohon mestilah mengesan/ mengawal dan membasmi Siput Gondang Emas iaitu;
																												<ul style="list-style-type:none;">
																																<li>7.1 Pemohon dikehendaki menanam padi secara mengubah anakbenih di kawasan sawah yang
																																				diisytiharkan oleh Pejabat Pertanian Daerah sebagai kawasan tercemar teruk oleh
																																				Siput Gondang Emas.</li>
																																<li>7.2 Pemohon dikehendaki hadir dalam Majlis Gotong-royong, Dialog dan Latihan
																																				berkaitan dengan Siput Gondang Emas yang dianjurkan oleh Pejabat Pertanian Daerah.
																																</li>
																																<li>7.3 Pemohon hanya dibenarkan menggunakan perkhidmatan traktor yang berdaftar dengan
																																				Jabatan Pertanian Sabah dan telah diperakukan kebersihannya oleh Pejabat Pertanian
																																				Daerah.</li>
																																<li>7.4 Pemohon diminta membantu membasmikan Siput Gondang Emas termasuk tidak
																																				memelihara siput ini di kawasan sawah padi mereka.</li>
																												</ul>
																								</li>
																								<li>Pemohon hendaklah mengikut arahan Jabatan Pertanian Daerah.</li>
																				</ol>
																				<B>
																								<li>PENALTI</li>
																				</B>
																				<li style="list-style-type:none;">Pemohon yang didapati memberi keterangan palsu, permohonannya
																								secara automatik akan dibatalkan dan boleh dilaporkan kepada pihak berkuasa.</li>
																				</ol>
																</table>
												</font>
				</form>

</body>

</html>

<STYLE TYPE="text/css">
				P.breakhere {
								page-break-before: always
				}
</STYLE>

{{-- <script Language="Javascript">
    function printit(){
    if (window.print) {
    window.print() ;
    } else {
    var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
    document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
    WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box    WebBrowser1.outerHTML = "";
    }
    }
    </script> --}}
