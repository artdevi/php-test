document.querySelector('#submit').addEventListener('click', function() {
    let n = document.querySelector('#n-input').value;
    alert(n);
});

let gopher = document.querySelector('.gopher')

let offsetX;
let offsetY;

gopher.addEventListener('dragstart', function(event) {
    offsetX = event.offsetX;
    offsetY = event.offsetY;
})

gopher.addEventListener('dragend', function(event) {
    gopher.style.top = (event.pageY - offsetY) + 'px'
    gopher.style.left = (event.pageX - offsetX) + 'px'
})