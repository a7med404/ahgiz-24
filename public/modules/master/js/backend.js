$(function (){
	'sue strict';


  /*Confirmtion Massege In Press Button Delete*/
	$('.delete-confirm').click(function(){
		return confirm('Are You Sure Do You Want Delete This ?');
		// return confirm(
		// swal({
		// 	title: "Are you sure?",
		// 	text: "Once deleted, you will not be able to recover this imaginary file!",
		// 	icon: "warning",
		// 	buttons: true,
		// 	dangerMode: true,
		// })
		// .then((willDelete) => {
		// 	if (willDelete) {
		// 		swal("Poof! Your imaginary file has been deleted!", {
		// 			icon: "success",
		// 		});
		// 	} else {
		// 		swal("Your imaginary file is safe!");
		// 	}
		// })
		// )
		
	});


	/*
	** ============== Start Pugins Edit ==================================
	 */

	 /* For niceScroll **/
    $("html").niceScroll({
      cursorcolor: "#d84f57",
      cursorwidth: "3px",
      cursoropcity: 0.5,
      cursorborder: "2px solid #d84f57",
      zindex: 9999,
      scrollspeed:80
		});

	/* For Wow **/
	// new WOW
	// (
	// 	{
	// 		boxClass: 'wow',
	// 		animateClass:  'animated',
	// 		offset: 		0,
	// 		mobile:  		true,
	// 		live: 			true,
	// 	}
	// ).init();




	/*
			For iCheck =====================================>
	*/
	$("input").iCheck({
			checkboxClass:"icheckbox_square-red",
			radioClass:"iradio_square-yellow",
			increaseArea:"20%" // optional
	});


      /*Confirmtion Massege In Press Button Delete*/

    //   $('.confirm').click(function(){

    //     swal({
    //     title: 'Are you sure?',
    //     text: "It will permanently deleted !",
    //     type: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes, delete it!'
    //   }).then(function() {
    //     swal(
    //       'Deleted!',
    //       'Your file has been deleted.',
    //       'success'
    //     );
    //   })

    //   })


});
