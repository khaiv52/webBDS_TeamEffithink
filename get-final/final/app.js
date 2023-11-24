const observer = new  IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.add('remove');
        }
    })
})

const hiddenElements = document.querySelectorAll(".hidden");
const hiddenLeftElements = document.querySelectorAll(".left");
const hiddenRightElements = document.querySelectorAll(".right");

hiddenElements.forEach(el => observer.observe(el));
hiddenLeftElements.forEach((el) => observer.observe(el));
hiddenRightElements.forEach(el => observer.observe(el));
