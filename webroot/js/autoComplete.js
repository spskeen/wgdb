$(document).ready(function() {

  $(document).click(function(e){
    var target = e.target;
    if (!$(target).is('.search-wrapper') ) {
      console.log('click outside');
      $('.search-results').empty();
    }
  })

  $(".search").on('keyup', function(){
    var query = $(this).val();

    var $results = $(this).parent().parent().find('.search-results');

    $results.empty();

    if(query.length < 1) {
      return;
    }

    $.get({
        url: "/wgdb/wrestlers/search.json",
        data: { query: query },
        success: function(data) {
          $.each(data.wrestlers, function(index, wrestler) {
             $results.append("<li><a href='/wgdb/wrestlers/view/" +wrestler.id+"'><span class='label-search attribute'>"+wrestler.overall+"</span> <span class='wrestler-name'>"+wrestler.wrestler_name+"</span><span class='game-name right'>"+wrestler.game.game_name+ "</span></a></li>");
          });
        }
      });
    });
  });