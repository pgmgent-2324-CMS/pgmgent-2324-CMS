import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let page = 1;
let loading = false;
let lastPage = false;
const teachers = document.getElementById('teachers');

const loadMore = async () => {
    if(loading) {
        return;
    }
    loading = true;
    page++;
    if(lastPage && page > lastPage) {
        return;
    }
    console.log(`load page ${page}`);

    const response = await fetch(`/api/teachers?page=${page}`);
    const data = await response.json();
    console.log(data);
    lastPage = data.last_page;

    data.data.forEach((teacher) => {
        console.log(teacher.firstname);
        const div = document.createElement('div');
        div.innerHTML = teacher.firstname;
        teachers.appendChild(div);
    });
    loading = false;
}

window.addEventListener('scroll', () => {
    const scrollpos = window.scrollY + window.innerHeight;
    const height = document.body.offsetHeight;
    if(scrollpos >= height - 200) {
        loadMore();
    }
});