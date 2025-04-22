--{{  $('.cart').click(function(){
    //         var quantity=$('#quantity').val();
    //         var pro_id=$(this).data('id');
    //         // alert(quantity);
    //         $.ajax({
    //             url:"{{route('add-to-cart')}}",
    //             type:"POST",
    //             data:{
    //                 _token:"{{csrf_token()}}",
    //                 quantity:quantity,
    //                 pro_id:pro_id
    //             },
    //             success:function(response){
    //                 console.log(response);
	// 				if(typeof(response)!='object'){
	// 					response=$.parseJSON(response);
	// 				}
	// 				if(response.status){
	// 					swal('success',response.msg,'success').then(function(){
	// 						document.location.href=document.location.href;
	// 					});
	// 				}
	// 				else{
    //                     swal('error',response.msg,'error').then(function(){
	// 						document.location.href=document.location.href;
	// 					});
    //                 }
    //             }
    //         })
    //     });--}}