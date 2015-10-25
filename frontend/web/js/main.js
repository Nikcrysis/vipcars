
var autos;

$('.auto').on('click', function(){
  console.log(this.id);
  var cat = this.id;
  $.ajax({
        type: 'GET',
        url: '/site/get-cars',
        data: {'cat' : cat},
    beforeSend: function() {
      $('#cat_row .col-sm-9').css({
        'opacity' : 0.5,
        });
      $('.preloader').show();
    }, 
        success: function(data) {
          $('#cat_row .col-sm-9').css({
        'opacity' : 1,
        });
           $('.preloader').hide();
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
       beforeSend: function() {
      $('#cat_row .col-sm-9').css({
        'opacity' : 0.5,
        });
         $('#cat_row .preloader').show();
    }, 
        success: function(html) {
          $('#cat_row .col-sm-9').css({
        'opacity' : 1,
        });
          $('.preloader').hide();
            $('#item .carousel-inner').html(html.result);
            $('#auto_desc').html(html.p);
            $('#item .carousel-indicators').html(html.dots);
            $('#order_car_select').val(html.carName);
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
  var auto = $('#orderForm #order_car_select').val();
  var name = $('#orderForm input[name=name]').val();
  var phone = $('#orderForm input[name=phone]').val();
  var date = $('#orderForm input[name=date]').val();
  var time = $('input[name=time]:checked').val();
 
  if ((name !== '') && (phone !== '') && (date !== '') && (time !== '')){
   
  text += 'Поступил заказ на авто ' + auto +'\n';
    text += 'От ' + name  +'\n';
    text += 'Телефон: ' + phone +'\n';
    text += 'Дата: ' + date;
    if ( time == 'yes'){
      text += ' точная.';
        } else {
         text += ' неточная.'; 
        }
  $.ajax({
        type: 'POST',
        url: '/site/order-car',
    data: {'text' : text},
        success: function(data) {
          alert('Заявка принята!');
        }
    });
} else {
 alert('Заполните все поля!'); 
}
}

function equalHeight(group) {    
    var tallest = 0;    
    group.each(function() {       
        var thisHeight = $(this).height();       
        if(thisHeight > tallest) {          
            tallest = thisHeight;       
        }    
    });    
    group.each(function() { $(this).height(tallest); });
} 

$(document).ready(function() {   
    equalHeight($(".caption, #carousel-responses .item")); 
});


