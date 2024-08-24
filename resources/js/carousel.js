 // Simpan ID slide yang aktif
 let currentSlide = 'slide1';
            
 function showSlide(slideId) {
   event.preventDefault();

   // Hapus kelas 'active' dari slide saat ini
   document.getElementById(currentSlide).classList.remove('active');

   // Tambahkan kelas 'active' ke slide yang baru
   document.getElementById(slideId).classList.add('active');

   // Perbarui slide saat ini
   currentSlide = slideId;
 }

 // Set slide pertama sebagai slide aktif secara default
 document.addEventListener('DOMContentLoaded', () => {
   document.getElementById(currentSlide).classList.add('active');
 });