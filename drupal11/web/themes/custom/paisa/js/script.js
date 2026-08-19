(function (Drupal, once) {

  Drupal.behaviors.paisa = {
    attach(context) {

      once('paisa-init', 'body', context).forEach(() => {
        console.log('Paisa theme loaded!');
      });

    }
  };

})(Drupal, once);