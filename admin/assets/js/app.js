/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Module/App: Main Js
 */


(function ($) {

    'use strict';

    function initSlimscroll() {
        $('.slimscroll').slimscroll({
            height: 'auto',
            position: 'right',
            size: "7px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 50
        });
    }

    function initMetisMenu() {
        //metis menu
        $("#side-nav").metisMenu();
    }

    

    function initLeftMenuCollapse() {
        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarge-menu");
            initSlimscroll();
        });
    }

    function initEnlarge() {
        if ($(window).width() < 1025) {
            $('body').addClass('enlarge-menu');
        } else {
            if ($('body').data('keep-enlarged') != true)
                $('body').removeClass('enlarge-menu');
        }
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $(".left-sidenav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) { 
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().addClass("in");
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("in"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("active");
            }
        });
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


       $('.btn_delete').click(function(e){
            e.preventDefault();
            var tdh = $(this);
            var id = $(this).attr('id');

          swal({
            title: "Do you want to delete product?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              // ajax request
            $.ajax({
                  url: 'include/handlers/ajax/delete_product.php',
                  type: 'post',
                  data:{
                    p_id:id
                  },
                  success:function(data){
                    tdh.parents('tr').hide();
                    swal("Your product has been deleted!", {
                        icon: "success",
                      });
                  }
                }); 
            }
          });
        });




       $('.btn_delete_cart_order').click(function(e){
            e.preventDefault();
            var tdh = $(this);
            var id = $(this).attr('id');

          swal({
            title: "Do you want to delete order?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              // ajax request
            $.ajax({
                  url: 'include/handlers/ajax/delete_order.php',
                  type: 'post',
                  data:{
                    o_id:id
                  },
                  success:function(data){
                    tdh.parents('tr').hide();
                    swal("Your order has been deleted!", {
                        icon: "success",
                      });
                  }
                }); 
            }
          });
        });




       $('.btn_delete_buy_now_order').click(function(e){
            e.preventDefault();
            var tdh = $(this);
            var id = $(this).attr('id');

          swal({
            title: "Do you want to delete buy now order?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              // ajax request
            $.ajax({
                  url: 'include/handlers/ajax/delete_buy_now_order.php',
                  type: 'post',
                  data:{
                    o_id:id
                  },
                  success:function(data){
                    tdh.parents('tr').hide();
                    swal("Your buy now order has been deleted!", {
                        icon: "success",
                      });
                  }
                }); 
            }
          });
        });


       $('.btn_delete_testi').click(function(e){
            e.preventDefault();
            var tdh = $(this);
            var id = $(this).attr('id');

          swal({
            title: "Do you want to delete testimonial?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              // ajax request
            $.ajax({
                  url: 'include/handlers/ajax/delete_testimonial.php',
                  type: 'post',
                  data:{
                    t_id:id
                  },
                  success:function(data){
                    tdh.parents('tr').hide();
                    swal("Your testimonial has been deleted!", {
                        icon: "success",
                      });
                  }
                }); 
            }
          });
        });



       $('.delete_user').click(function(e){
            e.preventDefault();
            var tdh = $(this);
            var id = $(this).attr('id');

          swal({
            title: "Do you want to delete user?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              // ajax request
            $.ajax({
                  url: 'include/handlers/ajax/delete_user.php',
                  type: 'post',
                  data:{
                    u_id:id
                  },
                  success:function(data){
                    tdh.parents('tr').hide();
                    swal("User has been deleted!", {
                        icon: "success",
                      });
                  }
                }); 
            }
          });
        });



       $('.email_delete').click(function(e){
            e.preventDefault();
            var tdh = $(this);
            var id = $(this).attr('id');

          swal({
            title: "Do you want to delete message?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              // ajax request
            $.ajax({
                  url: 'include/handlers/ajax/delete_message.php',
                  type: 'post',
                  data:{
                    e_id:id
                  },
                  success:function(data){
                    tdh.parents('li').hide();
                    swal("Message has been deleted!", {
                        icon: "success",
                      });
                  }
                }); 
            }
          });
        });




    


$('#cat-table').DataTable({
    "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                // "info": "Showing page _PAGE_ of _PAGES_",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollX": true
});


$('#ord-table').DataTable({
    "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                // "info": "Showing page _PAGE_ of _PAGES_",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollX": true,
        "order": [[0, "desc"]],
});

$('#ord-table2').DataTable({
    "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                // "info": "Showing page _PAGE_ of _PAGES_",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollX": true,
        "order": [[0, "desc"]],
});


$('#best-table-index').DataTable({
    "language": {
                "lengthMenu": "Display _MENU_ records per page",
                "zeroRecords": "Nothing found - sorry",
                // "info": "Showing page _PAGE_ of _PAGES_",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                },
        "lengthMenu": [[10, 15, -1], [10, 15, "All"]],
        "scrollX": true,
        "order": [[2, "desc"]],
});



var total = ($('#cat-table').DataTable().rows().count());

var tot = document.querySelector('.total_prod');

if (tot != null) {
    tot.innerHTML = `Total ${total} products`;
}




$('#prod_cat').select2();
$('#option_select').select2();

//Date picker for sales table report
$('#datepicker1').datepicker({
  autoclose: true,
  todayHighlight: true
});

$('#datepicker2').datepicker({
  autoclose: true,
  todayHighlight: true
});



$('#selectAllBoxes').click(function(event){

  if (this.checked) {

    $('.checkBoxes').each(function(){

      this.checked = true;

    });
  } else{

    $('.checkBoxes').each(function(){

      this.checked = false;

    });


  }

});

///////////////////////////////////////////////////////////////////////

    function init() {
        initSlimscroll();
        initMetisMenu();
        initLeftMenuCollapse();
        initEnlarge();
        initActiveMenu();
        Waves.init();
    }

    init();

})(jQuery)



   

  