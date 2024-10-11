/** global timelineUltimate */
jQuery(document).ready(function ($) {

  $('.load-more').on('click', function () {
    $(this).addClass('loading')
    var themes = $(this).attr('themes')

    var timeline_id = parseInt($(this).attr('data-timeline_id'))
    var per_page = parseInt($(this).attr('data-per_page'))
    var offset = parseInt($(this).attr('data-offset'))
    $(this).html('<span>loading...</span>')

    var oddeven = $('.timeline_um-' + timeline_id + ' li:last-child').attr('data-oddeven')

    $.ajax({
      type: 'POST',
      url: timelineUltimate.ajaxurl,
      data: {
        'action': 'timeline_um_body_ajax_' + themes,
        'timeline_id': timeline_id,
        'offset': offset,
        'oddeven': oddeven
      },
      success: function (data) {
        const $more = $('.load-more')
        $more.removeClass('loading')
        $more.html('<span>Load More</span>')
        $('.timeline_um-' + timeline_id).append(data)
        $more.attr('data-offset', (offset + per_page))
      }
    })
  })

  $(document).on('click', '.timeline_um_content_source', function () {
    var source = $(this).val()
    var source_id = $(this).attr('id')

    $('.content-source-box.active').removeClass('active')
    $('.content-source-box.' + source_id).addClass('active')
  })

  $('.timeline_um_taxonomy').on('click', function () {
    var taxonomy = $(this).val()

    $('.timeline_um_loading_taxonomy_category').css('display', 'block')

    $.ajax({
      type: 'POST',
      url: timelineUltimate.ajaxurl,
      data: {
        'action': 'timeline_um_get_taxonomy_category',
        'taxonomy': taxonomy
      },
      success: function (data) {
        $('.timeline_um_taxonomy_category').html(data)
        $('.timeline_um_loading_taxonomy_category').fadeOut('slow')
      }
    })
  })
})
