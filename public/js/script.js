function toggle_me(e) {
    const sidebar = document.querySelector('.sidebar');
    e.lastElementChild.classList.toggle('menu-line1');
    e.firstElementChild.classList.toggle('menu-line2');
    e.lastElementChild.classList.toggle('menu-line1-off');
    e.firstElementChild.classList.toggle('menu-line2-off');
    sidebar.classList.toggle('show-menu');
}

const fileinput = document.getElementById('thumbnail-file');
const myimg = document.getElementById('thumbnail');
const camimg = document.getElementById('thumbnail-cam');
const submitter = document.getElementById('submit-form');
const myform = document.getElementById('player-form');

if(submitter)
submitter.addEventListener('click', () => {
    var ids = [];
    document.querySelectorAll('.selected-team').forEach(($item)=>{
        ids.push($item.getElementsByTagName('input')[0].value);
    });
    document.getElementById('items').value = JSON.stringify(ids);
    myform.submit();
});

if(myimg)
myimg.addEventListener('click', () => {
    fileinput.click();
});

if(camimg)
camimg.addEventListener('click', () => {
    fileinput.click();
});

if(fileinput)
fileinput.addEventListener('change', () => {

    if (fileinput.files && fileinput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            myimg.src = e.target.result;
        }
        reader.readAsDataURL(fileinput.files[0]);
    }

})
