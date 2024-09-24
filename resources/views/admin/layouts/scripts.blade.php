<!-- BEGIN: Vendor JS-->
<script src="{{ asset('admin-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('admin-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('admin-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin-assets/js/core/app.js') }}"></script>
<script src="{{ asset('admin-assets/js/scripts/components.js') }}"></script>
<!-- END: Theme JS-->
<script src="{{ asset('admin-assets/js/scripts/datatables/datatable.js') }}"></script>
<script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>

<script>
    window.setInterval(realTime, 1000);
    getDayAndMonth();

    function realTime() {
        const date = new Date();

        const time = {
            "hour": {
                "hour": "numeric"
            },
            "minute": {
                "minute": "numeric"
            },
            "secound": {
                "second": "numeric"
            }
        };

        $("#hours").text(date.toLocaleTimeString("fa", time.hour));
        $("#minutes").text(date.toLocaleTimeString("fa", time.minute));
        $("#secound").text(date.toLocaleTimeString("fa-IR", time.secound));
    }

    function getDayAndMonth() {
        const date = new Date();
        const dayAndMonth = {
            "day": {
                "day": "numeric"
            },
            "month": {
                "month": "long"
            }
        };

        let day = date.toLocaleDateString("fa-IR", dayAndMonth.day);
        let month = date.toLocaleDateString("fa-IR", dayAndMonth.month);
        $("#day").text(day);
        $("#month").text(month);
    }
    
</script>
