
jQuery(document).ready(function () {
    // console.log("ready2!");

    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function (event) {
    //   if (event.target == modal) {
    //     modal.style.display = "none";
    //   }
    // };

    var info_types = ['application', 'material', 'hole-size', 'wire-diameter', 'gauge', 'height', 'length'];
   

    function modal_handel(info) {
      $(".info." + info).on('click', function () {
        $('#airaModal').show();
        $(".aira-modal-content." + info).show();
      });

      $(".aira-close").on('click', function () {
        $('#airaModal').hide();
        $(".aira-modal-content." + info).hide();
      });
    }
    
    $(window).click(function(event) {
      if (event.target == '#airaModal') {        
        $('#airaModal').hide();
      }
    });

    info_types.forEach(function(element, index) {
      modal_handel(info_types[index]);
    });
  
  $("tbody").on('click', function(){
    // console.log('adja')
    
  });

  $('#aira_ajax_products input').on('input', function(params) {
    var that = $(this);
    var qty = that.val();
    that.closest("tr").find('.ajax_add_to_cart').attr('data-quantity', qty);
  });

  $("#aira_ajax_pagination").on("click", ".aira-pagination a", function() {
    var post_data = prepare_post_data(this);
    $("#loader").addClass("loader");
    my_ajax_post(post_data, true, function(result) {
      $("#aira_ajax_products").html(result.table_body_view);
      $("#aira_ajax_pagination").html(result.pagination_view);
      $("#loader").removeClass("loader");
    });
    return false;
  });

  $('select.attr_filters').on('change', function () {

    var post_data = prepare_post_data(this);
    post_data.pagination.page = 1;
    $("#loader").addClass("loader");
    my_ajax_post(post_data, true, function(result) {
      console.log('SUCCESS');
      $("#aira_ajax_filters").html(result.filters_view);
      $("#aira_ajax_products").html(result.table_body_view);
      $("#aira_ajax_pagination").html(result.pagination_view);
      $("#loader").removeClass("loader");
    });
    return false;
  });

  function prepare_post_data(that) {
    
    var post_data = {
      pagination: {
          posts_per_page: $("input[name=posts_per_page]").val(),
          page: $(that).data("current_page")
      },
      filters: get_filter_selection(),
      action: "get_products"
    };
  
    return post_data;
  }

  function get_filter_selection() {

    var filters = {};
    $('select.attr_filters').each(function(){
      filters[$(this).attr("data-attr_slug")] = $(this).val();
    });
    
    return filters;
  }


  function my_ajax_post(post_data, json, success, sync) {

    post_data.ajax_nonce = aira_config.ajax_nonce;
    
    console.log(post_data);

    var settings = { type: "POST", data: post_data, url: aira_config.ajax_url, success: eval(success), error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      } };

    if (json == true) {
      settings.dataType = 'json';
    }

    if (sync == true) {
      settings.async = false;
    }    
    $.ajax(settings);
  }    
});