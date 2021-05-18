/* vim: set ts=2 sw=2 sts=2 et: */

core.bind(
    'load',
    function() {
      decorate(
        'ProductDetailsView',
        'postprocess',
        function(isSuccess, initial)
        {
          arguments.callee.previousMethod.apply(this, arguments);
          wishlist();

        }
      );
    }
  );
