<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': false,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }
    });

    @if(session()->has('toast_success'))    
        toastr.success('Item added to cart');
    @endif

    function addItem(that) {
        var product_id = {!! $product->id !!};
        if(checkDetails()){
            $.ajax({
                url: "/ajax/addtocart/"+product_id+"/"+$('#color').val()+"/"+$('#size').val(),
                type: "GET",
                success: function(res) {
                    window.location.reload();
                }
            });
        }
        else toastr.error('Please choose COLOR and SIZE');
    }

    function buyNow(that) {
        var product_id = {!! $product->id !!};
        if(checkDetails()){
            $.ajax({
                url: "/ajax/addtocart/"+product_id+"/"+$('#color').val()+"/"+$('#size').val(),
                type: "GET",
                success: function(res) {
                    window.location.href = "{{ route('product.cart') }}";
                }
            });
        }
        else toastr.error('Please choose COLOR and SIZE');
    }

    function checkDetails() {
        return $('#color').val() != '' && $('#size').val() != '';
    }
    
</script>