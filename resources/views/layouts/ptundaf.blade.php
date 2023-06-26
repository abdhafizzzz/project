<!DOCTYPE html>

@extends('navigation')
@section('navigation')
<html>
    <head>
</head>




  <!-- Left side column. contains the logo and sidebar -->


    <!-- sidebar: style can be found in sidebar.less -->


      <!-- sidebar menu: : style can be found in sidebar.less -->

    <!-- /.sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sistem Pembayaran Subsidi Pembajakan Sawah Padi
        <small>Modul Petani</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Laman Utama</a></li>
      </ol>
    </section>

<!-- Main content -->
<form method="post" action="ptun_daf2act.php" id="ptun_daf2" name="ptun_daf2">
<section class="content">


    <div class="row">
        <div class="col-xs-12">
        <div class="box">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title" ><b>A. TUNTUTAN SUBSIDI PEMBAJAKAN (LUAR MUSIM)</b></h3>
            </div>
                        <table id="pemohon" class="table table-noborder table-hover">
            <tr>
            <td width="15%">1. Nama Pemohon</td>
            <td width="2%">:</td>
            <td width="83%">Abel Bin Duanis            </td></tr>
            <tr>
            <td>2. Kad Pengenalan</td>
            <td>:</td>
            <td>751027125135            <input type="hidden" name="tahun" id="tahun" class="form-control" value=2021>
            <input type="hidden" name="nokp" id="nokp" class="form-control" value=751027125135>
            <input type="hidden" name="musimini" id="musimini" class="form-control" value=1>
            <input type="hidden" name="pohonid" id="pohonid" class="form-control" value=2148>
            </td></tr>
            <tr>
            <td>3. Alamat Perhubungan</td>
            <td>:</td>
            <td>Kg.Moloson,89657 Tambunan</td></tr>
            </table>
            </div>
        </div><!--box primary-->
        <div class="box box-primary">
            <table width="96%" class="table table-noborder table-hover" id="details">
            <tr>
                <td width="17%">No. Pendaftaran</td>
                <td width="2%">:</td>
                <td width="81%">TBN: A035</td></tr>
            <tr>
                <td>Tarikh Permohonan</td>
                <td>:</td>
                <td>09/02/2021</td></tr>
            <tr>
                <td>No. Geran</td>
                <td>:</td>
                <td>NT.14304306</td></tr>
            <tr>
                <td>Luas Permohonan (Ekar)</td>
                <td>:</td>
                <td>
                <div class="input-group">
                <input type="text" name="luas" id="luas" class="form-control" value=1.83 onChange="return nilaiRM(this)">
                </div>
              </td></tr>
            <tr>
                <td>Kampung</td>
                <td>:</td>
                <td>
                    Kg. Nambayan</td></tr>
            <tr>
                <td>Siap Bajak</td>
                <td>:</td>
                <td><select class="form-select"  name="bulan" style="max-width:30%;">
                                    <option value="0">Sila Pilih...</option>
                                    <option value="1"
                  >Januari					        </option>
                                    <option value="2"
                  >Februari					        </option>
                                    <option value="3"
                  >Mac					        </option>
                                    <option value="4"
                  >April					        </option>
                                    <option value="5"
                  >Mei					        </option>
                                    <option value="6"
                  >Jun					        </option>
                                    <option value="7"
                  >Julai					        </option>
                                    <option value="8"
                  >Ogos					        </option>
                                    <option value="9"
                  >September					        </option>
                                    <option value="10"
                  >Oktober					        </option>
                                    <option value="11"
                  >November					        </option>
                                    <option value="12"
                  >Disember					        </option>
                                </select></td></tr>
            <tr>
                <td>Tuntutan (RM)</td>
                <td>:</td>
                <td><div class="input-group">

                                  <input type="text" name="tuntutan" id="tuntutan" class="form-control" value=366>
              <input type="hidden" name="subsidi" id="subsidi" class="form-control" value=200>
              <input type="hidden" name="bilnya" id="bilnya" class="form-control" value=1>
              </td></tr>
            </table>
            </div>

            <div class="box box-primary">
            <table width="96%" class="table table-noborder table-hover" id="bayaran">
            <tr>
                <td width="17%">Nama Penerima</td>
                <td width="2%">:</td>
                <td width="81%">Abel Bin Duanis</td></tr>
            <tr>
                <td>No.Kad Pengenalan</td>
                <td>:</td>
                <td>751027125135</td></tr>
            <tr>
                <td>No Akaun Bank</td>
                <td>:</td>
                <td><div class="input-group">
              <input type="text" name="akaun" id="akaun" class="form-control" value=></td></tr>
            <tr>
                <td>Nama Bank</td>
                <td>:</td>
                <td><select class="form-select"  name="bank" style="max-width:30%;">
                                    <option value="0">Sila Pilih...</option>
                                    <option value="ABN00"
                  >ABNAMRO BANK BHD.					        </option>
                                    <option value="ABR00"
                  >ABRAR DISCOUNTS BHD.					        </option>
                                    <option value="ABP00"
                  >ABRAR DISCOUNTS SPI					        </option>
                                    <option value="PAB00"
                  >AFFIN BANK BERHAD					        </option>
                                    <option value="AFV00"
                  >AFFIN INVESTMENT BANK BERHAD					        </option>
                                    <option value="AFP00"
                  >AFFIN INVESTMENT BANK BHD. SPI					        </option>
                                    <option value="AFI00"
                  >AFFIN ISLAMIC BANK BERHAD					        </option>
                                    <option value="AFM00"
                  >AFFIN MERCHANT BANK BERHAD					        </option>
                                    <option value="BPT00"
                  >AGRO BANK					        </option>
                                    <option value="ALR00"
                  >AL-RAJHI BANK(M) BHD.					        </option>
                                    <option value="ABB00"
                  >ALLIANCE BANK MALAYSIA BHD					        </option>
                                    <option value="ABV00"
                  >ALLIANCE INVESTMENT BANK BHD					        </option>
                                    <option value="ABS00"
                  >ALLIANCE INVESTMENT BANK BHD SPI					        </option>
                                    <option value="ABI00"
                  >ALLIANCE ISLAMIC BANK BHD					        </option>
                                    <option value="AMB00"
                  >AMBANK BERHAD					        </option>
                                    <option value="AMV00"
                  >AMINVESTMENT BANK BHD.					        </option>
                                    <option value="AMP00"
                  >AMINVESTMENT BANK BHD. SPI					        </option>
                                    <option value="AMI00"
                  >AMISLAMIC BANK BHD.					        </option>
                                    <option value="ASE00"
                  >ASEAMBANKERS MALAYSIA BHD					        </option>
                                    <option value="ASP00"
                  >ASEAMBANKERS MALAYSIA BHD. SPI					        </option>
                                    <option value="AFB00"
                  >ASIAN FINANCE BANK BERHAD					        </option>
                                    <option value="ZZA03"
                  >AUSTRALIA					        </option>
                                    <option value="BBB00"
                  >BANGKOK BANK BHD					        </option>
                                    <option value="BNI01"
                  >BANK BNI UNIVERSITY SUMATERA UTARA					        </option>
                                    <option value="BNI00"
                  >BANK BNI46 UNIVERSITAS BRAWIJAYA					        </option>
                                    <option value="BIM00"
                  >BANK ISLAM MALAYSIA BERHAD					        </option>
                                    <option value="BKR00"
                  >BANK KERJASAMA RAKYAT MALAYSIA BERHAD					        </option>
                                    <option value="BMM00"
                  >BANK MUAMALAT M'SIA BHD.					        </option>
                                    <option value="BNM00"
                  >BANK NEGARA MALAYSIA					        </option>
                                    <option value="BOA00"
                  >BANK OF AMERICA (MAL) BHD					        </option>
                                    <option value="BOC00"
                  >BANK OF CHINA (MAL) BHD					        </option>
                                    <option value="TMB00"
                  >BANK OF TOKYO-MITSUBISHI (MALAYSIA) BHD					        </option>
                                    <option value="BPI00"
                  >BANK PEMBANGUNAN & INFRASTRUKTUR MALAYSIA BHD					        </option>
                                    <option value="BSN00"
                  >BANK SIMPANAN NASIONAL					        </option>
                                    <option value="BSI00"
                  >BANK SIMPANAN NASIONAL SPI					        </option>
                                    <option value="BYS00"
                  >BARCLAYS					        </option>
                                    <option value="BHM00"
                  >BORNEO HOUSING MORTGAGE FINANCE BHD					        </option>
                                    <option value="ZZA11"
                  >BRUNEI					        </option>
                                    <option value="CAG00"
                  >CAGAMAS BERHAD					        </option>
                                    <option value="CAP00"
                  >CAGAMAS BERHAD SPI					        </option>
                                    <option value="ZZA06"
                  >CANADA					        </option>
                                    <option value="CMB00"
                  >CHASE MANHATTAN BANK (M) BHD					        </option>
                                    <option value="BCB01"
                  >CIMB BANK BERHAD					        </option>
                                    <option value="BCB00"
                  >CIMB BANK BERHAD					        </option>
                                    <option value="CIV00"
                  >CIMB INVESTMENT BANK BHD					        </option>
                                    <option value="CIP00"
                  >CIMB INVESTMENT BANK SPI					        </option>
                                    <option value="CMI00"
                  >CIMB ISLAMIC BANK BERHAD					        </option>
                                    <option value="CBB00"
                  >CITIBANK BERHAD					        </option>
                                    <option value="CBP00"
                  >CITIBANK SPI					        </option>
                                    <option value="CWB00"
                  >COMMONWEALTH BANK OF AUSTRALIA					        </option>
                                    <option value="CCM00"
                  >CREDIT CORPORATION (MALAYSIA) BHD					        </option>
                                    <option value="DNB00"
                  >DANMARKS NATIONAL BANK					        </option>
                                    <option value="ZZA15"
                  >DENMARK					        </option>
                                    <option value="DBB00"
                  >DEUTSCHE BANK (M) BHD					        </option>
                                    <option value="ECM00"
                  >ECM LIBRA INVESTMENT BANK BHD.					        </option>
                                    <option value="EON00"
                  >EON BANK BERHAD					        </option>
                                    <option value="EOI00"
                  >EONCAP ISLAMIC BANK BERHAD					        </option>
                                    <option value="EIB00"
                  >EXPORT-IMPORT BANK OF MALAYSIA BHD					        </option>
                                    <option value="ZZA17"
                  >FRANCE					        </option>
                                    <option value="ZZA16"
                  >GERMANY					        </option>
                                    <option value="HLB00"
                  >HONG LEONG BANK BERHAD					        </option>
                                    <option value="HLI00"
                  >HONG LEONG ISLAMIC BANK BHD					        </option>
                                    <option value="HBA00"
                  >HSBC AMANAH MALAYSIA BHD.					        </option>
                                    <option value="HBC00"
                  >HSBC BANK MALAYSIA BHD.					        </option>
                                    <option value="HWA00"
                  >HWANGDBS INVESTMENT BANK BHD.					        </option>
                                    <option value="ZZA14"
                  >INDIA					        </option>
                                    <option value="ZZA09"
                  >INDONESIA					        </option>
                                    <option value="MCB00"
                  >J.P. MORGAN CHASE BANK BHD.					        </option>
                                    <option value="ZZA07"
                  >JORDAN					        </option>
                                    <option value="KAF00"
                  >KAF INVESTMENT BANK BHD. SPI					        </option>
                                    <option value="KAI00"
                  >KAF INVESTMENT BHD					        </option>
                                    <option value="KEI00"
                  >KENANGA INVESTMENT BANK BHD.					        </option>
                                    <option value="KBB00"
                  >KEWANGAN BERSATU BHD					        </option>
                                    <option value="KWS00"
                  >KUMPULAN WANG SIMPANAN PEKERJA					        </option>
                                    <option value="LLD00"
                  >LLOYDS BANK					        </option>
                                    <option value="MCF00"
                  >MALAYSIA CREDIT FINANCE BHD					        </option>
                                    <option value="MID00"
                  >MALAYSIAN INDUSTRIAL DEVELOPMENT FINANCE BHD					        </option>
                                    <option value="MIM00"
                  >MALAYSIAN INTERNATIONAL MERCHANT BANKERS BHD					        </option>
                                    <option value="MBB00"
                  >MAYBANK					        </option>
                                    <option value="MBI00"
                  >MAYBANK ISLAMIC BHD.					        </option>
                                    <option value="ZZA08"
                  >MESIR					        </option>
                                    <option value="MAV00"
                  >MIDF AMANAH INVESTMENT BANK BHD.					        </option>
                                    <option value="MAP00"
                  >MIDF AMANAH INVESTMENT BANK BHD. SPI					        </option>
                                    <option value="MIB00"
                  >MIMB INVESTMENT BANK BHD.					        </option>
                                    <option value="NWB00"
                  >NATWEST BANK UNITED KINGDOM					        </option>
                                    <option value="ZZA04"
                  >NEW ZEALAND					        </option>
                                    <option value="OCB00"
                  >OCBC BANK (MALAYSIA) BHD					        </option>
                                    <option value="OCP00"
                  >OCBC BANK(MALAYSIA) BHD. SPI					        </option>
                                    <option value="OSK00"
                  >OSK INVESTMENT BANH BHD					        </option>
                                    <option value="OSP00"
                  >OSK INVESTMENT BANH BHD SPI					        </option>
                                    <option value="ZZA12"
                  >PHILIPPINES					        </option>
                                    <option value="PBB00"
                  >PUBLIC BANK BHD.					        </option>
                                    <option value="PBV00"
                  >PUBLIC INVESTMENT BANK BHD					        </option>
                                    <option value="PBI00"
                  >PUBLIC ISLAMIC BANK BHD					        </option>
                                    <option value="RHB00"
                  >RHB BANK BHD.					        </option>
                                    <option value="RHV00"
                  >RHB INVESTMENT BANK BHD.					        </option>
                                    <option value="RHI00"
                  >RHB ISLAMIC BANK BHD					        </option>
                                    <option value="SDB00"
                  >SABAH DEVELOPMENT BANK					        </option>
                                    <option value="ZZA10"
                  >SINGAPORE					        </option>
                                    <option value="SIB00"
                  >SOUTHERN INVESTMENT BANK BHD					        </option>
                                    <option value="SCB00"
                  >STANDARD CHARTERED BANK MALAYSIA BERHAD					        </option>
                                    <option value="SCS00"
                  >STANDARD CHARTERED SAADIQ BHD.					        </option>
                                    <option value="SUM00"
                  >SUMITIMT MITSUI BANK, TOKYO, JAPAN					        </option>
                                    <option value="ZZA05"
                  >SWITZERLAND					        </option>
                                    <option value="TFB00"
                  >THAI FARMER BANK					        </option>
                                    <option value="ZZA13"
                  >THAILAND					        </option>
                                    <option value="NSB00"
                  >THE BANK OF NOVA SCOTIA BHD					        </option>
                                    <option value="RBS00"
                  >THE ROYAL BANK OF SCOTLAND BHD.					        </option>
                                    <option value="ZZA01"
                  >U.S.A.					        </option>
                                    <option value="ZZA02"
                  >UNITED KINGDOM					        </option>
                                    <option value="UOB00"
                  >UNITED OVERSEAS BANK (MALAYSIA) BERHAD					        </option>
                                    <option value="UTM00"
                  >UTAMA MERCHANT BANK BHD					        </option>
                                </select></td></tr>
            <tr>
                <td>Cawangan Bank</td>
                <td>:</td>
                <td><select class="form-select"  name="daerahbank" style="max-width:30%;">
                                    <option value="0">Sila Pilih...</option>
                                    <option value="32"
                  >Banggi					        </option>
                                    <option value="17"
                  >Beaufort					        </option>
                                    <option value="8"
                  >Beluran					        </option>
                                    <option value="38"
                  >Kemabong					        </option>
                                    <option value="13"
                  >Keningau					        </option>
                                    <option value="9"
                  >Kinabatangan					        </option>
                                    <option value="3"
                  >Kota Belud					        </option>
                                    <option value="1"
                  >Kota Kinabalu					        </option>
                                    <option value="22"
                  >Kota Marudu					        </option>
                                    <option value="18"
                  >Kuala Penyu					        </option>
                                    <option value="5"
                  >Kudat					        </option>
                                    <option value="23"
                  >Kunak					        </option>
                                    <option value="11"
                  >Lahad Datu					        </option>
                                    <option value="36"
                  >Matunggong					        </option>
                                    <option value="35"
                  >Membakut					        </option>
                                    <option value="34"
                  >Menumbok					        </option>
                                    <option value="15"
                  >Nabawan					        </option>
                                    <option value="40"
                  >Paitan					        </option>
                                    <option value="2"
                  >Papar					        </option>
                                    <option value="21"
                  >Penampang					        </option>
                                    <option value="26"
                  >Pitas					        </option>
                                    <option value="39"
                  >Putatan					        </option>
                                    <option value="6"
                  >Ranau					        </option>
                                    <option value="7"
                  >Sandakan					        </option>
                                    <option value="12"
                  >Semporna					        </option>
                                    <option value="19"
                  >Sipitang					        </option>
                                    <option value="37"
                  >Sook					        </option>
                                    <option value="14"
                  >Tambunan					        </option>
                                    <option value="33"
                  >Tamparuli					        </option>
                                    <option value="10"
                  >Tawau					        </option>
                                    <option value="30"
                  >Telupid					        </option>
                                    <option value="16"
                  >Tenom					        </option>
                                    <option value="31"
                  >Tongod					        </option>
                                    <option value="4"
                  >Tuaran					        </option>
                                </select></td></tr>
            </table>
            </div>
              <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="submit1" value="daftar">Daftar Tuntutan & Seterusnya</button>
                  <button onclick="window.close()" type="button" class="btn btn-primary" name="tutup" id="tutup" value="Tutup" >Tutup</button>
                                    </button>
              </div>
        </div><!--box primary-->
        </div><!--box-->
        </div><!--col-xs-12-->
        </div><!--row-->

</section>
</form>
<!-- /.content -->

</div>

</body>
</html>
@endsection
