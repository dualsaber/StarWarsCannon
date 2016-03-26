$('a').hover (->
  link = $(this).attr 'href'
  appendLink = 'http://starwars.wikia.com' + link
  $(this).attr 'href', appendLink
  $(this).attr 'target', '_blank'
  $(this).next('.year').css 'display', 'inline';
), ->
  $(this).next('.year').css 'display', 'none';
$('i').contents().unwrap()

$('sup').click ()->
  $(this).parent('h2').next('span').toggle()

$('.unpublished').find('a').hover (->
  type = $(this).prev('.type').text()
  if type == ' C '
    $(this).addClass 'comic-type'
  if type == ' TV '
    $(this).addClass 'tv-type'
  if type == ' F '
    $(this).addClass 'film-type'
  if type == ' VG '
    $(this).addClass 'vg-type'
  if type == ' N '
    $(this).addClass 'novel-type'
), ->
