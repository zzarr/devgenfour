 <!-- Javascript  -->
 <!-- vendor js -->
  
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

 
 <script src="{{ asset('metrica/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('metrica/dist/assets/libs/simplebar/simplebar.min.js') }}"></script>
 <script src="{{ asset('metrica/dist/assets/libs/feather-icons/feather.min.js') }}"></script>

 <script src="{{ asset('metrica/dist/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
 <script src="{{ asset('metrica/dist/assets/js/pages/analytics-index.init.js') }}"></script>
 <script src="{{ asset('metrica/dist/assets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
 <script src="{{ asset('metrica/dist/assets/js/pages/datatable.init.js') }}"></script>
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
 <script src="{{ asset('summer-note/') }}"></script>
 <!-- App js -->
 <script src="{{ asset('metrica/dist/assets/js/app.js') }}"></script>

 <script>
     $('.dropify').dropify();

     $(document).ready(function() {
         $('#summernote').summernote();
     });
 </script>
