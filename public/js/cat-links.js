let url = window.location.href.split('/');
let lis = document.getElementsByClassName('cat-menu-item');
let category;
let attr;

if (typeof url[3] !== 'undefined' && typeof url[4] === 'undefined') {
    category = '/' + url[3];
} else if (typeof url[3] !== 'undefined' && typeof url[4] !== 'undefined') {
    category = '/' + url[3] + '/' + url[4];
}

console.log(lis[1].firstChild);

for (let i = 0; i < lis.length; i++) {
    attr = lis[i].firstChild.getAttribute('href');
    if (typeof category !== 'undefined') {
        if (attr === category) {
            lis[i].classList.add('q-bg-d');
        }
    }
}