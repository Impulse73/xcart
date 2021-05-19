core.bind(
  'load',
  function () {
    decorate(
      'ProductDetailsView',
      'postprocess',
      function (isSuccess, initial) {
        arguments.callee.previousMethod.apply(this, arguments);
        wishlist();

      }
    );
  }
);
