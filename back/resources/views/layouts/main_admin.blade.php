<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Data tables --}}
        <link rel="stylesheet" href="{{asset('table/jquery.dataTables.min.css')}}">
        <script type="text/javascript" language="javascript" src="{{asset('table/jquery-3.5.1.js')}}"></script>

        <script type="text/javascript" language="javascript" src="{{asset('table/jquery.dataTables.min.js')}}" defer></script>

        <script type="text/javascript" class="init">
            $(document).ready(function () {
                $('#example').DataTable();
            });
            </script>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}

  <title>Admin</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  {{-- DropZone --}}




  <script>
    window.onload=function(){

        var button = document.getElementById('autoclick');
        if(button){
            button.click();
        }
    }
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app"></div>
<div class="wrapper">



  @include('includes.sidebar')
  @yield('content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->


  <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
{{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>




{{-- Buttons for modal feed --}}
<script>
    var button = document.getElementById('modalButton');
    var create_window = document.getElementById('createWindow');
    var edit_window = document.getElementById('editWindow');
    var error_window = document.getElementById('errorWindow');
    var notification = document.getElementById('notification');
    var addQuestionButton = document.getElementById('addQuestion');
    var addQuestionForm = document.getElementById('addQuestionForm');
    var addQuestionError = document.getElementById('ErrorWithAddQuestion');
    var startTest_form = document.getElementById('give_succes_for_test');
    if(addQuestionError){
        addQuestionButton.click();
    }

    function startTest(){
        startTest_form.className="container";
    }
    function cancelTest(){
        startTest_form.className="d-none";
    }
    function openAddQuestionWindow(){

        addQuestionButton.className = 'd-none';
        addQuestionForm.className = 'container';
    }
    function closeAddQuestionWindow(){
        addQuestionButton.className = 'btn btn-primary';
        addQuestionForm.className = 'd-none';
    }
    function changeQuestion(num){
        var question_id = 'question'+num;
        var change_question_id = 'changeQuestion'+num
        var question = document.getElementById(question_id);
        var change_question = document.getElementById(change_question_id);
        question.className = "d-none";
        change_question.className = "container";
    }
    function closeChangeQuestionWindow(num){
        var question_id = 'question'+num;
        var change_question_id = 'changeQuestion'+num
        var question = document.getElementById(question_id);
        var change_question = document.getElementById(change_question_id);
        question.className = "container";
        change_question.className = "d-none";
    }
    function closeErrorQuestionWindow(num){
        var question_id = 'question'+num;
        var error_question_id = 'errorQuestion'+num
        var question = document.getElementById(question_id);
        var error_question = document.getElementById(error_question_id);
        error_question.className = "d-none";
        question.className = "container";
    }

    function openWindow(){
      button.className = "d-none";
      create_window.className = "";
    }

    function closeWindow(){
      button.className = "btn btn-primary btn-sm";
      create_window.className = "d-none";
    }

    if(error_window){

        function openErrorWindow(){
        error_window.className = ""
        }

        function closeErrorWindow(){
            error_window.className = "d-none"
        }
    }


    function edit(){
      button.className = "d-none";
      edit_window.className = "";
    }

    if(notification){
          var timer = setInterval(timerFunction, 1000);
          var count = 0;
          function timerFunction() {
              count++;
              if(count > 5){
                  notification.className = "d-none";
                  clearInterval(timer);
              }
          }
      }

  </script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        $('#summernote1').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });

    $(function () {
        bsCustomFileInput.init();
    });
</script>

</body>
</html>
