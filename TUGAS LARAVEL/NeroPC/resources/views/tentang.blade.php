@extends('layouts.app')

@section('title', 'Tentang Kami - NeroPC')

@section('content')
<section class="tentang-section" style="padding: 40px 20px; text-align: center; background-color: #0a0e17; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
  <h2>Tentang NeroPC</h2>
  <p style="max-width: 600px; margin: 20px auto; line-height: 1.6; color: #999;">
    NeroPC adalah sistem informasi penjualan PC rakitan terkemuka yang dirancang untuk memberikan kemudahan bagi pelanggan dalam memilih dan merakit PC impian mereka. Kami menyediakan komponen terbaik dengan harga bersaing, serta layanan perakitan yang profesional.
  </p>
  <div style="display: flex; justify-content: center; gap: 20px; margin-top: 30px;">
    <div style="padding: 20px; background-color: #f8f9fa; border-radius: 8px; width: 200px;">
      <h3 style="font-size: 1.5rem; color: #2563eb; margin-bottom: 10px;">Visi</h3>
      <p style="font-size: 0.9rem; color: #666;">Menjadi penyedia layanan perakitan PC nomor satu di Indonesia.</p>
    </div>
    <div style="padding: 20px; background-color: #f8f9fa; border-radius: 8px; width: 200px;">
      <h3 style="font-size: 1.5rem; color: #2563eb; margin-bottom: 10px;">Misi</h3>
      <p style="font-size: 0.9rem; color: #666;">Memberikan kualitas, kecepatan, dan kepuasan maksimal kepada setiap pelanggan.</p>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  console.log('Halaman Tentang Kami dimuat.');
</script>
@endpush
