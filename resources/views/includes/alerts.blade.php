@if (session()->has('success'))
    <div class="alert alert-success border-0 alert-bs-dismissible mt-3 mb-3" role="alert">
        <button type="button" class="btn btn-sm" data-bs-dismiss="alert"><span>&times;</span></button>
        <span class="fw-bold"><i class="fa fa-thumbs-up"></i> Great! {{ session()->get('success') }}</span>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger border-0 alert-bs-dismissible mt-3 mb-3" id="error" role="alert">
        <button type="button" class="btn btn-sm" data-bs-dismiss="alert"><span>&times;</span></button>
        <span class="fw-bold">Opps! {{ session()->get('error') }}</span>
    </div>
@endif


<script>
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 1000);

    setTimeout(function() {
        $('#error').fadeOut('slow');
    }, 500000);
</script>
