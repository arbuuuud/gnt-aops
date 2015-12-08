@extends('layouts.public')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <div class="text-center" style="margin-bottom:20px;">
        <div class="page-header">
          <h2 class="page-title text-brown"><strong>
            @if($page->title == 'pdip')
            Fraksi Partai Demokrasi Indonesia Perjuangan
            @elseif ($page->title == 'golkar')
            Fraksi Partai GOLKAR
            @elseif ($page->title == 'gerindra')
            Fraksi GERINDRA
            @elseif ($page->title == 'demokrat')
            Fraksi Partai Demokrat
            @elseif ($page->title == 'pan')
            Fraksi Partai Amanat Nasional
            @elseif ($page->title == 'pkb')
            Fraksi Partai Kebangkitan Bangsa
            @elseif ($page->title == 'pks')
            Fraksi Partai Keadilan Sejahtera
            @elseif ($page->title == 'ppp')
            Fraksi Partai Persatuan Pembangunan
            @elseif ($page->title == 'nasdem')
            Fraksi Partai Nasdem
            @elseif ($page->title == 'hanura')
            Fraksi Partai HANURA
            @elseif ($page->title == 'dpd')
            Kelompok DPD Di MPR RI
            @elseif ($page->slug == 'pimpinan-mpr')
            Pimpinan MPR
            @elseif ($page->slug == 'pimpinan-sosialisasi')
            Pimpinan Badan Sosialisasi
            @elseif ($page->slug == 'pimpinan-anggaran')
            Pimpinan Badan Anggaran
            @elseif ($page->slug == 'pimpinan-pengkajian')
            Pimpinan Badan Pengkajian
            @endif
          </strong></h2>
        </div>
        <?php if ( $page->title != 'dpd' ): ?>
          {{ HTML::image( 'img/fraksi/'.$page->title.'.jpg', $page->title, array( 'width' => '200px', 'height' => '200px', 'class' => 'img-thumbnail') ) }}
        <?php endif; ?>
      </div>

      <h2 class="text-center">Pimpinan Partai</h2>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>No.</th>
            <th>No. Anggota</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Tmpt / Tgl Lahir</th>
            <th>Daerah Pemilihan</th>
            <th>Fraksi</th>
          </tr>
          <tr>
            <td>1</td>
            <td>A-124</td>
            <td><img src="http://placehold.it/125x150"></td>
            <td>Ir. TAGORE ABU BAKAR</td>
            <td>Jakarta, 22 Desember 1988</td>
            <td>Aceh-II</td>
          </tr>
          <tr>
            <td>2</td>
            <td>A-125</td>
            <td><img src="http://placehold.it/125x150"></td>
            <td>H. IRMADI LUBIS</td>
            <td>Jakarta, 22 Desember 1988</td>
            <td>Sumut-I</td>
          </tr>
          <tr>
            <td>3</td>
            <td>A-126</td>
            <td><img src="http://placehold.it/125x150"></td>
            <td>Dr. SOFYAN TAN</td>
            <td>Jakarta, 22 Desember 1988</td>
            <td>Sumut-I</td>
          </tr>
          <tr>
            <td>4</td>
            <td>A-127</td>
            <td><img src="http://placehold.it/125x150"></td>
            <td>TRIMEDYA PANJAITAN , S.H., M.H.</td>
            <td>Jakarta, 22 Desember 1988</td>
            <td>Sumut-II</td>
          </tr>
          <tr>
            <td>5</td>
            <td>A-128</td>
            <td><img src="http://placehold.it/125x150"></td>
            <td>Dr. R. JUNIMART GIRSANG , S.H., M.B.A., M.H.</td>
            <td>Jakarta, 22 Desember 1988</td>
            <td>Sumut-III</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>


@stop