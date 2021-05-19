/* vim: set ts=2 sw=2 sts=2 et: */
$(document).ready(function () {
  var addToWishlist = $('.remove-btn-wishlist');
  addToWishlist.click(
    function () {
      ajaxRequest('delete', $(this).attr('p-id'));
    }
  );
});
function wishlist() {
  var addToWishlist = $('.detailed-btn-wishlist');
  addToWishlist.click(
    function () {
      var pr = $('.pr-id');
      var action = !$('#btn-add-to-wishlist').hasClass('hidden') ? 'add' : 'delete';
      if (!$('#btn-add-to-wishlist').hasClass('hidden')) {
        $('#btn-add-to-wishlist').addClass('hidden');
        $('#btn-remove-from-wishlist').removeClass('hidden');
      } else {
        $('#btn-add-to-wishlist').removeClass('hidden');
        $('#btn-remove-from-wishlist').addClass('hidden');
      }
      ajaxRequest(action, pr.attr('id'), 0);
    }
  )
}

function ajaxRequest(action, p_id, redirect = 1) {
  core.post(
    URLHandler.buildURL(
      {
        target: 'wishlist',
        action: action
      }
    ),
    function (XMLHttpRequest, textStatus, data, valid) {
      if (data) {
        data = jQuery.parseJSON(data);
      }
    },
    {
      target: 'wishlist',
      action: action,
      product_id: p_id,
      redirect: redirect
    },
    {
      rpc: true
    }
  );
}