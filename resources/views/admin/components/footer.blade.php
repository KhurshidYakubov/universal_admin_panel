<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; Khurshid Yakubov 2021 | khurshid.yakubov@gmail.com</span>
        </div>
    </div>
</footer>


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">{{ __('main.logout_info') }}</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('main.cancel') }}</button>
                <form method="POST" action="#">
                    @csrf
                    <a href="/logout" class="btn btn-info">{{ __('main.logout') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/admin/jquery.min.js')}}"></script>
<script src="{{asset('js/admin/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/admin/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/admin/sb-admin-2.min.js')}}"></script>

<script type='text/javascript'>
    function submitForm() {
        document.getElementById('myform').submit();
    }
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
    };
</script>

<script>
    CKEDITOR.replace('my-editor-oz', options);
</script>
<script>
    CKEDITOR.replace('my-editor-uz', options);
</script>
<script>
    CKEDITOR.replace('my-editor-ru', options);
</script>

<script>
    var route_prefix = "/laravel-filemanager";
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>





