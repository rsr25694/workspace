(function (Drupal, once) {

Drupal.behaviors.d8Toolbar = {

attach(context) {

once('d8-toolbar','.toolbar-bar',context).forEach(function () {

document.querySelectorAll('.toolbar-menu li').forEach(function (item) {

item.addEventListener('mouseenter',function(){

this.classList.add('is-open');

});

item.addEventListener('mouseleave',function(){

this.classList.remove('is-open');

});

});

});

}

};

})(Drupal, once);