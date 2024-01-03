<!-- Core -->
<script src="{{asset('dashboard/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/js/theme.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/index.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/todo-js.js')}}"></script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<script src="{{asset('dashboard/assets/vendor/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/tables/jquery-datatable.js')}}"></script>
