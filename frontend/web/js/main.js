
var autos;

$('.auto').on('click', function(){
  console.log(this.id);
  var cat = this.id;
  $.ajax({
        type: 'GET',
        url: '/site/get-cars',
        data: {'cat' : cat},
        success: function(data) {
            $('#cats').hide();
      $('#autos').html(data.result);
      $('#cat').fadeIn();
            var target = $('#cat_row') ;
            $('html,body').animate({
          scrollTop: target.offset().top
        }, 0);
        }
    });
});

$('#autos').on('click', '#close', function(){
  $('#cat').hide();
  $('#cats').fadeIn();
});

$('#close_item').on('click', function(){
  $('#item').hide();
  $('#cat').fadeIn();
});


$('#autos').on('click', 'img, p', function(){
  console.log($(this).parent().attr('id'));
  var id = $(this).parent().attr('id');

    $.ajax({
        type: 'GET',
        url: '/site/get-car-photos',
        data: {'carId' : id},
        success: function(html) {
            $('#item .carousel-inner').html(html.result);
            $('#auto_desc').html(html.p);
            $('#item .carousel-indicators').html(html.dots);
            $('#car_select').val(html.carName);
            function async(callback) {
                $('.carousel').carousel();
                callback();
            }
            async(function() {
                $('#cat').hide();
                $('#item').fadeIn();
            });
          var target = $('#cat_row') ;
            $('html,body').animate({
          scrollTop: target.offset().top
        }, 0);
        }
    }); 
});


$(function() {
  $('.navigation a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

function OrderCar() {
  var text= '';
  text += 'Поступил заказ на авто ' + $('#orderForm #order_car_select').val() +'\n';
    text += 'От ' + $('#orderForm input[name=name]').val() +'\n';
    text += 'Телефон: ' + $('#orderForm input[name=phone]').val() +'\n';
    text += 'Дата: ' + $('#orderForm input[name=date]').val();
    if ($('input[name=time]:checked').val() == 'yes'){
      text += ' точная.';
        } else {
         text += ' неточная.'; 
        }
  console.log(text );
  $.ajax({
        type: 'POST',
        url: '/site/order-car',
    data: {'text' : text},
        success: function(data) {
          console.log(data);
        }
    });
}
