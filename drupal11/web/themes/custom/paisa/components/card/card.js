(function (Drupal, once) {

  Drupal.behaviors.paisaCard = {
    attach(context) {

      once('paisa-card', '.card', context).forEach((card) => {

        card.addEventListener('click', () => {
          console.log('Card clicked');
        });

      });

    }
  };

})(Drupal, once);