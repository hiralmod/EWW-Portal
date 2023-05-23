<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                 {{date('Y')}} &copy; EWW
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('assets/js/parsley.min.js')}}"></script>
<script src="{{ asset('assets/js/tostar.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2@9.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-table/bootstrap-table.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.min.js')}}"></script>

@include('admin.layouts.message')
@yield('datatable_script')
@yield('script')