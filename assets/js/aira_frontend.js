
jQuery(document).ready(function () {
    // console.log("ready2!");

    var info_types = ['application', 'industry', 'material', 'finish', 'hole-size', 'wire-diameter', 'gauge', 'height', 'length'];
   
    function modal_handel(info) {
      $(".aira-modal-content." + info).hide();

      $(".info." + info).on('click', function () {
        $('#airaModal').show();
        $(".aira-modal-content." + info).show();
      });

      $(".aira-close").on('click', function () {
        $('#airaModal').hide();
        $(".aira-modal-content." + info).hide();
      });

      $(document).keyup(function(e) {
          if (e.keyCode == 27) { // escape key maps to keycode `27`
          $('#airaModal').hide();
          $(".aira-modal-content." + info).hide(); // <close modal>
        }
      });

    }

    $(window).click(function(event) {
      if (event.target.id == 'airaModal') {        
        $('#airaModal').hide();
        $(".aira-modal-content." + info).hide(); // <close modal>
      }
    });
    
    // create modals
    info_types.forEach(function(index, element) {
      modal_handel(info_types[element]);
    });

  $('#aira_ajax_products input').on('input', function(params) {
    var that = $(this);
    var qty = that.val();
    that.closest("tr").find('.ajax_add_to_cart').attr('data-quantity', qty);
  });

  // $("#aira_ajax_pagination").on("click", ".aira-pagination a", function() {
  //   var post_data = prepare_post_data(this);
  //   $("#loader").addClass("loader");
  //   my_ajax_post(post_data, true, function(result) {
  //     $("#aira_ajax_products").html(result.table_body_view);
  //     // $("#aira_ajax_pagination").html(result.pagination_view);
  //     $("#loader").removeClass("loader");
  //   });
  //   return false;
  // });

  $('select.attr_filters').on('change', function () {

    var post_data = prepare_post_data(this);
    // post_data.pagination.page = 1;
    $("#loader").addClass("loader");
    my_ajax_post(post_data, true, function(result) {
      console.log('SUCCESS');
      $("#aira_ajax_filters").html(result.filters_view);
      $("#aira_ajax_products").html(result.table_body_view);
      // $("#aira_ajax_pagination").html(result.pagination_view);

      sortTable($(".which-mesh"), sortOrder);
      $("#loader").removeClass("loader");
    });
    return false;
  });

  function prepare_post_data(that) {
    
    var post_data = {
      // pagination: {
      //     // posts_per_page: $("input[name=posts_per_page]").val(),
      //     // page: $(that).data("current_page")
      //     posts_per_page: -1,
      //     page: 1
      // },
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

  function sortTable(table, order) {
	
	// console.log(order, 'ez');
    if (order == "") {return}; // not set
    
    var asc = order === "asc",
      tbody = table.find("#aira_ajax_products");

    tbody.find('tr').sort(function (a, b) {
      if (asc) {
        return $('td:first', a).text().localeCompare($('td:first', b).text());
      } else {
        return $('td:first', b).text().localeCompare($('td:first', a).text());
      }
    }).appendTo(tbody);
  }

  var sortOrder = "";
  
  $(".az").on("click", function() {
	
	var icon = $(this).children();
	  
	switch (sortOrder) {
      case "asc":
		sortOrder = "desc";
		icon.removeClass("fa-sort-asc");
		icon.addClass("fa-sort-desc");
        break;
	  case "desc":
	  	sortOrder = "";
		icon.removeClass("fa-sort-desc");
		icon.addClass("fa-sort");	
        break;
      default:
		sortOrder = "asc";
		icon.removeClass("fa-sort");
		icon.addClass("fa-sort-asc");
    }
	
	sortTable($(".which-mesh"), sortOrder);

  })
  
});