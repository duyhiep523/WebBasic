var postsAPI = "https://jsonplaceholder.typicode.com/posts";
fetch(postsAPI)
    .then(function (response) {
        return response.json();
    })
    .then(function (posts) {
        var htmls = posts.map(function (post) {
            return `<li>
            <h2>${post.title}</h2>
            <p>${post.body}</p>
            </li>`
        })
        var html = htmls.join("");
        document.querySelector("div").innerHTML = html;
    })



let a=log1 => console.log(log1);
a("ác");