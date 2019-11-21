<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>

<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/bootstrap.min.css"/>

<script>
   
   $.ajaxSetup({
      headers: {
         'X-CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   function addToCart(product_id){
       var url = "{{ url('/') }}";
       $.post( url+"/api/carts/store", {
           product_id: product_id
       }).done(function(data){

           data = JSON.parse(data);
               if(data.status == 'success'){
                   // toast
                   alertify.set('notifier','position', 'top-center');
                   alertify.success('Item added to cart successfully !! Total Items: '+ data.totalItems+ '<br /> To checkout <a href="{{ route('carts') }}">go to checkout page</a>');

                   $("#totalItems").html(data.totalItems);
               }

       });
   }
</script>