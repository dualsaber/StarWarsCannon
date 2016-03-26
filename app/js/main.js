'use strict';

$('a').hover(function () {
  var appendLink, link;
  link = $(this).attr('href');
  appendLink = 'http://starwars.wikia.com' + link;
  $(this).attr('href', appendLink);
  $(this).attr('target', '_blank');
  return $(this).next('.year').css('display', 'inline');
}, function () {
  return $(this).next('.year').css('display', 'none');
});

$('i').contents().unwrap();

$('sup').click(function () {
  return $(this).parent('h2').next('span').toggle();
});

$('.unpublished').find('a').hover(function () {
  var type;
  type = $(this).prev('.type').text();
  if (type === ' C ') {
    $(this).addClass('comic-type');
  }
  if (type === ' TV ') {
    $(this).addClass('tv-type');
  }
  if (type === ' F ') {
    $(this).addClass('film-type');
  }
  if (type === ' VG ') {
    $(this).addClass('vg-type');
  }
  if (type === ' N ') {
    return $(this).addClass('novel-type');
  }
}, function () {});