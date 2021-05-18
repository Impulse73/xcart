/* vim: set ts=2 sw=2 sts=2 et: */

 function wishlist() {
  var addToWishlist = $('.detailed-btn-wishlist');
  addToWishlist.click(
    function() {
      var pr = $('.pr-id');
      var action = !$('#btn-add-to-wishlist').hasClass('hidden') ? 'add' : 'delete';
      if (!$('#btn-add-to-wishlist').hasClass('hidden')) {
        $('#btn-add-to-wishlist').addClass('hidden');
        $('#btn-remove-from-wishlist').removeClass('hidden');
      }
      else {
        $('#btn-add-to-wishlist').removeClass('hidden');
        $('#btn-remove-from-wishlist').addClass('hidden');
      }
      core.post(
        URLHandler.buildURL(
          {
            target: 'wishlist',
            action: action
          }
        ),
        function(XMLHttpRequest, textStatus, data, valid) {
          if (data) {
            data = jQuery.parseJSON(data);
          }
        },
        {
          target:     'wishlist',
          action:     action,
          product_id: pr.attr('id')
        },
        {
          rpc: true
        }
      );
    }
  )
}