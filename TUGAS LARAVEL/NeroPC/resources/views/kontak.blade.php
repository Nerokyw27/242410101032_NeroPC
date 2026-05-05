@extends('layouts.app')

@section('title', 'Hubungi Kami - NeroPC')

@section('content')
<section class="kontak-section" style="padding: 40px 20px; text-align: center; background-color: #0a0e17; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
  <h2>Hubungi Kami</h2>
  <p style="max-width: 600px; margin: 20px auto; color: #999;">
    Punya pertanyaan mengenai produk atau butuh bantuan dalam merakit PC Anda? Jangan ragu untuk menghubungi tim support kami melalui kontak di bawah ini.
  </p>
  <div style="display: flex; justify-content: center; gap: 30px; margin-top: 30px; flex-wrap: wrap;">
    <div style="text-align: center;">
      <div style="font-size: 2rem; margin-bottom: 10px;">📧</div>
      <h3 style="font-size: 1.2rem; color: #999;">Email</h3>
      <p style="color: #999;">admin@neropc.id</p>
    </div>
    <div style="text-align: center;">
      <div style="font-size: 2rem; margin-bottom: 10px;">📞</div>
      <h3 style="font-size: 1.2rem; color: #999;">Telepon</h3>
      <p style="color: #999;">0812-3456-7890</p>
    </div>
    <div style="text-align: center;">
      <div style="font-size: 2rem; margin-bottom: 10px;">📍</div>
      <h3 style="font-size: 1.2rem; color: #999;">Alamat</h3>
      <p style="color: #999;">Jl. Teknologi Raya No. 88<br>Surabaya, Jawa Timur</p>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  console.log('Halaman Kontak dimuat.');
</script>
@endpush
