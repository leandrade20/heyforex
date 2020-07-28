// import AOS from 'aos';
// ..
AOS.init(); // init the library

//set up ScrollMagic
var controller = new ScrollMagic.Controller({
    globalSceneOptions: {
        triggerHook: 'onLeave'
    }
});


//pin the navigation
var pin = new ScrollMagic.Scene({
    triggerElement: '.sticky'
}).setPin('.sticky', {pushFollowers: false}).addTo(controller);