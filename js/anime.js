var logoTimeline = anime.timeline({});

logoTimeline.add({
    targets: '.path-group path',
    strokeDashoffset:[anime.setDashoffset, 0],
    direction: 'alternate',
    duration: 1000,
    easing: 'easeInExpo',
    delay:500
})
.add({
    targets: '.path-group path',
    fill: 'rgba(225,65,35,1)',
    duration: 500,
    easing: 'linear'
}, '-=500')
    .add({
    targets: '.path-group path',
    duration: 250,
    strokeWidth: '1',
    easing: 'linear'
    })
    .add({
        targets: '.path-group path',
        duration: 250,
        strokeWidth: '0',
        easing: 'linear'
    })
;

var notificationTimeline = anime.timeline({});

notificationTimeline

.add({
    targets: '.notification',
    translateY: 64,
easing: 'linear',
    delay:250,
    duration: 250,


}).add({targets: '.notification',
translateY: -64,
    easing:'linear',
    duration:250,
    delay:2500
});


