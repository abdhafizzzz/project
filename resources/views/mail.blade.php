@component('mail::message')
# Set Semula Kata Laluan

Kami menerima permintaan anda untuk menetapkan semula kata laluan. Sila klik pautan di bawah untuk melanjutkan:

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Set Semula Kata Laluan
@endcomponent

Jika anda tidak meminta penetapan semula kata laluan, sila abaikan e-mel ini.

Sekian,
{{ config('eBajak') }}
@endcomponent
