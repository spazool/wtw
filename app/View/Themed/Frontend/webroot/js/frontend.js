$(document).ready(function(){

	$('.datepicker').each(function(){
        $(this).datepicker({ 
            dateFormat: "yy-mm-dd",
            onSelect: function() {
                $('.form_validate').bootstrapValidator('revalidateField', $(this))
            }
        });
    });
    
    $('.form_validate').bootstrapValidator({
        live: 'enabled',
        message: 'This value is not valid',
        submitButtons: 'button[type="submit"]',
        trigger: null,
        feedbackIcons: {
            valid: 'icon-ok',
            invalid: 'icon-remove',
            validating: 'icon-refresh'
        }
    });

    $('.mobile-menu-controls').click(function(){
        $('#search #navbar').slideToggle();
    });

    $('.mobile-filters-controls').click(function(){
        $('#filters .row-fluid').slideToggle();
    });

    $('#filters_form select').change(function(){
        submitFilters();
    });

    $('#search_form').click(function(e){
        e.preventDefault();
        submitSearch();
    });

    $('#search_form').submit(function(e){
        e.preventDefault();
        submitSearch();
    });

});

function submitFilters() {
    var what = null;
    var where = null;
    var when = null;

    if($('#filter_what').val() != "") {
        what = $('#filter_what').val();
    }

    if($('#filter_where').val() != "") {
        where = $('#filter_where').val();
    }

    if($('#filter_when').val() != "") {
        when = $('#filter_when').val();
    }

    var url = "/events/events_filter/" + what + "/" + where + "/" + when;
    window.location = url;
}

function submitSearch() {
    var search_term = $('#global_search').val();
    var url = "";

    if(search_term != "") {
        url = "/events/search_events/" + search_term;
        window.location = url;
    }
}

function postRating(id, score) {
    round = Math.ceil(score*2)/2;
    console.log(id);
    console.log(round);

    $.ajax({
        url:"/events/save_rating/" + id + "/" + round,
        success:function(result){}
    });
}