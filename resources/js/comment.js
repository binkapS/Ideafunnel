let editForms = document.querySelectorAll('#comment-edit');
let replyForms = document.querySelectorAll('#comment-reply');
let editBtns = document.querySelectorAll('#edit-comment');
let replyBtns = document.querySelectorAll('#reply-comment');

editBtns.forEach((btn, key) => {
    btn.addEventListener('click', () => {
        editForms[key].style.display = "block";
    });
});
replyBtns.forEach((btn, key) => {
    btn.addEventListener('click', () => {
        replyForms[key].style.display = "block";
    });
});
