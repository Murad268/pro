 <!-- jQuery -->
 <script src="{{GetLinkAdmin('plugins/jquery/jquery.min.js')}}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{GetLinkAdmin('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{GetLinkAdmin('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <!-- ChartJS -->
 <script src="{{GetLinkAdmin('plugins/chart.js/Chart.min.js')}}"></script>
 <!-- Sparkline -->
 <script src="{{GetLinkAdmin('plugins/sparklines/sparkline.js')}}"></script>
 <!-- JQVMap -->
 <script src="{{GetLinkAdmin('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
 <script src="{{GetLinkAdmin('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{GetLinkAdmin('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
 <!-- daterangepicker -->
 <script src="{{GetLinkAdmin('plugins/moment/moment.min.js')}}"></script>
 <script src="{{GetLinkAdmin('plugins/daterangepicker/daterangepicker.js')}}"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{GetLinkAdmin('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
 <!-- Summernote -->
 <script src="{{GetLinkAdmin('plugins/summernote/summernote-bs4.min.js')}}"></script>
 <!-- overlayScrollbars -->
 <script src="{{GetLinkAdmin('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{GetLinkAdmin('dist/js/adminlte.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{GetLinkAdmin('dist/js/demo.js')}}"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{GetLinkAdmin('dist/js/pages/dashboard.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script>
     function deleteConfirmation(event, text = false) {
         event.preventDefault();
         let locale = document.documentElement.getAttribute("data-locale");

         Swal.fire({
             title: translateDelete()[locale].title,
             text: translateDelete()[locale].exitMessage,
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: translateDelete()[locale].confirmButtonText,
             cancelButtonText: translateDelete()[locale].exit,
         }).then((result) => {
             if (result.isConfirmed) {
                 event.target.submit();
             }
         });
     }


     function translateDelete() {
         return {
             en: {
                 title: "Are you sure ?",
                 exitMessage: "If you delete data, this datas will be lost!",
                 confirmButtonText: "Yes, delete!",
                 exit: "no!",
             },
             az: {
                 title: "Əminsiniz?",
                 exitMessage: "Əgər məlumatları silərsinizsə, bu məlumatlar məlumatlar itiriləcək!",
                 confirmButtonText: "Bəli, sil!",
                 exit: "Xeyr!",
             },
             ru: {
                 title: "Вы уверены?",
                 exitMessage: "Если вы удалите данные, эти данные будут потеряны!",
                 confirmButtonText: "Да, удалить!",
                 exit: "Нет!",
             },
         }
     };
 </script>
